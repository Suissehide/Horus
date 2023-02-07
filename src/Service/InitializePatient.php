<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Constant\FormConstants;

use App\Entity\MedicamentsEntree;
use App\Entity\AngioplastiePontage;
use App\Entity\BFR;
use App\Entity\Catheterisation;
use App\Entity\AnatomieCoronaire;
use App\Entity\Echographie;
use App\Entity\EchographieCardiaque;
use App\Entity\EchographieVasculaire;
use App\Entity\NeuroPsychologie;
use App\Entity\Scintigraphie;
use App\Entity\TestEffort;
use App\Entity\Suivi;
use App\Entity\Patient;
use App\Entity\Protocole;
use App\Entity\Visite;
use App\Entity\QCM;
use App\Entity\BMQ;

class InitializePatient
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createVisite(Patient $patient, $type)
    {
        $visite = new Visite();

        $visite->setProtocole(new Protocole());

        switch ($type) {
            case FormConstants::LABELS['FEUILLES'][0]:
                $visite->getProtocole()->setFiches(['bfr', 'testsEffort']);
                break;

            case FormConstants::LABELS['FEUILLES'][1]:
                $visite->getProtocole()->setFiches(['echographie', 'neuroPsychologie', 'scintigraphie']);
                break;

            default:
                break;
        }

        $patient->addVisite($visite);

        $this->createProtocole($visite);

        $this->em->persist($visite);
        $this->em->flush();
    }

    public function createProtocole(Visite $visite)
    {
        $medicamentsEntree = new MedicamentsEntree();
        $suivi = new Suivi();

        foreach (FormConstants::LABELS["SUIVI_FACTEUR"] as $name) {
            $qcm = new Qcm();
            $suivi->addFacteur($qcm);
        }

        foreach (FormConstants::LABELS["SUIVI_TRAITEMENT"] as $name) {
            $qcm = new Qcm();
            $suivi->addTraitement($qcm);
        }

        foreach (FormConstants::LABELS["MEDICAMENTSENTREE_VERBATIMS_VECU"] as $name) {
            $qcm = new QCM();
            $medicamentsEntree->addVerbatim($qcm);
        }

        foreach (FormConstants::LABELS["MEDICAMENTSENTREE_VERBATIMS_SANTE"] as $name) {
            $qcm = new QCM();
            $medicamentsEntree->addVerbatimsSante($qcm);
        }

        foreach (FormConstants::LABELS["MEDICAMENTSENTREE_QUESTIONNAIRE"] as $name) {
            $bmq = new BMQ();
            $medicamentsEntree->addQuestionnaire($bmq);
        }

        $protocole = $visite->getProtocole();
        $protocole->setMedicamentsEntree($medicamentsEntree);
        $protocole->setAngioplastiePontage(new AngioplastiePontage());
        $protocole->setBFR(new BFR());
        $protocole->setCatheterisation(new Catheterisation());
        $protocole->setAnatomieCoronaire(new AnatomieCoronaire());
        $protocole->setEchographie(new Echographie());
        $protocole->setEchographieCardiaque(new EchographieCardiaque());
        $protocole->setEchographieVasculaire(new EchographieVasculaire());
        $protocole->setNeuroPsychologie(new NeuroPsychologie());
        $protocole->setScintigraphie(new Scintigraphie());
        $protocole->setTestEffort(new TestEffort());
        $protocole->setSuivi($suivi);

        $this->em->flush();
    }
}