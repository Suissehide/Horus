<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Protocole;
use App\Entity\Visite;

use Doctrine\ORM\EntityManagerInterface;

use App\Service\InitializePatient;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class VisiteController extends AbstractController
{
    /**
     * @var DoctrineManager
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager, private \Doctrine\Persistence\ManagerRegistry $managerRegistry)
    {
        $this->em = $entityManager;
    }

    #[Route(path: '/patient/visite/add/new', name: 'patient_visite_add_new', methods: ['GET', 'POST'])]
    public function patient_visite_add_new(Request $request, InitializePatient $initializePatient): Response
    {
        if ($request->isXmlHttpRequest()) {
            $patientId = $request->request->get('patientId');
            $type = $request->request->get('type');

            $patient = $this->managerRegistry->getRepository(Patient::class)->find($patientId);
            $initializePatient->createVisite($patient, $type);
            $this->em->flush();

            return new JsonResponse('success!', Response::HTTP_CREATED);
        }
        return new JsonResponse('bad request', Response::HTTP_BAD_REQUEST);
    }

    #[Route(path: '/patient/visite/add/existant', name: 'patient_visite_add_existant', methods: ['GET', 'POST'])]
    public function patient_visite_add_existant(Request $request, InitializePatient $initializePatient): Response
    {
        if ($request->isXmlHttpRequest()) {
            $patientId = $request->request->get('patientId');
            $protocoleId = $request->request->get('protocoleId');

            $patient = $this->managerRegistry->getRepository(Patient::class)->find($patientId);
            $protocole = $this->managerRegistry->getRepository(Protocole::class)->find($protocoleId);
            $visite = new Visite();
            $visite->setProtocole($protocole);
            $patient->addVisite($visite);

            $this->em->persist($visite);
            $this->em->flush();

            return new JsonResponse('success!', Response::HTTP_CREATED);
        }
        return new JsonResponse('bad request', Response::HTTP_BAD_REQUEST);
    }

    #[Route(path: '/patient/visite/delete', name: 'patient_visite_delete', methods: ['GET', 'POST'])]
    public function patient_visite_delete(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $patientId = $request->request->get('patientId');
            $visiteId = $request->request->get('visiteId');
            
            $patient = $this->managerRegistry->getRepository(Patient::class)->find($patientId);
            $visite = $this->managerRegistry->getRepository(Visite::class)->find($visiteId);
            $patient->removeVisite($visite);
            $this->em->remove($visite);
            $this->em->flush();

            return new JsonResponse('success!', Response::HTTP_OK);
        }
        return new JsonResponse('bad request', Response::HTTP_BAD_REQUEST);
    }
}
