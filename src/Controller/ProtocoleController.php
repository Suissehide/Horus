<?php

namespace App\Controller;

use App\Entity\Protocole;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProtocoleController extends AbstractController
{
    /**
     * @Route("/fiche/add", name="fiche_add")
     */
    public function fiche_add(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {
            $fiche = $request->request->get('fiche');
            $protocoleId = $request->request->get('protocoleId');

            $protocole = $em->getRepository(Protocole::class)->find($protocoleId);
            dump($protocole);
            $fiches = $protocole->getFiches();
            array_push($fiches, $fiche);
            $protocole->setFiches($fiches);
            $em->flush();

            return new JsonResponse('success!', Response::HTTP_OK);
        }
        return new JsonResponse('bad request', Response::HTTP_BAD_REQUEST);
    }

    /**
     * @Route("/fiche/delete", name="fiche_delete")
     */
    public function fiche_delete(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {
            $fiche = $request->request->get('fiche');
            $protocoleId = $request->request->get('protocoleId');
            $protocole = $em->getRepository(Protocole::class)->find($protocoleId);

            $protocole->setFiches(
                array_diff($protocole->getFiches(), [$fiche])
            );
            $em->flush();

            return new JsonResponse('success!', Response::HTTP_OK);
        }
        return new JsonResponse('bad request', Response::HTTP_BAD_REQUEST);
    }
}
