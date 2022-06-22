<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Constant\FormConstants;

use App\Entity\MedicamentsEntree;
use App\Entity\AngioplastiePontage;
use App\Entity\BFR;
use App\Entity\Catheterisation;
use App\Entity\CoronaireAngioplastie;
use App\Entity\Echographie;
use App\Entity\EchographieCardiaque;
use App\Entity\EchographieVasculaire;
use App\Entity\NeuroPsychologie;
use App\Entity\Scintigraphie;
use App\Entity\TestEffort;
use App\Entity\Visite;
use App\Entity\Patient;
use App\Entity\Protocole;
use App\Entity\Suivi;
use App\Entity\QCM;
use App\Entity\BMQ;

class InitializePatient
{
    /**
     * @var DoctrineManager
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createSuivi(Patient $patient, $type)
    {
        $suivi = new Suivi();

        foreach (FormConstants::LABELS["SUIVI_FACTEUR"] as $name) {
            $qcm = new Qcm();
            $suivi->addFacteur($qcm);
        }

        foreach (FormConstants::LABELS["SUIVI_TRAITEMENT"] as $name) {
            $qcm = new Qcm();
            $suivi->addTraitement($qcm);
        }

        $suivi->setProtocole(new Protocole());

        switch ($type) {
            case FormConstants::LABELS['FEUILLES'][0]:
                $suivi->getProtocole()->setFiches(['bfr', 'testsEffort']);
                break;

            case FormConstants::LABELS['FEUILLES'][1]:
                $suivi->getProtocole()->setFiches(['echographie', 'neuroPsychologie', 'scintigraphie']);
                break;

            default:
                break;
        }

        $patient->addSuivi($suivi);

        $this->createProtocole($suivi);

        $this->em->persist($suivi);
        $this->em->flush();
    }

    public function createProtocole(Suivi $suivi)
    {
        $medicamentsEntree = new MedicamentsEntree();

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

        $suivi->getProtocole()->setMedicamentsEntree($medicamentsEntree);

        $suivi->getProtocole()->setAngioplastiePontage(new AngioplastiePontage());
        $suivi->getProtocole()->setBFR(new BFR());
        $suivi->getProtocole()->setCatheterisation(new Catheterisation());
        $suivi->getProtocole()->setCoronaireAngioplastie(new CoronaireAngioplastie());
        $suivi->getProtocole()->setEchographie(new Echographie());
        $suivi->getProtocole()->setEchographieCardiaque(new EchographieCardiaque());
        $suivi->getProtocole()->setEchographieVasculaire(new EchographieVasculaire());
        $suivi->getProtocole()->setNeuroPsychologie(new NeuroPsychologie());
        $suivi->getProtocole()->setScintigraphie(new Scintigraphie());
        $suivi->getProtocole()->setTestEffort(new TestEffort());
        $suivi->getProtocole()->setVisite(new Visite());

        $this->em->flush();
    }
}