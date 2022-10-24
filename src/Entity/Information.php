<?php

namespace App\Entity;

use App\Repository\InformationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformationRepository::class)]
class Information
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $susDecalage;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sansSusDecalage;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $anterieur;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $septoApical;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lateral;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $inferieurPosterieur;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sansTerritoire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $IVA;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CD;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Cx;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $marginale;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $diagonale;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pontage;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $troncCommun;

    #[ORM\Column(type: 'array', nullable: true)]
    private $traitementPhaseAigue = [];

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $troubleRythmeVentriculaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $insuffisanceCardiaque;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pericardite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $complicationMecanique;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $localisation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $taille;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causePotentielleAtherosclerose = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causeIncertaineAtherosclerose = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causeImprobableAtherosclerose = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pathologieAbsenteAtherosclerose = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $explorationsInsuffisantesAtherosclerose = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causePotentielleMaladiePetitsArteres = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causeIncertaineMaladiePetitsArteres = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causeImprobableMaladiePetitsArteres = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pathologieAbsenteMaladiePetitsArteres = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $explorationsInsuffisanteMaladiePetitsArteres = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causePotentielleCardioEmbolique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causeIncertaineCardioEmbolique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causeImprobableCardioEmbolique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pathologieAbsenteCardioEmbolique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $explorationsInsuffisanteCardioEmbolique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causePotentielleAutreCause = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causeIncertaineAutreCause = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causeImprobableAutreCause = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pathologieAbsenteAutreCause = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $explorationsInsuffisanteAutreCause = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causePotentielleDissection = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causeIncertaineDissection = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $causeImprobableDissection = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pathologieAbsenteDissection = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $explorationsInsuffisanteDissection = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSusDecalage(): ?string
    {
        return $this->susDecalage;
    }

    public function setSusDecalage(?string $susDecalage): self
    {
        $this->susDecalage = $susDecalage;

        return $this;
    }

    public function getSansSusDecalage(): ?string
    {
        return $this->sansSusDecalage;
    }

    public function setSansSusDecalage(?string $sansSusDecalage): self
    {
        $this->sansSusDecalage = $sansSusDecalage;

        return $this;
    }

    public function getAnterieur(): ?string
    {
        return $this->anterieur;
    }

    public function setAnterieur(?string $anterieur): self
    {
        $this->anterieur = $anterieur;

        return $this;
    }

    public function getSeptoApical(): ?string
    {
        return $this->septoApical;
    }

    public function setSeptoApical(?string $septoApical): self
    {
        $this->septoApical = $septoApical;

        return $this;
    }

    public function getLateral(): ?string
    {
        return $this->lateral;
    }

    public function setLateral(?string $lateral): self
    {
        $this->lateral = $lateral;

        return $this;
    }

    public function getInferieurPosterieur(): ?string
    {
        return $this->inferieurPosterieur;
    }

    public function setInferieurPosterieur(?string $inferieurPosterieur): self
    {
        $this->inferieurPosterieur = $inferieurPosterieur;

        return $this;
    }

    public function getSansTerritoire(): ?string
    {
        return $this->sansTerritoire;
    }

    public function setSansTerritoire(?string $sansTerritoire): self
    {
        $this->sansTerritoire = $sansTerritoire;

        return $this;
    }

    public function getIVA(): ?string
    {
        return $this->IVA;
    }

    public function setIVA(?string $IVA): self
    {
        $this->IVA = $IVA;

        return $this;
    }

    public function getCD(): ?string
    {
        return $this->CD;
    }

    public function setCD(?string $CD): self
    {
        $this->CD = $CD;

        return $this;
    }

    public function getCx(): ?string
    {
        return $this->Cx;
    }

    public function setCx(?string $Cx): self
    {
        $this->Cx = $Cx;

        return $this;
    }

    public function getMarginale(): ?string
    {
        return $this->marginale;
    }

    public function setMarginale(?string $marginale): self
    {
        $this->marginale = $marginale;

        return $this;
    }

    public function getDiagonale(): ?string
    {
        return $this->diagonale;
    }

    public function setDiagonale(?string $diagonale): self
    {
        $this->diagonale = $diagonale;

        return $this;
    }

    public function getPontage(): ?string
    {
        return $this->pontage;
    }

    public function setPontage(?string $pontage): self
    {
        $this->pontage = $pontage;

        return $this;
    }

    public function getTroncCommun(): ?string
    {
        return $this->troncCommun;
    }

    public function setTroncCommun(?string $troncCommun): self
    {
        $this->troncCommun = $troncCommun;

        return $this;
    }

    public function getTraitementPhaseAigue(): array
    {
        return $this->traitementPhaseAigue;
    }

    public function setTraitementPhaseAigue(?array $traitementPhaseAigue): self
    {
        $this->traitementPhaseAigue = $traitementPhaseAigue;

        return $this;
    }

    public function getTroubleRythmeVentriculaire(): ?string
    {
        return $this->troubleRythmeVentriculaire;
    }

    public function setTroubleRythmeVentriculaire(?string $troubleRythmeVentriculaire): self
    {
        $this->troubleRythmeVentriculaire = $troubleRythmeVentriculaire;

        return $this;
    }

    public function getInsuffisanceCardiaque(): ?string
    {
        return $this->insuffisanceCardiaque;
    }

    public function setInsuffisanceCardiaque(?string $insuffisanceCardiaque): self
    {
        $this->insuffisanceCardiaque = $insuffisanceCardiaque;

        return $this;
    }

    public function getPericardite(): ?string
    {
        return $this->pericardite;
    }

    public function setPericardite(?string $pericardite): self
    {
        $this->pericardite = $pericardite;

        return $this;
    }

    public function getComplicationMecanique(): ?string
    {
        return $this->complicationMecanique;
    }

    public function setComplicationMecanique(?string $complicationMecanique): self
    {
        $this->complicationMecanique = $complicationMecanique;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(?string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getCausePotentielleAtherosclerose(): ?string
    {
        return $this->causePotentielleAtherosclerose;
    }

    public function setCausePotentielleAtherosclerose(?string $causePotentielleAtherosclerose): self
    {
        $this->causePotentielleAtherosclerose = $causePotentielleAtherosclerose;

        return $this;
    }

    public function getCauseIncertaineAtherosclerose(): ?string
    {
        return $this->causeIncertaineAtherosclerose;
    }

    public function setCauseIncertaineAtherosclerose(?string $causeIncertaineAtherosclerose): self
    {
        $this->causeIncertaineAtherosclerose = $causeIncertaineAtherosclerose;

        return $this;
    }

    public function getCauseImprobableAtherosclerose(): ?string
    {
        return $this->causeImprobableAtherosclerose;
    }

    public function setCauseImprobableAtherosclerose(?string $causeImprobableAtherosclerose): self
    {
        $this->causeImprobableAtherosclerose = $causeImprobableAtherosclerose;

        return $this;
    }

    public function getPathologieAbsenteAtherosclerose(): ?string
    {
        return $this->pathologieAbsenteAtherosclerose;
    }

    public function setPathologieAbsenteAtherosclerose(?string $pathologieAbsenteAtherosclerose): self
    {
        $this->pathologieAbsenteAtherosclerose = $pathologieAbsenteAtherosclerose;

        return $this;
    }

    public function getExplorationsInsuffisantesAtherosclerose(): ?string
    {
        return $this->explorationsInsuffisantesAtherosclerose;
    }

    public function setExplorationsInsuffisantesAtherosclerose(?string $explorationsInsuffisantesAtherosclerose): self
    {
        $this->explorationsInsuffisantesAtherosclerose = $explorationsInsuffisantesAtherosclerose;

        return $this;
    }

    public function getCausePotentielleMaladiePetitsArteres(): ?string
    {
        return $this->causePotentielleMaladiePetitsArteres;
    }

    public function setCausePotentielleMaladiePetitsArteres(?string $causePotentielleMaladiePetitsArteres): self
    {
        $this->causePotentielleMaladiePetitsArteres = $causePotentielleMaladiePetitsArteres;

        return $this;
    }

    public function getCauseIncertaineMaladiePetitsArteres(): ?string
    {
        return $this->causeIncertaineMaladiePetitsArteres;
    }

    public function setCauseIncertaineMaladiePetitsArteres(?string $causeIncertaineMaladiePetitsArteres): self
    {
        $this->causeIncertaineMaladiePetitsArteres = $causeIncertaineMaladiePetitsArteres;

        return $this;
    }

    public function getCauseImprobableMaladiePetitsArteres(): ?string
    {
        return $this->causeImprobableMaladiePetitsArteres;
    }

    public function setCauseImprobableMaladiePetitsArteres(?string $causeImprobableMaladiePetitsArteres): self
    {
        $this->causeImprobableMaladiePetitsArteres = $causeImprobableMaladiePetitsArteres;

        return $this;
    }

    public function getPathologieAbsenteMaladiePetitsArteres(): ?string
    {
        return $this->pathologieAbsenteMaladiePetitsArteres;
    }

    public function setPathologieAbsenteMaladiePetitsArteres(?string $pathologieAbsenteMaladiePetitsArteres): self
    {
        $this->pathologieAbsenteMaladiePetitsArteres = $pathologieAbsenteMaladiePetitsArteres;

        return $this;
    }

    public function getExplorationsInsuffisanteMaladiePetitsArteres(): ?string
    {
        return $this->explorationsInsuffisanteMaladiePetitsArteres;
    }

    public function setExplorationsInsuffisanteMaladiePetitsArteres(?string $explorationsInsuffisanteMaladiePetitsArteres): self
    {
        $this->explorationsInsuffisanteMaladiePetitsArteres = $explorationsInsuffisanteMaladiePetitsArteres;

        return $this;
    }

    public function getCausePotentielleCardioEmbolique(): ?string
    {
        return $this->causePotentielleCardioEmbolique;
    }

    public function setCausePotentielleCardioEmbolique(?string $causePotentielleCardioEmbolique): self
    {
        $this->causePotentielleCardioEmbolique = $causePotentielleCardioEmbolique;

        return $this;
    }

    public function getCauseIncertaineCardioEmbolique(): ?string
    {
        return $this->causeIncertaineCardioEmbolique;
    }

    public function setCauseIncertaineCardioEmbolique(?string $causeIncertaineCardioEmbolique): self
    {
        $this->causeIncertaineCardioEmbolique = $causeIncertaineCardioEmbolique;

        return $this;
    }

    public function getCauseImprobableCardioEmbolique(): ?string
    {
        return $this->causeImprobableCardioEmbolique;
    }

    public function setCauseImprobableCardioEmbolique(?string $causeImprobableCardioEmbolique): self
    {
        $this->causeImprobableCardioEmbolique = $causeImprobableCardioEmbolique;

        return $this;
    }

    public function getPathologieAbsenteCardioEmbolique(): ?string
    {
        return $this->pathologieAbsenteCardioEmbolique;
    }

    public function setPathologieAbsenteCardioEmbolique(?string $pathologieAbsenteCardioEmbolique): self
    {
        $this->pathologieAbsenteCardioEmbolique = $pathologieAbsenteCardioEmbolique;

        return $this;
    }

    public function getExplorationsInsuffisanteCardioEmbolique(): ?string
    {
        return $this->explorationsInsuffisanteCardioEmbolique;
    }

    public function setExplorationsInsuffisanteCardioEmbolique(?string $explorationsInsuffisanteCardioEmbolique): self
    {
        $this->explorationsInsuffisanteCardioEmbolique = $explorationsInsuffisanteCardioEmbolique;

        return $this;
    }

    public function getCausePotentielleAutreCause(): ?string
    {
        return $this->causePotentielleAutreCause;
    }

    public function setCausePotentielleAutreCause(?string $causePotentielleAutreCause): self
    {
        $this->causePotentielleAutreCause = $causePotentielleAutreCause;

        return $this;
    }

    public function getCauseIncertaineAutreCause(): ?string
    {
        return $this->causeIncertaineAutreCause;
    }

    public function setCauseIncertaineAutreCause(?string $causeIncertaineAutreCause): self
    {
        $this->causeIncertaineAutreCause = $causeIncertaineAutreCause;

        return $this;
    }

    public function getCauseImprobableAutreCause(): ?string
    {
        return $this->causeImprobableAutreCause;
    }

    public function setCauseImprobableAutreCause(?string $causeImprobableAutreCause): self
    {
        $this->causeImprobableAutreCause = $causeImprobableAutreCause;

        return $this;
    }

    public function getPathologieAbsenteAutreCause(): ?string
    {
        return $this->pathologieAbsenteAutreCause;
    }

    public function setPathologieAbsenteAutreCause(?string $pathologieAbsenteAutreCause): self
    {
        $this->pathologieAbsenteAutreCause = $pathologieAbsenteAutreCause;

        return $this;
    }

    public function getExplorationsInsuffisanteAutreCause(): ?string
    {
        return $this->explorationsInsuffisanteAutreCause;
    }

    public function setExplorationsInsuffisanteAutreCause(?string $explorationsInsuffisanteAutreCause): self
    {
        $this->explorationsInsuffisanteAutreCause = $explorationsInsuffisanteAutreCause;

        return $this;
    }

    public function getCausePotentielleDissection(): ?string
    {
        return $this->causePotentielleDissection;
    }

    public function setCausePotentielleDissection(?string $causePotentielleDissection): self
    {
        $this->causePotentielleDissection = $causePotentielleDissection;

        return $this;
    }

    public function getCauseIncertaineDissection(): ?string
    {
        return $this->causeIncertaineDissection;
    }

    public function setCauseIncertaineDissection(?string $causeIncertaineDissection): self
    {
        $this->causeIncertaineDissection = $causeIncertaineDissection;

        return $this;
    }

    public function getCauseImprobableDissection(): ?string
    {
        return $this->causeImprobableDissection;
    }

    public function setCauseImprobableDissection(?string $causeImprobableDissection): self
    {
        $this->causeImprobableDissection = $causeImprobableDissection;

        return $this;
    }

    public function getPathologieAbsenteDissection(): ?string
    {
        return $this->pathologieAbsenteDissection;
    }

    public function setPathologieAbsenteDissection(?string $pathologieAbsenteDissection): self
    {
        $this->pathologieAbsenteDissection = $pathologieAbsenteDissection;

        return $this;
    }

    public function getExplorationsInsuffisanteDissection(): ?string
    {
        return $this->explorationsInsuffisanteDissection;
    }

    public function setExplorationsInsuffisanteDissection(?string $explorationsInsuffisanteDissection): self
    {
        $this->explorationsInsuffisanteDissection = $explorationsInsuffisanteDissection;

        return $this;
    }
}
