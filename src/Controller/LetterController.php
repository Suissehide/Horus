<?php

namespace App\Controller;

use App\Entity\Letter;
use App\Entity\Patient;

use App\Form\LetterType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class LetterController extends AbstractController
{
    /**
     * @Route("/letter", name="letter", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $letter = $em->getRepository(Letter::class)->findOneBy([]);
        if (!$letter) {
            $letter = new Letter();
            $em->persist($letter);
            $em->flush();
        }

        $form = $this->createForm(LetterType::class, $letter);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $letter = $form->getData();
            $em->persist($letter);
            $em->flush();

            $this->addFlash('notice', 'Vos modifications ont été enregistré avec succès');

            return $this->redirect($request->getUri());
        }

        $jsonPatient = $this->serializeEntity(
            $em->getRepository(Patient::class)->findOneBy([], ['id' => 'desc']),
            'json'
        );

        return $this->render('letter/index.html.twig', [
            'controller_name' => 'LetterController',
            'patient' => $jsonPatient,
            'form' => $form->createView()
        ]);
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
}
