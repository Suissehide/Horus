<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/participant", name="participant")
     */
    public function index(): Response
    {
        return $this->render('participant/index.html.twig', [
            'controller_name' => 'ParticipantController',
        ]);
    }

        /**
     * @Route("/participant/add", name="participant_add", methods="GET|POST")
     */
    public function add(Request $request): Response
    {
        // $participant = new Participant();
        // $form = $this->createForm(ParticipantType::class, $participant);

        // $em = $this->getDoctrine()->getManager();
        // $form->handleRequest($request);
        // if ($form->isSubmitted() && $form->isValid()) {
        //     if ($form->get('validation')->isClicked()) {
        //         $participant = $form->getData();
        //         $participant->setValidation(false);

        //         if ($participant->getCode() == '')
        //             $participant->setCode('ERROR');
        //         else {
        //             $id = count($em->getRepository(Participant::class)->findAll()) == 0 ? '1' : $em->getRepository(Participant::class)->findOneBy([], ['id' => 'desc'])->getCode();
        //             $id = intval(substr($id, 0, 3)) + 1;
        //             $id = str_pad($id, 3, "0", STR_PAD_LEFT);
        //             $participant->setCode($id . ' ' . strtoupper($participant->getCode()));
        //         }

        //         $this->verification_create($participant, $participant->getVerification()->getDate());
        //         $this->cardiovasculaire_create($participant);
        //         $this->information_create($participant);
        //         $this->donnee_create($participant);

        //         $em->persist($participant);
        //         $em->flush();

        //         $this->addErreur($participant->getId(), $participant->getCode(), 'notice', 'Création du participant ' . $participant->getCode(), true);
        //     }
        //     return $this->redirectToRoute('participant_view', ['id' => $participant->getId()]);
        // }
        return $this->render('participant/create.html.twig', [
            'title' => 'Ajouter un participant',
            'controller_name' => 'ParticipantController',
            // 'form' => $form->createView(),
            // 'verification' => $form->createView(),
        ]);
    }
}
