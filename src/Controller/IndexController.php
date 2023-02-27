<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Repository\PatientRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class IndexController extends AbstractController
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ManagerRegistry
     */
    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry, SerializerInterface $serializer)
    {
        $this->managerRegistry = $managerRegistry;
        $this->serializer = $serializer;
    }

    #[Route(path: '/index', name: 'index_patient')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route(path: '/patient/list', name: 'patient_list')]
    public function list(Request $request, PatientRepository $patientRepository): Response
    {
        if ($request->isXmlHttpRequest()) {
            $current = $request->get('current');
            $rowCount = $request->get('rowCount');
            $searchPhrase = $request->get('searchPhrase');
            $sort = $request->get('sort');
            $protocoles = $request->get('protocoles');

            $patients = $patientRepository->findByFilter($sort, $searchPhrase, $protocoles);
            
            if ($searchPhrase != "") {
                $count = count($patients->getQuery()->getResult());
            } else {
                $count = $patientRepository->getCount();
            }
            
            if ($rowCount != -1) {
                $min = ($current - 1) * $rowCount;
                $max = $rowCount;
                $patients->setMaxResults($max)->setFirstResult($min);
            }
            $patients = $patients->getQuery()->getResult();
            $rows = [];
            foreach ($patients as $patient) {
                $row = array(
                    "id" => $patient->getId(),                   
                    "civilite" => $patient->getGeneral()->getCivilite(),
                    "prenom" => $patient->getGeneral()->getPrenom(),
                    "nom" => $patient->getGeneral()->getNom(),
                    "dateNaissance" => $patient->getGeneral()->getDateNaissance() ? $patient->getGeneral()->getDateNaissance()->format('d/m/Y') : '',
                    "protocolesList" => $this->buildProtocolesList($patient),
                    "error" => ''
                );
                array_push($rows, $row);
            }
            $data = array(
                "current" => intval($current),
                "rowCount" => intval($rowCount),
                "rows" => $rows,
                "total" => intval($count),
            );
            return new JsonResponse($data);
        }
        return new JsonResponse('no results found', Response::HTTP_NOT_FOUND);
    }

    private function buildProtocolesList(Patient $patient)
    {
        $visites = $patient->getVisites();
        $protocolesList = [];

        foreach ($visites as $visite) {
            $nom = $visite->getProtocoleNom();
            if (!empty($nom) && !in_array($nom, $protocolesList))
                array_push($protocolesList, $nom);
        }

        return $protocolesList;
    }

    #[Route(path: '/advancement', name: 'advancement', methods: ['GET', 'POST'])]
    public function advancement(Request $request): Response
    {
        $conn = $this->managerRegistry->getConnection();

        if ($request->isXmlHttpRequest()) {
            $id = $request->get('id');
            $patient = $this->managerRegistry->getRepository(Patient::class)->find($id);

            $RAW_QUERY = 'SELECT f.field_id
            FROM (
                SELECT field_id, max(date_creation) AS maxdate
                FROM erreur
                GROUP BY field_id, patient_id
            ) AS x
            INNER JOIN erreur AS f ON f.etat = "error" AND f.field_id = x.field_id AND f.date_creation = x.maxdate AND f.patient_id = ' . $patient->getId() . ';';
            $statement = $conn->prepare($RAW_QUERY);
            $resultSet = $statement->executeQuery();
            $errors = $resultSet->fetchAllAssociative();

            session_write_close();

            $json = $this->serializeEntity($patient);

            $arr = [];
            $iter = 0;
            foreach ($json as $item) {
                if (($i = $this->isError($iter, $errors)) != 0) {
                    array_push($arr, '{"state": "error", "number": "' . $i . '"}');
                }
                // else if (($i = $this->isCompleted($item, 0)) == 0)
                else if (!$this->array_searchRecursive(null, $item)) {
                    array_push($arr, '{"state": "completed", "number": "&nbsp;"}');
                } else {
                    array_push($arr, '{"state": "unfinished", "number": "&nbsp;"}');
                }
                $iter += 1;
            }
            return new JsonResponse($arr);
        }
        return new JsonResponse('no results found', Response::HTTP_NOT_FOUND);
    }

    //TODO
    private function isError($iter, $errors)
    {
        $err = 0;
        $list = ['general', 'facteur', 'information', 'antecedentCardiovasculaire', 'visite'];
        foreach ($errors as $error) {
            if (explode('_', $error['field_id'])[0] == $list[$iter]) {
                $err++;
            }
        }
        return $err;
    }

    private function isCompleted($data, $i)
    {
        foreach ($data as $item) {
            if (is_array($item))
                $i = $this->isCompleted($item, $i);
            if ($item === null)
                $i += 1;
        }
        return $i;
    }

    public function array_searchRecursive($needle, $haystack, $strict = false)
    {
        if (!is_array($haystack))
            return false;
        foreach ($haystack as $key => $val) {
            if (is_array($val) && $this->array_searchRecursive($needle, $val, $strict)) {
                return true;
            } elseif ((!$strict && $val == $needle) || ($strict && $val === $needle)) {
                return true;
            }
        }
        return false;
    }

    private function serializeEntity($data)
    {
        $res = $this->serializer->normalize(
            $data,
            'json',
            ['groups' => ['advancement']]
        );
        return $res;
    }

    #[Route(path: '/export/csv', name: 'export_csv', methods: ['GET'])]
    public function generateCsvAction(PatientRepository $patientRepository)
    {
        $res = $this->serializer->normalize(
            $patientRepository->findAll(),
            'json',
            ['groups' => ['export']]
        );
        $data = $this->serializer->encode($res, 'csv');
        $data = str_replace(",", ";", $data);

        $fileName = "export_patient_" . date("d_m_Y") . ".csv";
        $response = new Response($data);
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8; application/excel');
        $response->headers->set('Content-Disposition', 'attachment; filename=' . $fileName);
        echo "\xEF\xBB\xBF"; // UTF-8 with BOM
        return $response;
    }
}
