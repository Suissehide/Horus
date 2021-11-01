<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Letter;
use App\Entity\Erreur;
use App\Entity\MedicamentsEntree;

use App\Form\PatientType;
use App\Form\GeneralType;
use App\Form\FacteurType;
use App\Form\MedicamentsEntreeType;

use App\Repository\ErreurRepository;

use DateTime;
use DateTimeZone;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use Symfony\Component\Security\Core\Security;

class PatientController extends AbstractController
{
    /**
     * @Route("/patient/add", name="patient_add", methods={"GET", "POST"})
     */
    public function patient_add(Request $request): Response
    {
        $patient = new Patient();
        $form = $this->createForm(PatientType::class, $patient);

        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $patient = $form->getData();

            // if ($patient->getCode() == '')
            //     $patient->setCode('ERROR');
            // else {
            //     $id = count($em->getRepository(Patient::class)->findAll()) == 0 ? '1' : $em->getRepository(Patient::class)->findOneBy([], ['id' => 'desc'])->getCode();
            //     $id = intval(substr($id, 0, 3)) + 1;
            //     $id = str_pad($id, 3, "0", STR_PAD_LEFT);
            //     $patient->setCode($id . ' ' . strtoupper($patient->getCode()));
            // }

            $patient->getProtocole()->setMedicamentsEntree(new MedicamentsEntree());

            $em->persist($patient);
            $em->flush();

            // $this->addErreur($patient->getId(), $patient->getCode(), 'notice', 'Création du patient ' . $patient->getCode(), true);
            return $this->redirectToRoute('patient_view', ['id' => $patient->getId()]);
        }
        return $this->render('patient/create.html.twig', [
            'title' => 'Création d\'un patient',
            'controller_name' => 'PatientController',
            'form' => $form->createView(),
        ]);
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
            if ($searchPhrase != "")
                $count = count($erreurs->getQuery()->getResult());
            else
                $count = $erreurRepository->getCountAll($patientId);
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
                "total" => intval($count)
            );
            return new JsonResponse($data);
        }
    }

    /**
     * @Route("/patient/view/{id}", name="patient_view", methods={"GET", "POST"})
     */
    public function patient_index(Patient $patient, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $oldArray = $this->serializeEntity($patient);


        #========== GENERAL ==========#
        $general = $patient->getGeneral();
        $formGeneral = $this->createForm(GeneralType::class, $general);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formGeneral, $oldArray, 'general', 'general');

        $formGeneral->handleRequest($request);
        if ($formGeneral->isSubmitted() && $formGeneral->isValid()) {

            /* SERIALISATION */
            $generalArray = $this->serializeEntity($formGeneral->getData());

            /* SPECIAL ERROR */


            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray, $generalArray, 'general', 'general');

            $patient = $formGeneral->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== FACTEUR ==========#
        $facteur = $patient->getFacteur();
        $formFacteur = $this->createForm(FacteurType::class, $facteur);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formFacteur, $oldArray, 'facteur', 'facteur');

        $formFacteur->handleRequest($request);
        if ($formFacteur->isSubmitted() && $formFacteur->isValid()) {

            /* SERIALISATION */
            $facteurArray = $this->serializeEntity($formFacteur->getData());

            /* SPECIAL ERROR */


            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray, $facteurArray, 'facteur', 'facteur');

            $patient = $formFacteur->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== MEDICAMENTS A L ENTREE ==========#
        $medicamentsEntree = $patient->getProtocole()->getMedicamentsEntree();
        $formMedicamentsEntree = $this->createForm(MedicamentsEntreeType::class, $medicamentsEntree);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formMedicamentsEntree, $oldArray, 'medicamentsEntree', 'medicamentsEntree');

        $formMedicamentsEntree->handleRequest($request);
        if ($formMedicamentsEntree->isSubmitted() && $formMedicamentsEntree->isValid()) {

            /* SERIALISATION */
            $facteurArray = $this->serializeEntity($formMedicamentsEntree->getData());

            /* SPECIAL ERROR */


            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray, $facteurArray, 'medicamentsEntree', 'medicamentsEntree');

            $patient = $formMedicamentsEntree->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }



        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
            'patient' => $patient,
            'formGeneral' => $formGeneral->createView(),
            'formFacteur' => $formFacteur->createView(),

            'formMedicamentsEntree' => $formMedicamentsEntree->createView(),
            'date' => date("d/m/Y")
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
            }
        ]);
        return json_decode($serialized, true);
    }

    private function checkEmpty($x)
    {
        if (is_array($x)) {
            $err = '';
            $num = count($x);
            $i = 0;
            foreach ($x as $key) {
                $err .= $key;
                if (++$i != $num)
                    $err .= ', ';
            }
            return $num > 0 ? $err : '(vide)';
        }
        return isset($x) ? $x : '(vide)';
    }

    private function searchDiff(Patient $patient, $oldArray, $newArray, $start, $path)
    {
        foreach ($newArray as $key => $value) {
            if (is_array($value) && array_key_exists('timestamp', $value)) {
                if (!isset($oldArray[$start][$key]['timestamp']))
                    $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [(vide)] en [' . date('d/m/Y', $value['timestamp']) . ']', true);
                else if ($oldArray[$start][$key]['timestamp'] !== $value['timestamp'])
                    $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . date('d/m/Y', $oldArray[$start][$key]['timestamp']) . '] en [' . date('d/m/Y', $value['timestamp']) . ']', true);
            } else if (is_array($oldArray[$start][$key]) && array_key_exists('timestamp', $oldArray[$start][$key]) && !is_array($value)) {
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . date('d/m/Y', $oldArray[$start][$key]['timestamp']) . '] en [(vide)]', true);
            } else if (is_array($value) && array_key_exists('reponse', $value) && $oldArray[$start][$key]['reponse'] !== $value['reponse']) {
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key) . '_reponse', 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$start][$key]['reponse']) . '] en [' . $this->checkEmpty($value['reponse']) . ']', true);
            } else if (is_array($value) && ('alimentation' === $key || 'traitementPhaseAigue' === $key) && !empty(array_diff($oldArray[$start][$key], $value))) {
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$start][$key]) . '] en [' . $this->checkEmpty($value) . ']', true);
            } else if (is_array($value) && !array_key_exists('timestamp', $value) && !array_key_exists('reponse', $value) && ('alimentation' !== $key && 'traitementPhaseAigue' !== $key)) {
                $this->searchDiff($patient, $oldArray[$start], $newArray[$key], $key, $path . '_' . $this->formatKey($key));
            } else if ($oldArray[$start][$key] !== $value)
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$start][$key]) . '] en [' . $this->checkEmpty($value) . ']', true);
        }
    }

    private function generateErreur($patientId, formInterface $form, $array, $start, $path)
    {
        $em = $this->getDoctrine()->getManager();
        $erreurs = $em->getRepository(Erreur::class)->getLastErreur($patientId);

        if (!isset($array[$start])) return;

        foreach ($array[$start] as $key => $value) {
            if (is_array($value) && !array_key_exists('timestamp', $value) && !array_key_exists('reponse', $value) && ('alimentation' !== $key && 'traitementPhaseAigue' !== $key)) {
                $this->generateErreur($patientId, $form, $array[$start], $key, $path . '_' . $this->formatKey($key));
            }
            if (is_array($value) && array_key_exists('reponse', $value))
                $key = $key . '_reponse';

            foreach ($erreurs as $erreur) {
                if ($erreur->getFieldId() === $path . '_' . $this->formatKey($key)) {
                    if ($erreur->getEtat() !== 'error')
                        break;
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
        $em = $this->getDoctrine()->getManager();
        $patient = $em->getRepository(Patient::class)->find($patientId);
        $createdAt = new DateTime("now", new DateTimeZone('Europe/Paris'));

        $erreur = new Erreur();
        $erreur->setDateCreation($createdAt);
        $erreur->setEtat($etat);
        $erreur->setMessage($message);
        $erreur->setFieldId($fieldId);
        $erreur->setUtilisateur($user ? $this->security->getUser()->getEmail() : 'Système');

        $patient->addErreur($erreur);
        $em->persist($erreur);
        $em->flush();
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
            if ($message === '')
                return new JsonResponse('Error: Empty message');
            $this->addErreur(intval($patientId), $this->formatKey($fieldId), 'info', $message, true);
            return new JsonResponse('Done.');
        }
    }

    /**
     * @Route("/patient/{id}/letter", name="patient_letter", methods={"GET", "POST"})
     */
    public function letter(Patient $patient): Response
    {
        $em = $this->getDoctrine()->getManager();
        $letter = $em->getRepository(Letter::class)->findOneBy([]);
        $letter = $em->getRepository(Letter::class)->findOneBy([]);
        if (!$letter) {
            $letter = new Letter();
            $em->persist($letter);
            $em->flush();
        }

        return $this->render('patient/letter.html.twig', [
            'title' => 'Création de la lettre',
            'controller_name' => 'PatientController',
            'patient' => $patient,
            'letter' => $letter
        ]);
    }

    /**
     * @Route("/patient/delete/{id}", name="patient_delete", methods={"POST", "DELETE"})
     */
    public function patient_delete(Request $request, Patient $patient): Response
    {
        if ($this->isCsrfTokenValid('delete' . $patient->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($patient);
            $em->flush();

            $this->addFlash('notice', 'Le patient a été supprimé avec succès');
        }

        return $this->redirectToRoute('index_patient');
    }
}
