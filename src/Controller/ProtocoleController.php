<?php

namespace App\Controller;

use App\Entity\Protocole;
use App\Service\InitializePatient;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProtocoleController extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    #[Route(path: '/fiche/add', name: 'fiche_add')]
    public function fiche_add(Request $request, InitializePatient $initializePatient): Response
    {
        if ($request->isXmlHttpRequest()) {
            $fiche = $request->get('fiche');
            $protocoleId = $request->get('protocoleId');

            $protocole = $this->em->getRepository(Protocole::class)->find($protocoleId);

            $fiches = $protocole->getFiches();
            $fiches[] = $fiche;
            $protocole->setFiches($fiches);

            $initializePatient->createProtocole($protocole);

            $this->em->flush();

            return new JsonResponse('success!', Response::HTTP_OK);
        }
        return new JsonResponse(['error' => 'Invalid request'], Response::HTTP_BAD_REQUEST);
    }

    #[Route(path: '/fiche/delete', name: 'fiche_delete')]
    public function fiche_delete(Request $request, InitializePatient $initializePatient): Response
    {
        if ($request->isXmlHttpRequest()) {
            $fiche = $request->get('fiche');
            $protocoleId = $request->get('protocoleId');
            $protocole = $this->em->getRepository(Protocole::class)->find($protocoleId);

            $initializePatient->removeFicheFromProtocole($protocole, $fiche);

            $protocole->setFiches(
                array_diff($protocole->getFiches(), [$fiche])
            );

            $this->em->flush();

            return new JsonResponse('success!', Response::HTTP_OK);
        }
        return new JsonResponse(['error' => 'Invalid request'], Response::HTTP_BAD_REQUEST);
    }
}
