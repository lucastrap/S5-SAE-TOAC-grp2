<?php

namespace App\Entity;

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
