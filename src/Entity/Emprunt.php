<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $dateemprunt = null;

    #[ORM\Column]
    private ?\DateTime $dateretourneprevue = null;

    #[ORM\Column]
    private ?\DateTime $dateretourneeffective = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateemprunt(): ?\DateTime
    {
        return $this->dateemprunt;
    }

    public function setDateemprunt(\DateTime $dateemprunt): static
    {
        $this->dateemprunt = $dateemprunt;

        return $this;
    }

    public function getDateretourneprevue(): ?\DateTime
    {
        return $this->dateretourneprevue;
    }

    public function setDateretourneprevue(\DateTime $dateretourneprevue): static
    {
        $this->dateretourneprevue = $dateretourneprevue;

        return $this;
    }

    public function getDateretourneeffective(): ?\DateTime
    {
        return $this->dateretourneeffective;
    }

    public function setDateretourneeffective(\DateTime $dateretourneeffective): static
    {
        $this->dateretourneeffective = $dateretourneeffective;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }
}
