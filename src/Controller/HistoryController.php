<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Repository\ErreurRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoryController extends AbstractController
{
    #[Route(path: '/patient/{patient}/history/{fieldId}', name: 'history_list_field')]
    public function index(ErreurRepository $erreurRepository, Patient $patient, $fieldId, Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $current = $request->get('current');
            $rowCount = $request->get('rowCount');
            $searchPhrase = $request->get('searchPhrase');
            $sort = $request->get('sort');
            $patientId = $request->get('patientId');
            $fieldId = $request->get('fieldId');

            $erreurs = $erreurRepository->findByFilter($sort, $searchPhrase, $patientId, $fieldId);
            if ($searchPhrase != "") {
                $count = count($erreurs->getQuery()->getResult());
            } else {
                $count = $erreurRepository->getCount($patientId, $fieldId);
            }

            if ($rowCount != -1) {
                $min = ($current - 1) * $rowCount;
                $max = $rowCount;
                $erreurs->setMaxResults($max)->setFirstResult($min);
            }
            $erreurs = $erreurs->getQuery()->getResult();
            $rows = [];
            foreach ($erreurs as $erreur) {
                $row = array(
                    "id" => $erreur->getId(),
                    "dateCreation" => $this->formatDate($erreur->getDateCreation()),
                    "utilisateur" => $erreur->getUtilisateur(),
                    "message" => $erreur->getMessage(),
                    "etat" => $erreur->getEtat(),
                );
                $rows[] = $row;
            }

            $data = array(
                "current" => intval($current),
                "rowCount" => intval($rowCount),
                "rows" => $rows,
                "total" => intval($count),
            );
            return new JsonResponse($data);
        }

        return $this->render('history/index.html.twig', [
            'controller_name' => 'ErreurController',
            'code_patient' => $patient->getGeneral()->getNom(),
            'id_patient' => $patient->getId(),
            'id_field' => $fieldId,
        ]);
    }

    private function formatDate(DateTime $date)
    {
        $formatter = new \IntlDateFormatter(
            \Locale::getDefault(),
            \IntlDateFormatter::MEDIUM,
            \IntlDateFormatter::SHORT
        );
        return $formatter->format($date);
    }
}
