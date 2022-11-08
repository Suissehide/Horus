<?php

namespace App\Controller;

use App\Constant\FormConstants;

use App\Entity\Erreur;
use App\Entity\Letter;
use App\Entity\Medicament;
use App\Entity\Protocole;
use App\Entity\Patient;

use App\Form\PatientType;

use App\Repository\ErreurRepository;

use App\Service\InitializePatient;

use DateTime;
use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class PatientController extends AbstractController
{
    /**
     * @var Security
     */
    private $security;

    /**
     * @var DoctrineManager
     */
    private $em;

    public function __construct(Security $security, EntityManagerInterface $entityManager, private \Doctrine\Persistence\ManagerRegistry $managerRegistry)
    {
        $this->security = $security;
        $this->em = $entityManager;
    }

    #[Route(path: '/patient/add', name: 'patient_add', methods: ['GET', 'POST'])]
    public function patient_add(Request $request, InitializePatient $initializePatient): Response
    {
        $patient = new Patient();

        $form = $this->createForm(PatientType::class, $patient);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $patient = $form->getData();
            $type = $form->get('general')->get('feuille')->getData();

            $initializePatient->createVisite($patient, $type);

            $this->em->persist($patient);
            $this->em->flush();

            $this->addErreur($patient->getId(), $patient->getGeneral()->getNom(), 'notice', 'Création du patient ' . $patient->getGeneral()->getNom(), true);
            return $this->redirectToRoute('patient_view', ['id' => $patient->getId()]);
        }
        return $this->render('patient/create.html.twig', [
            'title' => 'Création d\'un patient',
            'controller_name' => 'PatientController',
            'form' => $form->createView(),
        ]);
    }

    #[Route(path: '/patient/history', name: 'history_list')]
    public function patient_history(ErreurRepository $erreurRepository, Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $current = $request->get('current');
            $rowCount = $request->get('rowCount');
            $searchPhrase = $request->get('searchPhrase');
            $sort = $request->get('sort');
            $patientId = $request->get('patientId');

            $erreurs = $erreurRepository->findHistory($sort, $searchPhrase, $patientId);
            if ($searchPhrase != "") {
                $count = count($erreurs->getQuery()->getResult());
            } else {
                $count = $erreurRepository->getCountAll($patientId);
            }

            if ($rowCount != -1) {
                $min = ($current - 1) * $rowCount;
                $max = $rowCount;
                $erreurs->setMaxResults($max)->setFirstResult($min);
            }
            $erreurs = $erreurs->getQuery()->getResult();
            $rows = array();
            foreach ($erreurs as $erreur) {
                $row = array(
                    "id" => $erreur->getId(),
                    "fieldId" => $erreur->getFieldId(),
                    "date" => $this->formatDate($erreur->getDateCreation()),
                    "utilisateur" => $erreur->getUtilisateur(),
                    "message" => $erreur->getMessage(),
                    "etat" => $erreur->getEtat(),
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
    }

    #[Route(path: '/patient/view/{id}', name: 'patient_view', methods: ['GET', 'POST'])]
    public function patient_index(Patient $patient, Request $request): Response
    {
        $oldArray = $this->serializeEntity($patient);

        #========== PATIENT ==========#
        $form = $this->createForm(PatientType::class, $patient);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $form, $oldArray, 'patient', 'patient');

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            /* SERIALISATION */
            $patientArray = $this->serializeEntity($form->getData());

            /* SPECIAL ERROR */

            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray, $patientArray, 'patient');

            $patient = $form->getData();
            $this->em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
            'patient' => $patient,
            'form' => $form->createView(),
            'constants_labels' => FormConstants::LABELS,
        ]);
    }

    private function formatDate(\DateTime $date)
    {
        $formatter = new \IntlDateFormatter(
            \Locale::getDefault(),
            \IntlDateFormatter::MEDIUM,
            \IntlDateFormatter::SHORT
        );
        return $formatter->format($date);
    }

    private function formatKey($key)
    {
        return strtolower(preg_replace('/(?<=[a-z])([A-Z]+)/', '_$1', $key));
    }

    private function serializeEntity($data)
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $serialized = $serializer->serialize($data, 'json', [
            'groups' => 'advancement',
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            },
        ]);
        return json_decode($serialized, true);
    }

    private function checkEmpty($x, $path = null)
    {
        if (is_array($x)) {
            $err = '{';
            $num = count($x);
            $i = 0;
            foreach ($x as $key) {
                if ($path) {
                    $err .= $key[$path] ? preg_replace('~\.0+$~', '', $key[$path]) : '(vide)';
                } else {
                    $err .= $key;
                }

                if (++$i != $num) {
                    $err .= ', ';
                }
            }
            $err .= '}';
            return $num > 0 ? $err : '(vide)';
        }
        return isset($x) ? $x : '(vide)';
    }

    private function array_diff_depth($a, $b, $path)
    {
        for ($i = 0; $i < count($a) - 1; $i++) {
            if ($a[$i][$path] != $b[$i][$path]) {
                return true;
            }
        }
        return false;
    }

    private function searchDiff(Patient $patient, $oldArray, $newArray, $path)
    {
        foreach ($newArray as $key => $value) {
            if (is_array($value)) {
                if (array_key_exists('timestamp', $value) && !isset($oldArray[$key]['timestamp'])) {
                    $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [(vide)] en [' . date('d/m/Y', $value['timestamp']) . ']', true);
                } else if (array_key_exists('timestamp', $value) && $oldArray[$key]['timestamp'] !== $value['timestamp']) {
                    $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . date('d/m/Y', $oldArray[$key]['timestamp']) . '] en [' . date('d/m/Y', $value['timestamp']) . ']', true);
                } else if (array_key_exists('response', $value) && $oldArray[$key]['response'] !== $value['response']) {
                    $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key) . '_response', 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key]['response']) . '] en [' . $this->checkEmpty($value['response']) . ']', true);
                } else if ($this->isMultipleSelect($key) && !empty(array_diff($oldArray[$key], $value))) {
                    $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key]) . '] en [' . $this->checkEmpty($value) . ']', true);
                } else if (!$this->isMultipleSelect($key)) {
                    $this->searchDiff($patient, $oldArray[$key], $newArray[$key], $path . '_' . $this->formatKey($key));
                }
            } else {
                if ($oldArray[$key] !== $value && $key === 'medicaments') {
                    $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key], 'name') . '] en [' . $this->checkEmpty($value, 'name') . ']', true);
                } else if ($oldArray[$key] !== $value && ($key === 'stressBullseye' || $key === 'basalBullseye') && $this->array_diff_depth($oldArray[$key]['segments'], $value['segments'], 'segment')) {
                    $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key]['segments'], 'segment') . '] en [' . $this->checkEmpty($value['segments'], 'segment') . ']', true);
                } else if ($oldArray[$key] !== $value) {
                    $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key]) . '] en [' . $this->checkEmpty($value) . ']', true);
                }
            }
        }
    }

    private function isMultipleSelect($key)
    {
        if (!is_string($key)) return;
        $field = array("alimentation", "gestionMedicaments", "problemes", "traitementPhaseAigue", "motifs");
        return in_array($key, $field);
    }

    private function addErreur($patientId, $fieldId, $etat, $message, bool $user)
    {
        $patient = $this->em->getRepository(Patient::class)->find($patientId);
        $createdAt = new DateTime("now", new DateTimeZone('Europe/Paris'));

        $erreur = new Erreur();
        $erreur->setDateCreation($createdAt);
        $erreur->setMessage($message);
        $erreur->setEtat($etat);
        $erreur->setFieldId($fieldId);
        $erreur->setUtilisateur($user ? $this->security->getUser()->getEmail() : 'Système');

        $patient->addErreur($erreur);
        $this->em->persist($erreur);
        $this->em->flush();
    }

    private function generateErreur($patientId, formInterface $form, $array, $start, $path)
    {
        $erreurs = $this->em->getRepository(Erreur::class)->getLastErreur($patientId);

        if (!isset($array[$start])) {
            return;
        }

        foreach ($array[$start] as $key => $value) {
            if (is_array($value) && !array_key_exists('timestamp', $value) && !array_key_exists('response', $value) && !$this->isMultipleSelect($key)) {
                $this->generateErreur($patientId, $form, $array[$start], $key, $path . '_' . $this->formatKey($key));
            }
            if (is_array($value) && array_key_exists('response', $value)) {
                $key = $key . '_response';
            }

            foreach ($erreurs as $erreur) {
                if ($erreur->getFieldId() === $path . '_' . $this->formatKey($key)) {
                    if ($erreur->getEtat() !== 'error') {
                        break;
                    }

                    $split = explode('_', $path . '_' . $key);
                    $formGet = $form;
                    foreach (array_slice($split, 1) as $s) {
                        $formGet = $formGet->get($s);
                    }
                    $formGet->addError(new FormError($erreur->getMessage()));
                    break;
                }
            }
        }
    }

    #[Route(path: '/erreur/add', name: 'erreur_add_info')]
    public function erreur_add_info(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $patientId = $request->get('patientId');
            $fieldId = $request->get('fieldId');
            $message = $request->get('message');
            if ($message === '') {
                return new JsonResponse('Error: Empty message');
            }

            $this->addErreur(intval($patientId), $this->formatKey($fieldId), 'info', $message, true);
            return new JsonResponse('Done.');
        }
    }

    #[Route(path: '/patient/{id}/letter', name: 'patient_letter', methods: ['GET', 'POST'])]
    public function letter(Patient $patient): Response
    {
        $letter = $this->em->getRepository(Letter::class)->findOneBy([]);
        if (!$letter) {
            $letter = new Letter();
            $this->em->persist($letter);
            $this->em->flush();
        }

        $jsonPatient = $this->serializeEntity($patient, 'json');

        return $this->render('patient/letter.html.twig', [
            'title' => 'Création de la lettre',
            'controller_name' => 'PatientController',
            'patient' => $jsonPatient,
            'letter' => $letter,
        ]);
    }

    #[Route(path: '/patient/{id}/letter/static', name: 'patient_letter_static', methods: ['GET', 'POST'])]
    public function letter_static(Patient $patient): Response
    {
        return $this->render('patient/letter_static.html.twig', [
            'title' => 'Lettre',
            'controller_name' => 'PatientController',
            'patient' => $patient,
            'constants_labels' => FormConstants::LABELS
        ]);
    }

    #[Route(path: '/patient/delete/{id}', name: 'patient_delete', methods: ['POST', 'DELETE'])]
    public function patient_delete(Request $request, Patient $patient): Response
    {
        if ($this->isCsrfTokenValid('delete' . $patient->getId(), $request->get('_token'))) {
            $this->em->remove($patient);
            $this->em->flush();

            $this->addFlash('notice', 'Le patient a été supprimé avec succès');
        }

        return $this->redirectToRoute('index_patient');
    }

    #[Route(path: '/patient/medicament/add', name: 'medicament_entree_add')]
    public function medicament_entree_add(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $protocoleId = $request->get('protocoleId');
            $medicamentId = $request->get('medicamentId');

            $protocole = $this->managerRegistry->getRepository(Protocole::class)->find($protocoleId);
            $medicament = $this->managerRegistry->getRepository(Medicament::class)->find($medicamentId);
            $protocole->getMedicamentsEntree()->addMedicament($medicament);

            $this->em->flush();

            return new JsonResponse(true);
        }
    }

    #[Route(path: '/patient/medicament/delete', name: 'medicament_entree_delete')]
    public function medicament_entree_delete(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $protocoleId = $request->get('protocoleId');
            $medicamentId = $request->get('medicamentId');

            $protocole = $this->managerRegistry->getRepository(Protocole::class)->find($protocoleId);
            $medicament = $this->managerRegistry->getRepository(Medicament::class)->find($medicamentId);

            $protocole->getMedicamentsEntree()->removeMedicament($medicament);
            $this->em->flush();

            return new JsonResponse(true);
        }
    }
}