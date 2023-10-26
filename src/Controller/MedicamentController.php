<?php

namespace App\Controller;

use App\Entity\Medicament;
use App\Repository\MedicamentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedicamentController extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(private readonly ManagerRegistry $managerRegistry, EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    #[Route(path: '/medicament', name: 'medicament')]
    public function index(MedicamentRepository $medicamentRepository, Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $current = $request->get('current');
            $rowCount = $request->get('rowCount');
            $searchPhrase = $request->get('searchPhrase');
            $sort = $request->get('sort');

            $medicaments = $medicamentRepository->findByFilter($sort, $searchPhrase);
            if ($searchPhrase !== "")
                $count = count($medicaments->getQuery()->getResult());
            else
                $count = $medicamentRepository->getCount();
            if ($rowCount != -1) {
                $min = ($current - 1) * $rowCount;
                $max = $rowCount;
                $medicaments->setMaxResults($max)->setFirstResult($min);
            }
            $medicaments = $medicaments->getQuery()->getResult();
            $rows = [];
            foreach ($medicaments as $erreur) {
                $row = array(
                    "id" => $erreur->getId(),
                    "name" => $erreur->getName(),
                );
                $rows[] = $row;
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

    #[Route(path: '/medicament/add', name: 'medicament_add')]
    public function medicament_add(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $name = $request->get('name');

            $medicament = new Medicament();
            $medicament->setName($name);

            $this->em->persist($medicament);
            $this->em->flush();

            return new JsonResponse(true);
        }
        return new JsonResponse(['error' => 'Invalid request'], Response::HTTP_BAD_REQUEST);
    }

    #[Route(path: '/medicament/search', name: 'medicament_search')]
    public function medicament_search(MedicamentRepository $medicamentRepository, Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $q = $request->get('q');
            $page = $request->get('page');

            if (!$q) return new JsonResponse([]);

            $medicaments = $medicamentRepository->findByRequest($q);

            return new JsonResponse($medicaments);
        }
        return new JsonResponse(['error' => 'Invalid request'], Response::HTTP_BAD_REQUEST);
    }

    #[Route(path: '/medicament/delete', name: 'medicament_delete')]
    public function medicament_delete(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $id = $request->get('id');

            $medicament = $this->managerRegistry->getRepository(Medicament::class)->find($id);

            $this->em->remove($medicament);
            $this->em->flush();

            return new JsonResponse(true);
        }
        return new JsonResponse(['error' => 'Invalid request'], Response::HTTP_BAD_REQUEST);
    }
}
