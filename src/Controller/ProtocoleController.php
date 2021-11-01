<?php

namespace App\Controller;

use App\Entity\Patient;

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
            $patientId = $request->request->get('patientId');

            $patient = $em->getRepository(Patient::class)->find($patientId);
            $fiches = $patient->getProtocole()->getFiches();
            array_push($fiches, $fiche);
            $patient->getProtocole()->setFiches($fiches);
            $em->flush();

            return new JsonResponse(true);
        }
    }

    /**
     * @Route("/fiche/delete", name="fiche_delete")
     */
    public function fiche_delete(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {
            $fiche = $request->request->get('fiche');
            $patientId = $request->request->get('patientId');
            $patient = $em->getRepository(Patient::class)->find($patientId);

            $patient->getProtocole()->setFiches(
                array_diff($patient->getProtocole()->getFiches(), [$fiche])
            );
            $em->flush();

            return new JsonResponse(true);
        }
    }
}
