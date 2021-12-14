<?php

namespace App\Controller;

use App\Entity\AngioplastiePontage;
use App\Entity\BFR;
use App\Entity\Catheterisation;
use App\Entity\Deces;
use App\Entity\Echocardiographie;
use App\Entity\EchographieVasculaire;
use App\Entity\Facteur;
use App\Entity\General;
use App\Entity\Erreur;
use App\Entity\Letter;
use App\Entity\Medicament;
use App\Entity\MedicamentsEntree;
use App\Entity\NeuroImagerie;
use App\Entity\NeuroPsychologie;
use App\Entity\Patient;
use App\Entity\Segment;
use App\Entity\TestEffort;
use App\Entity\Visite;
use App\Entity\Bullseye;

use App\Form\AngioplastiePontageType;
use App\Form\BFRType;
use App\Form\CatheterisationType;
use App\Form\DecesType;
use App\Form\EchocardiographieType;
use App\Form\EchographieVasculaireType;
use App\Form\FacteurType;
use App\Form\GeneralType;
use App\Form\MedicamentsEntreeType;
use App\Form\NeuroImagerieType;
use App\Form\NeuroPsychologieType;
use App\Form\PatientType;
use App\Form\TestEffortType;
use App\Form\VisiteType;
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

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class PatientController extends AbstractController
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
       $this->security = $security;
    }

    /**
     * @Route("/patient/add", name="patient_add", methods={"GET", "POST"})
     */
    public function patient_add(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
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
            $this->echocardiographie_create($patient);
            $patient->getProtocole()->setEchographieVasculaire(new EchographieVasculaire());
            $patient->getProtocole()->setMedicamentsEntree(new MedicamentsEntree());
            $patient->getProtocole()->setNeuroImagerie(new NeuroImagerie());
            $patient->getProtocole()->setNeuroPsychologie(new NeuroPsychologie());
            $patient->getProtocole()->setTestEffort(new TestEffort());
            $patient->getProtocole()->setVisite(new Visite());

            $em->persist($patient);
            $em->flush();

            $this->addErreur($patient->getId(), $patient->getCode(), 'notice', 'Création du patient ' . $patient->getCode(), true);
            return $this->redirectToRoute('patient_view', ['id' => $patient->getId()]);
        }
        return $this->render('patient/create.html.twig', [
            'title' => 'Création d\'un patient',
            'controller_name' => 'PatientController',
            'form' => $form->createView(),
        ]);
    }

    private function echocardiographie_create(Patient $patient)
    {
        $em = $this->getDoctrine()->getManager();
        $echocardiographie = new Echocardiographie();

        $bullseyes = new Bullseye();
        for ($i = 0; $i < 16; $i++) { $bullseyes->addSegment(new Segment()); }
        $echocardiographie->setBasalBullseye($bullseyes);

        $bullseyes = new Bullseye();
        for ($i = 0; $i < 16; $i++) { $bullseyes->addSegment(new Segment()); }
        $echocardiographie->setStressBullseye($bullseyes);

        $em->persist($echocardiographie);
        $em->flush();
        $patient->getProtocole()->setEchocardiographie($echocardiographie);
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
            $this->searchDiff($patient, $oldArray['general'], $generalArray, 'general');

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
            $this->searchDiff($patient, $oldArray['facteur'], $facteurArray, 'facteur');

            $patient = $formFacteur->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== DECES ==========#
        $deces = $patient->getDeces();
        if (!$deces) {
            $patient->setDeces(new Deces());
            $em->persist($patient);
            $em->flush();
        }
        $formDeces = $this->createForm(DecesType::class, $deces);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formDeces, $oldArray, 'deces', 'deces');

        $formDeces->handleRequest($request);
        if ($formDeces->isSubmitted() && $formDeces->isValid()) {

            /* SERIALISATION */
            $decesArray = $this->serializeEntity($formDeces->getData());

            /* SPECIAL ERROR */

            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray['deces'], $decesArray, 'deces');

            $patient = $formDeces->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== ANGIOPLASTIE PONTAGE ==========#
        $angioplastiePontage = $patient->getProtocole()->getAngioplastiePontage();
        $formAngioplastiePontage = $this->createForm(AngioplastiePontageType::class, $angioplastiePontage);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formAngioplastiePontage, $oldArray, 'angioplastiePontage', 'angioplastiePontage');

        $formAngioplastiePontage->handleRequest($request);
        if ($formAngioplastiePontage->isSubmitted() && $formAngioplastiePontage->isValid()) {

            /* SERIALISATION */
            $facteurArray = $this->serializeEntity($formAngioplastiePontage->getData());

            /* SPECIAL ERROR */

            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray['protocole']['angioplastiePontage'], $facteurArray, 'angioplastiePontage');

            $patient = $formAngioplastiePontage->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== BFR ==========#
        $BFR = $patient->getProtocole()->getBFR();
        $formBFR = $this->createForm(BFRType::class, $BFR);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formBFR, $oldArray, 'bFR', 'bFR');

        $formBFR->handleRequest($request);
        if ($formBFR->isSubmitted() && $formBFR->isValid()) {

            /* SERIALISATION */
            $facteurArray = $this->serializeEntity($formBFR->getData());

            /* SPECIAL ERROR */

            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray['protocole']['bFR'], $facteurArray, 'bFR');

            $patient = $formBFR->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== CATHETERISATION ==========#
        $catheterisation = $patient->getProtocole()->getCatheterisation();
        $formCatheterisation = $this->createForm(CatheterisationType::class, $catheterisation);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formCatheterisation, $oldArray, 'catheterisation', 'catheterisation');

        $formCatheterisation->handleRequest($request);
        if ($formCatheterisation->isSubmitted() && $formCatheterisation->isValid()) {

            /* SERIALISATION */
            $facteurArray = $this->serializeEntity($formCatheterisation->getData());

            /* SPECIAL ERROR */

            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray['protocole']['catheterisation'], $facteurArray, 'catheterisation');

            $patient = $formCatheterisation->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== ECHOCARDIOGRAPHIE ==========#
        $echocardiographie = $patient->getProtocole()->getEchocardiographie();
        $formEchocardiographie = $this->createForm(EchocardiographieType::class, $echocardiographie);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formEchocardiographie, $oldArray, 'echocardiographie', 'echocardiographie');

        $formEchocardiographie->handleRequest($request);
        if ($formEchocardiographie->isSubmitted() && $formEchocardiographie->isValid()) {

            /* SERIALISATION */
            $facteurArray = $this->serializeEntity($formEchocardiographie->getData());

            /* SPECIAL ERROR */

            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray['protocole']['echocardiographie'], $facteurArray, 'echocardiographie');

            $patient = $formEchocardiographie->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== ECHOGRAPHIE VASCULAIRE ==========#
        $echographieVasculaire = $patient->getProtocole()->getEchographieVasculaire();
        $formEchographieVasculaire = $this->createForm(EchographieVasculaireType::class, $echographieVasculaire);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formEchographieVasculaire, $oldArray, 'echographieVasculaire', 'echographieVasculaire');

        $formEchographieVasculaire->handleRequest($request);
        if ($formEchographieVasculaire->isSubmitted() && $formEchographieVasculaire->isValid()) {

            /* SERIALISATION */
            $facteurArray = $this->serializeEntity($formEchographieVasculaire->getData());

            /* SPECIAL ERROR */

            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray['protocole']['echographieVasculaire'], $facteurArray, 'echographieVasculaire');

            $patient = $formEchographieVasculaire->getData();
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
            $this->searchDiff($patient, $oldArray['protocole']['medicamentsEntree'], $facteurArray, 'medicamentsEntree');

            $patient = $formMedicamentsEntree->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== NEURO IMAGERIE ==========#
        $neuroImagerie = $patient->getProtocole()->getNeuroImagerie();
        $formNeuroImagerie = $this->createForm(NeuroImagerieType::class, $neuroImagerie);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formNeuroImagerie, $oldArray, 'neuroImagerie', 'neuroImagerie');

        $formNeuroImagerie->handleRequest($request);
        if ($formNeuroImagerie->isSubmitted() && $formNeuroImagerie->isValid()) {

            /* SERIALISATION */
            $facteurArray = $this->serializeEntity($formNeuroImagerie->getData());

            /* SPECIAL ERROR */

            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray['protocole']['neuroImagerie'], $facteurArray, 'neuroImagerie');

            $patient = $formNeuroImagerie->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== NEURO PSYCHOLOGIE ==========#
        $neuroPsychologie = $patient->getProtocole()->getNeuroPsychologie();
        $formNeuroPsychologie = $this->createForm(NeuroPsychologieType::class, $neuroPsychologie);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formNeuroPsychologie, $oldArray, 'neuroPsychologie', 'neuroPsychologie');

        $formNeuroPsychologie->handleRequest($request);
        if ($formNeuroPsychologie->isSubmitted() && $formNeuroPsychologie->isValid()) {

            /* SERIALISATION */
            $facteurArray = $this->serializeEntity($formNeuroPsychologie->getData());

            /* SPECIAL ERROR */

            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray['protocole']['neuroPsychologie'], $facteurArray, 'neuroPsychologie');

            $patient = $formNeuroPsychologie->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== TEST EFFORT ==========#
        $testEffort = $patient->getProtocole()->getTestEffort();
        $formTestEffort = $this->createForm(TestEffortType::class, $testEffort);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formTestEffort, $oldArray, 'testEffort', 'testEffort');

        $formTestEffort->handleRequest($request);
        if ($formTestEffort->isSubmitted() && $formTestEffort->isValid()) {

            /* SERIALISATION */
            $facteurArray = $this->serializeEntity($formTestEffort->getData());

            /* SPECIAL ERROR */

            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray['protocole']['testEffort'], $facteurArray, 'testEffort');

            $patient = $formTestEffort->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        #========== VISITE ==========#
        $visite = $patient->getProtocole()->getVisite();
        if (!$visite) {
            $patient->getProtocole()->setVisite(new Visite());
            $em->persist($patient);
            $em->flush();
        }
        $formVisite = $this->createForm(VisiteType::class, $visite);

        /* GENERATE ERREUR */
        $this->generateErreur($patient->getId(), $formVisite, $oldArray, 'visite', 'visite');

        $formVisite->handleRequest($request);
        if ($formVisite->isSubmitted() && $formVisite->isValid()) {

            /* SERIALISATION */
            $facteurArray = $this->serializeEntity($formVisite->getData());

            /* SPECIAL ERROR */

            /* SEARCH DIFF */
            $this->searchDiff($patient, $oldArray['protocole']['visite'], $facteurArray, 'visite');

            $patient = $formVisite->getData();
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
            'patient' => $patient,
            'date' => date("d/m/Y"),

            'formGeneral' => $formGeneral->createView(),
            'formFacteur' => $formFacteur->createView(),
            'formDeces' => $formDeces->createView(),

            'formAngioplastiePontage' => $formAngioplastiePontage->createView(),
            'formBFR' => $formBFR->createView(),
            'formCatheterisation' => $formCatheterisation->createView(),
            'formEchocardiographie' => $formEchocardiographie->createView(),
            'formEchographieVasculaire' => $formEchographieVasculaire->createView(),
            'formMedicamentsEntree' => $formMedicamentsEntree->createView(),
            'formNeuroImagerie' => $formNeuroImagerie->createView(),
            'formNeuroPsychologie' => $formNeuroPsychologie->createView(),
            'formTestEffort' => $formTestEffort->createView(),
            'formVisite' => $formVisite->createView(),
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
            }
            else if ($oldArray[$key] !== $value && $key === 'medicaments') {
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key], 'name') . '] en [' . $this->checkEmpty($value, 'name') . ']', true);
            }
            else if ($oldArray[$key] !== $value && ($key === 'stressBullseye' || $key === 'basalBullseye') && $this->array_diff_depth($oldArray[$key]['segments'], $value['segments'], 'segment')) {
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key]['segments'], 'segment') . '] en [' . $this->checkEmpty($value['segments'], 'segment') . ']', true);
            }
            else if ($oldArray[$key] !== $value && is_array($value) && !empty(array_diff_assoc($oldArray[$key], $value))) {
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key]) . '] en [' . $this->checkEmpty($value) . ']', true);
            }
            else if ($oldArray[$key] !== $value && !is_array($value)) {
                $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$key]) . '] en [' . $this->checkEmpty($value) . ']', true);
            }

            // else if (is_array($oldArray[$start][$key]) && array_key_exists('timestamp', $oldArray[$start][$key]) && !is_array($value)) {
            //     $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . date('d/m/Y', $oldArray[$start][$key]['timestamp']) . '] en [(vide)]', true);
            // }
            // else if (is_array($value) && array_key_exists('reponse', $value) && $oldArray[$start][$key]['reponse'] !== $value['reponse']) {
            //     $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key) . '_reponse', 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$start][$key]['reponse']) . '] en [' . $this->checkEmpty($value['reponse']) . ']', true);
            // }
            // else if (is_array($value) && ('alimentation' === $key || 'traitementPhaseAigue' === $key) && !empty(array_diff($oldArray[$start][$key], $value))) {
            //     $this->addErreur($patient->getId(), $path . '_' . $this->formatKey($key), 'notice', 'Modification du champ [' . $path . '_' . $this->formatKey($key) . '] de [' . $this->checkEmpty($oldArray[$start][$key]) . '] en [' . $this->checkEmpty($value) . ']', true);
            // }
            // else if (is_array($value) && !array_key_exists('timestamp', $value) && !array_key_exists('reponse', $value) && ('alimentation' !== $key && 'traitementPhaseAigue' !== $key)) {
            //     $this->searchDiff($patient, $oldArray[$start], $newArray[$key], $key, $path . '_' . $this->formatKey($key));
            // }
        }
    }

    private function generateErreur($patientId, formInterface $form, $array, $start, $path)
    {
        $em = $this->getDoctrine()->getManager();
        $erreurs = $em->getRepository(Erreur::class)->getLastErreur($patientId);

        if (!isset($array[$start])) {
            return;
        }

        foreach ($array[$start] as $key => $value) {
            if (is_array($value) && !array_key_exists('timestamp', $value) && !array_key_exists('reponse', $value) && ('alimentation' !== $key && 'traitementPhaseAigue' !== $key)) {
                $this->generateErreur($patientId, $form, $array[$start], $key, $path . '_' . $this->formatKey($key));
            }
            if (is_array($value) && array_key_exists('reponse', $value)) {
                $key = $key . '_reponse';
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
        $em = $this->getDoctrine()->getManager();
        $letter = $em->getRepository(Letter::class)->findOneBy([]);
        $letter = $em->getRepository(Letter::class)->findOneBy([]);
        if (!$letter) {
            $letter = new Letter();
            $em->persist($letter);
            $em->flush();
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
            $em = $this->getDoctrine()->getManager();
            $em->remove($patient);
            $em->flush();

            $this->addFlash('notice', 'Le patient a été supprimé avec succès');
        }

        return $this->redirectToRoute('index_patient');
    }

    /**
     * @Route("/patient/medicament/add", name="medicament_entree_add")
     */
    public function medicament_entree_add(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {
            $patientId = $request->request->get('patient');
            $medicamentId = $request->request->get('medicament');

            $patient = $this->getDoctrine()->getRepository(Patient::class)->find($patientId);
            $medicament = $this->getDoctrine()->getRepository(Medicament::class)->find($medicamentId);
            $patient->getProtocole()->getMedicamentsEntree()->addMedicament($medicament);

            $em->flush();

            return new JsonResponse(true);
        }
    }

    /**
     * @Route("/patient/medicament/delete", name="medicament_entree_delete")
     */
    public function medicament_entree_delete(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {
            $patientId = $request->request->get('patient');
            $medicamentId = $request->request->get('medicament');

            $patient = $this->getDoctrine()->getRepository(Patient::class)->find($patientId);
            $medicament = $this->getDoctrine()->getRepository(Medicament::class)->find($medicamentId);

            $patient->getProtocole()->getMedicamentsEntree()->removeMedicament($medicament);
            $em->flush();

            return new JsonResponse(true);
        }
    }
}
