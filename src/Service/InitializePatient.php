<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Constant\FormConstants;

use App\Entity\MedicamentsEntree;
use App\Entity\AngioplastiePontage;
use App\Entity\BFR;
use App\Entity\Chip;
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
        $visite->setProtocoleNom($type);

        switch ($type) {
            case FormConstants::LABELS['FEUILLES']['CAC stroke']:
                $visite->getProtocole()->setFiches(['bfr', 'testsEffort']);
                break;

            case FormConstants::LABELS['FEUILLES']['CHiEF']:
                $visite->getProtocole()->setFiches(['echographieVasculaire', 'suivi', 'bfr', 'anatomieCoronaire', 'echographie', 'chip']);
                break;

            default:
                break;
        }

        $patient->addVisite($visite);

        $this->createProtocole($visite->getProtocole());

        $this->em->persist($visite);
        $this->em->flush();
    }

    public function createProtocole(Protocole $protocole)
    {
        $fiches = $protocole->getFiches();

        foreach ($fiches as $fiche) {
            if ($fiche == 'medicaments') {
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
                $protocole->setMedicamentsEntree($medicamentsEntree);
            } else if ($fiche == 'anatomieCoronaire') {
                $protocole->setAnatomieCoronaire(new AnatomieCoronaire());
            } else if ($fiche == 'angioplastiePontage') {
                $protocole->setAngioplastiePontage(new AngioplastiePontage());
            } else if ($fiche == 'bfr') {
                $protocole->setBFR(new BFR());
            } else if ($fiche == 'chip') {
                $protocole->setChip(new Chip());
            } else if ($fiche == 'catheterisation') {
                $protocole->setCatheterisation(new Catheterisation());
            } else if ($fiche == 'echographie') {
                $protocole->setEchographie(new Echographie());
            } else if ($fiche == 'echographieCardiaque') {
                $protocole->setEchographieCardiaque(new EchographieCardiaque());
            } else if ($fiche == 'echographieVasculaire') {
                $protocole->setEchographieVasculaire(new EchographieVasculaire());
            } else if ($fiche == 'neuroPsychologie') {
                $protocole->setNeuroPsychologie(new NeuroPsychologie());
            } else if ($fiche == 'scintigraphie') {
                $protocole->setScintigraphie(new Scintigraphie());
            } else if ($fiche == 'suivi') {
                $suivi = new Suivi();
                foreach (FormConstants::LABELS["SUIVI_FACTEUR"] as $name) {
                    $qcm = new Qcm();
                    $suivi->addFacteur($qcm);
                }

                foreach (FormConstants::LABELS["SUIVI_TRAITEMENT"] as $name) {
                    $qcm = new Qcm();
                    $suivi->addTraitement($qcm);
                }
                $protocole->setSuivi($suivi);
            } else if ($fiche == 'testsEffort') {
                $protocole->setTestEffort(new TestEffort());
            }
        }

        $this->em->flush();
    }

    public function removeFicheFromProtocole(Protocole $protocole, string $fiche)
    {
        if ($fiche == 'medicaments' && $p = $protocole->getMedicamentsEntree()) {
            $protocole->setMedicamentsEntree(null);
            $this->em->remove($p);
        } else if ($fiche == 'anatomieCoronaire' && $p = $protocole->getAnatomieCoronaire()) {
            $protocole->setAnatomieCoronaire(null);
            $this->em->remove($p);
        } else if ($fiche == 'angioplastiePontage' && $p = $protocole->getAngioplastiePontage()) {
            $protocole->setAngioplastiePontage(null);
            $this->em->remove($p);
        } else if ($fiche == 'bfr' && $p = $protocole->getBFR()) {
            $protocole->setBFR(null);
            $this->em->remove($p);
        } else if ($fiche == 'chip' && $p = $protocole->getChip()) {
            $protocole->setChip(null);
            $this->em->remove($p);
        } else if ($fiche == 'catheterisation' && $p = $protocole->getCatheterisation()) {
            $protocole->setCatheterisation(null);
            $this->em->remove($p);
        } else if ($fiche == 'echographie' && $p = $protocole->getEchographie()) {
            $protocole->setEchographie(null);
            $this->em->remove($p);
        } else if ($fiche == 'echographieCardiaque' && $p = $protocole->getEchographieCardiaque()) {
            $protocole->setEchographieCardiaque(null);
            $this->em->remove($p);
        } else if ($fiche == 'echographieVasculaire' && $p = $protocole->getEchographieVasculaire()) {
            $protocole->setEchographieVasculaire(null);
            $this->em->remove($p);
        } else if ($fiche == 'neuroPsychologie' && $p = $protocole->getNeuroPsychologie()) {
            $protocole->setNeuroPsychologie(null);
            $this->em->remove($p);
        } else if ($fiche == 'scintigraphie' && $p = $protocole->getScintigraphie()) {
            $protocole->setScintigraphie(null);
            $this->em->remove($p);
        } else if ($fiche == 'suivi' && $p = $protocole->getSuivi()) {
            $protocole->setSuivi(null);
            $this->em->remove($p);
        } else if ($fiche == 'testsEffort' && $p = $protocole->getTestEffort()) {
            $protocole->setTestEffort(null);
            $this->em->remove($p);
        }

        $this->em->flush();
    }
}
