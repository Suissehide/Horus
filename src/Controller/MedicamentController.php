<?php

namespace App\Controller;

use App\Entity\Medicament;

use App\Repository\MedicamentRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class MedicamentController extends AbstractController
{
    /**
     * @Route("/medicament", name="medicament")
     */
    public function index(MedicamentRepository $medicamentRepository, Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $current = $request->request->get('current');
            $rowCount = $request->request->get('rowCount');
            $searchPhrase = $request->request->get('searchPhrase');
            $sort = $request->request->get('sort');

            $medicaments = $medicamentRepository->findByFilter($sort, $searchPhrase);
            if ($searchPhrase != "")
                $count = count($medicaments->getQuery()->getResult());
            else
                $count = $medicamentRepository->getCount();
            if ($rowCount != -1) {
                $min = ($current - 1) * $rowCount;
                $max = $rowCount;
                $medicaments->setMaxResults($max)->setFirstResult($min);
            }
            $medicaments = $medicaments->getQuery()->getResult();
            $rows = array();
            foreach ($medicaments as $erreur) {
                $row = array(
                    "id" => $erreur->getId(),
                    "name" => $erreur->getName(),
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

        return $this->render('medicament/index.html.twig', [
            'controller_name' => 'MedicamentController',
        ]);
    }

    /**
     * @Route("/medicament/add", name="medicament_add")
     */
    public function medicament_add(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {
            $name = $request->request->get('name');

            $medicament = new Medicament();
            $medicament->setName($name);

            $em->persist($medicament);
            $em->flush();

            return new JsonResponse(true);
        }
    }

    /**
     * @Route("/medicament/search", name="medicament_search")
     */
    public function medicament_search(MedicamentRepository $medicamentRepository, Request $request): Response
    {

        dump($request->request);

        if ($request->isXmlHttpRequest()) {
            $q = $request->request->get('q');
            $page = $request->request->get('page');

            if (!$q) return new JsonResponse([]);

            $medicaments = $medicamentRepository->findByRequest($q);

            return new JsonResponse($medicaments);
        }
    }

    /**
     * @Route("/medicament/delete", name="medicament_delete")
     */
    public function medicament_delete(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {
            $id = $request->request->get('id');

            $medicament = $this->getDoctrine()->getRepository(Medicament::class)->find($id);;

            $em->remove($medicament);
            $em->flush();

            return new JsonResponse(true);
        }
    }
}
