<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\CourseRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $format = null;


    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $challenge = null;

    #[ORM\ManyToOne(inversedBy: 'courses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CourseCategory $courseCategory = null;

    #[ORM\Column(length: 255)]
    private ?string $specificites = null;

    #[ORM\Column(length: 255)]
    private ?string $catAge = null;


    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $clotInscr = null; 

    #[ORM\Column(length: 255)]
    private ?string $jour = null;

    #[ORM\Column(length: 500)]
    private ?string $horaires = null;

    #[ORM\Column(length: 500)]
    private ?string $horaires2 = null;

    #[ORM\Column]
    private ?int $individuel = null;

    #[ORM\Column( nullable: true)]
    private ?int $relais = null;

    #[ORM\Column( nullable: true)]
    private ?int $duo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $detailNonL = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $detailNonLR = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $detailNonLD = null;

    #[ORM\Column(length: 999)]
    private ?string $image = null;

    #[ORM\Column]
    private ?int $prixAss = null;

    #[ORM\Column(length: 999)]
    private ?string $mapRace = null;

    #[ORM\Column(length: 999)]
    private ?string $openRunner = null;


    #[ORM\Column(length: 999, nullable: true)]
    private ?string $mapRace2 = null;

    #[ORM\Column(length: 999, nullable: true)]
    private ?string $mapRace3 = null;

    public function getMapRace(): ?string
    {
        return $this->mapRace;
    }

    public function setMapRace(?string $mapRace): static
    {
        $this->mapRace = $mapRace;

        return $this;
    }

    public function getOpenRunner(): ?string
    {
        return $this->openRunner;
    }

    public function setOpenRunner(?string $openRunner): static
    {
        $this->openRunner = $openRunner;

        return $this;
    }

    public function getMapRace2(): ?string
    {
        return $this->mapRace2;
    }

    public function setMapRace2(?string $mapRace2): static
    {
        $this->mapRace2 = $mapRace2;

        return $this;
    }

    public function getMapRace3(): ?string
    {
        return $this->mapRace3;
    }

    public function setMapRace3(?string $mapRace3): static
    {
        $this->mapRace3 = $mapRace3;

        return $this;
    }



    public function getPrixAss(): ?int
    {
        return $this->prixAss;
    }

    public function setPrixAss(int $prixAss): static
    {
        $this->prixAss = $prixAss;

        return $this;
    }


    public function getImage(): ?string
    {
        return $this->image;
    }
    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): static
    {
        $this->format = $format;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getChallenge(): ?string
    {
        return $this->challenge;
    }

    public function setChallenge(?string $challenge): static
    {
        $this->challenge = $challenge;

        return $this;
    }
    
    public function getSpecificites(): ?string
    {
        return $this->specificites;
    }
    
    public function setSpecificites(?string $specificites): static
    {
        $this->specificites = $specificites;
    
        return $this;
    }
    
    public function getCatAge(): ?string
    {
        return $this->catAge;
    }
    
    public function setCatAge(?string $catAge): static
    {
        $this->catAge = $catAge;
    
        return $this;
    }
    
    public function getclotInscr(): ?\DateTimeInterface
    {
        return $this->clotInscr;
    }
    
    public function setclotInscr(?\DateTimeInterface $clotInscr): static
    {
        $this->clotInscr = $clotInscr;
    
        return $this;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(?string $jour): self
    {
        $this->jour = $jour;
        return $this;
    }

    public function getHoraires(): ?string
    {
        return $this->horaires;
    }

    public function setHoraires(?string $horaires): self
    {
        $this->horaires = $horaires;
        return $this;
    }

    public function getHoraires2(): ?string
    {
        return $this->horaires2;
    }

    public function setHoraires2(?string $horaires2): self
    {
        $this->horaires2 = $horaires2;
        return $this;
    }

    public function getIndividuel(): ?int
    {
        return $this->individuel;
    }

    public function setIndividuel(?int $individuel): self
    {
        $this->individuel = $individuel;
        return $this;
    }

    public function getRelais(): ?int
    {
        return $this->relais;
    }

    public function setRelais(?int $relais): self
    {
        $this->relais = $relais;
        return $this;
    }

    public function getDuo(): ?int
    {
        return $this->duo;
    }

    public function setDuo(?int $duo): self
    {
        $this->duo = $duo;
        return $this;
    }

    public function getDetailNonL(): ?string
    {
        return $this->detailNonL;
    }

    public function setDetailNonL(?string $detailNonL): self
    {
        $this->detailNonL = $detailNonL;
        return $this;
    }

    public function getDetailNonLR(): ?string
    {
        return $this->detailNonLR;
    }

    public function setDetailNonLR(?string $detailNonLR): self
    {
        $this->detailNonLR = $detailNonLR;
        return $this;
    }

    public function getDetailNonLD(): ?string
    {
        return $this->detailNonLD;
    }

    public function setDetailNonLD(?string $detailNonLD): self
    {
        $this->detailNonLD = $detailNonLD;
        return $this;
    }
        

    public function getCourseCategory(): ?CourseCategory
    {
        return $this->courseCategory;
    }

    public function setCourseCategory(?CourseCategory $courseCategory): static
    {
        $this->courseCategory = $courseCategory;

        return $this;
    }
}
