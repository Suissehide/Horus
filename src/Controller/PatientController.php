<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\General;

use App\Entity\AngioplastiePontage;
use App\Entity\BFR;
use App\Entity\Catheterisation;
use App\Entity\EchographieCardiaque;
use App\Entity\EchographieVasculaire;
use App\Entity\Facteur;
use App\Entity\Medicament;
use App\Entity\MedicamentsEntree;
use App\Entity\NeuroPsychologie;
use App\Entity\TestEffort;
use App\Entity\Visite;

use App\Entity\Segment;
use App\Entity\Bullseye;
use App\Entity\Letter;
use App\Entity\Erreur;
use App\Entity\QCM;
use App\Entity\BMQ;

use App\Form\PatientType;

use App\Constant\FormConstants;

use App\Repository\ErreurRepository;

use DateTime;
use DateTimeZone;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;

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

    public function __construct(Security $security, EntityManagerInterface $entityManager)
    {
        $this->security = $security;
        $this->em = $entityManager;
    }

    /**
     * @Route("/patient/add", name="patient_add", methods={"GET", "POST"})
     */
    public function patient_add(Request $request): Response
    {
        $patient = new Patient();
        $form = $this->createForm(PatientType::class, $patient);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $patient = $form->getData();

            $type = $form->get('general')->get('feuille')->getData();
            switch ($type) {
                case 'Ensemble 1':
                    $patient->getProtocole()->setFiches(['bfr', 'testsEffort']);
                    break;

                case 'Ensemble 2':
                    $patient->getProtocole()->setFiches(['echocardiographie', 'neuroPsychologie', 'visite']);
                    break;

                default:
                    break;
            }

            $patient->getProtocole()->setAngioplastiePontage(new AngioplastiePontage());
            $patient->getProtocole()->setBFR(new BFR());
            $patient->getProtocole()->setCatheterisation(new Catheterisation());
            $patient->getProtocole()->setEchographieCardiaque(new EchographieCardiaque());
            $patient->getProtocole()->setEchographieVasculaire(new EchographieVasculaire());
            
            $patient->getProtocole()->setNeuroPsychologie(new NeuroPsychologie());
            $patient->getProtocole()->setTestEffort(new TestEffort());
            $patient->getProtocole()->setVisite(new Visite());
            $this->createMedicamentsEntree($patient);

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

    private function createMedicamentsEntree(Patient $patient)
    {
        $medicamentsEntree = new MedicamentsEntree();

        foreach (FormConstants::VERBATIMS_VECU as $name) {
            $qcm = new QCM();
            $medicamentsEntree->addVerbatim($qcm);
        }

        foreach (FormConstants::VERBATIMS_SANTE as $name) {
            $qcm = new QCM();
            $medicamentsEntree->addVerbatimsSante($qcm);
        }

        foreach (FormConstants::QUESTIONNAIRE as $name) {
            $bmq = new BMQ();
            $medicamentsEntree->addQuestionnaire($bmq);
        }

        $this->em->persist($medicamentsEntree);
        $this->em->flush();
        $patient->getProtocole()->setMedicamentsEntree($medicamentsEntree);
    }

    /**
     * @Route("/patient/history", name="history_list")
     */
    public function patient_history(ErreurRepository $erreurRepository, Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $current = $request->request->get('current');
            $rowCount = $request->request->get('rowCount');
            $searchPhrase = $request->request->get('searchPhrase');
            $sort = $request->request->get('sort');
            $patientId = $request->request->get('patientId');

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

    /**
     * @Route("/patient/view/{id}", name="patient_view", methods={"GET", "POST"})
     */
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
            // $this->searchDiff($patient, $oldArray, $patientArray, 'patient');

            $patient = $form->getData();
            $this->em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== VISITE ==========#
        $visite = $patient->getProtocole()->getVisite();
        if (!$visite) {
            $patient->getProtocole()->setVisite(new Visite());
            $this->em->persist($patient);
            $this->em->flush();
        }

        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
            'patient' => $patient,
            'date' => date("d/m/Y"),

            'form' => $form->createView(),
            'constants_verbatims_vecu' => FormConstants::VERBATIMS_VECU,
            'constants_verbatims_sante' => FormConstants::VERBATIMS_SANTE,
            'constants_questionnaire' => FormConstants::QUESTIONNAIRE
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

    private function checkEmpty($x, $path = NULL)
    {
        if (is_array($x)) {
            $err = '{';
            $num = count($x);
            $i = 0;
            foreach ($x as $key) {
                if ($path)
                    $err .= $key[$path] ? preg_replace('~\.0+$~', '', $key[$path]) : '(vide)';
                else
                    $err .= $key;
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
            if ($a[$i][$path] != $b[$i][$path]) return true;
        }
        return false;
    }

    private function searchDiff(Patient $patient, $oldArray, $newArray, $path)
    {
        foreach ($newArray as $key => $value) {
            if (is_array($value) && array_key_exists('timestamp', $value)) {
                if (!isset($oldArray[$key]['timestamp'])) {
                    $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [(vide)] en [' . date('d/m/Y', $value['timestamp']) . ']', true);
                } else if ($oldArray[$key]['timestamp'] !== $value['timestamp']) {
                    $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . date('d/m/Y', $oldArray[$key]['timestamp']) . '] en [' . date('d/m/Y', $value['timestamp']) . ']', true);
                }
            } else if ($oldArray[$key] !== $value && $key === 'medicaments') {
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key], 'name') . '] en [' . $this->checkEmpty($value, 'name') . ']', true);
            } else if ($oldArray[$key] !== $value && ($key === 'stressBullseye' || $key === 'basalBullseye') && $this->array_diff_depth($oldArray[$key]['segments'], $value['segments'], 'segment')) {
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key]['segments'], 'segment') . '] en [' . $this->checkEmpty($value['segments'], 'segment') . ']', true);
            } else if ($oldArray[$key] !== $value && is_array($value) && !empty(array_diff_assoc($oldArray[$key], $value))) {
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key]) . '] en [' . $this->checkEmpty($value) . ']', true);
            } else if ($oldArray[$key] !== $value && !is_array($value)) {
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key]) . '] en [' . $this->checkEmpty($value) . ']', true);
            }

            // else if (is_array($oldArray[$start][$key]) && array_key_exists('timestamp', $oldArray[$start][$key]) && !is_array($value)) {
            //     $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . date('d/m/Y', $oldArray[$start][$key]['timestamp']) . '] en [(vide)]', true);
            // }
            // else if (is_array($value) && array_key_exists('response', $value) && $oldArray[$start][$key]['response'] !== $value['response']) {
            //     $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key) . '_response', 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$start][$key]['response']) . '] en [' . $this->checkEmpty($value['response']) . ']', true);
            // }
            // else if (is_array($value) && ('alimentation' === $key || 'traitementPhaseAigue' === $key) && !empty(array_diff($oldArray[$start][$key], $value))) {
            //     $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$start][$key]) . '] en [' . $this->checkEmpty($value) . ']', true);
            // }
            // else if (is_array($value) && !array_key_exists('timestamp', $value) && !array_key_exists('response', $value) && ('alimentation' !== $key && 'traitementPhaseAigue' !== $key)) {
            //     $this->searchDiff($patient, $oldArray[$start], $newArray[$key], $key, $path . '_' . $this->formatKey($key));
            // }
        }
    }

    private function generateErreur($patientId, formInterface $form, $array, $start, $path)
    {
        $erreurs = $this->em->getRepository(Erreur::class)->getLastErreur($patientId);

        if (!isset($array[$start])) {
            return;
        }

        foreach ($array[$start] as $key => $value) {
            if (is_array($value) && !array_key_exists('timestamp', $value) && !array_key_exists('response', $value) && ('alimentation' !== $key && 'traitementPhaseAigue' !== $key)) {
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

    private function addErreur($patientId, $fieldId, $etat, $message, bool $user)
    {
        $patient = $this->em->getRepository(Patient::class)->find($patientId);
        $createdAt = new DateTime("now", new DateTimeZone('Europe/Paris'));

        $erreur = new Erreur();
        $erreur->setDateCreation($createdAt);
        $erreur->setEtat($etat);
        $erreur->setMessage($message);
        $erreur->setFieldId($fieldId);
        $erreur->setUtilisateur($user ? $this->security->getUser()->getEmail() : 'Système');

        $patient->addErreur($erreur);
        $this->em->persist($erreur);
        $this->em->flush();
    }

    /**
     * @Route("/erreur/add", name="erreur_add_info")
     */
    public function erreur_add_info(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $patientId = $request->request->get('patientId');
            $fieldId = $request->request->get('fieldId');
            $message = $request->request->get('message');
            if ($message === '') {
                return new JsonResponse('Error: Empty message');
            }

            $this->addErreur(intval($patientId), $this->formatKey($fieldId), 'info', $message, true);
            return new JsonResponse('Done.');
        }
    }

    /**
     * @Route("/patient/{id}/letter", name="patient_letter", methods={"GET", "POST"})
     */
    public function letter(Patient $patient): Response
    {
        $letter = $this->em->getRepository(Letter::class)->findOneBy([]);
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

    /**
     * @Route("/patient/delete/{id}", name="patient_delete", methods={"POST", "DELETE"})
     */
    public function patient_delete(Request $request, Patient $patient): Response
    {
        if ($this->isCsrfTokenValid('delete' . $patient->getId(), $request->request->get('_token'))) {
            $this->em->remove($patient);
            $this->em->flush();

            $this->addFlash('notice', 'Le patient a été supprimé avec succès');
        }

        return $this->redirectToRoute('index_patient');
    }

    /**
     * @Route("/patient/medicament/add", name="medicament_entree_add")
     */
    public function medicament_entree_add(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $patientId = $request->request->get('patient');
            $medicamentId = $request->request->get('medicament');

            $patient = $this->getDoctrine()->getRepository(Patient::class)->find($patientId);
            $medicament = $this->getDoctrine()->getRepository(Medicament::class)->find($medicamentId);
            $patient->getProtocole()->getMedicamentsEntree()->addMedicament($medicament);

            $this->em->flush();

            return new JsonResponse(true);
        }
    }

    /**
     * @Route("/patient/medicament/delete", name="medicament_entree_delete")
     */
    public function medicament_entree_delete(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $patientId = $request->request->get('patient');
            $medicamentId = $request->request->get('medicament');

            $patient = $this->getDoctrine()->getRepository(Patient::class)->find($patientId);
            $medicament = $this->getDoctrine()->getRepository(Medicament::class)->find($medicamentId);

            $patient->getProtocole()->getMedicamentsEntree()->removeMedicament($medicament);
            $this->em->flush();

            return new JsonResponse(true);
        }
    }
}
