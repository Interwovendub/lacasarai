<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeizoenRepository")
 */
class Seizoen
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BeginDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EndDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NaamSeizoen;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Korting;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginDate(): ?string
    {
        return $this->BeginDate;
    }

    public function setBeginDate(string $BeginDate): self
    {
        $this->BeginDate = $BeginDate;

        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->EndDate;
    }

    public function setEndDate(string $EndDate): self
    {
        $this->EndDate = $EndDate;

        return $this;
    }

    public function getNaamSeizoen(): ?string
    {
        return $this->NaamSeizoen;
    }

    public function setNaamSeizoen(string $NaamSeizoen): self
    {
        $this->NaamSeizoen = $NaamSeizoen;

        return $this;
    }

    public function getKorting(): ?string
    {
        return $this->Korting;
    }

    public function setKorting(string $Korting): self
    {
        $this->Korting = $Korting;

        return $this;
    }
}
