<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Protocole;
use App\Entity\Suivi;

use Doctrine\ORM\EntityManagerInterface;

use App\Service\InitializePatient;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SuiviController extends AbstractController
{
    /**
     * @var DoctrineManager
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager, private \Doctrine\Persistence\ManagerRegistry $managerRegistry)
    {
        $this->em = $entityManager;
    }

    #[Route(path: '/patient/suivi/add/new', name: 'patient_suivi_add_new', methods: ['GET', 'POST'])]
    public function patient_suivi_add_new(Request $request, InitializePatient $initializePatient): Response
    {
        if ($request->isXmlHttpRequest()) {
            $patientId = $request->request->get('patientId');
            $type = $request->request->get('type');

            $patient = $this->managerRegistry->getRepository(Patient::class)->find($patientId);
            $initializePatient->createSuivi($patient, $type);
            $this->em->flush();

            return new JsonResponse('success!', Response::HTTP_CREATED);
        }
        return new JsonResponse('bad request', Response::HTTP_BAD_REQUEST);
    }

    #[Route(path: '/patient/suivi/add/existant', name: 'patient_suivi_add_existant', methods: ['GET', 'POST'])]
    public function patient_suivi_add_existant(Request $request, InitializePatient $initializePatient): Response
    {
        if ($request->isXmlHttpRequest()) {
            $patientId = $request->request->get('patientId');
            $protocoleId = $request->request->get('protocoleId');

            $patient = $this->managerRegistry->getRepository(Patient::class)->find($patientId);
            $protocole = $this->managerRegistry->getRepository(Protocole::class)->find($protocoleId);
            $suivi = new Suivi();
            $suivi->setProtocole($protocole);
            $patient->addSuivi($suivi);

            $this->em->persist($suivi);
            $this->em->flush();

            return new JsonResponse('success!', Response::HTTP_CREATED);
        }
        return new JsonResponse('bad request', Response::HTTP_BAD_REQUEST);
    }

    #[Route(path: '/patient/suivi/delete', name: 'patient_suivi_delete', methods: ['GET', 'POST'])]
    public function patient_suivi_delete(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $patientId = $request->request->get('patientId');
            $suiviId = $request->request->get('suiviId');
            
            $patient = $this->managerRegistry->getRepository(Patient::class)->find($patientId);
            $suivi = $this->managerRegistry->getRepository(Suivi::class)->find($suiviId);
            $patient->removeSuivi($suivi);
            $this->em->remove($suivi);
            $this->em->flush();

            return new JsonResponse('success!', Response::HTTP_OK);
        }
        return new JsonResponse('bad request', Response::HTTP_BAD_REQUEST);
    }
}
