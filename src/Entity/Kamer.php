<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KamerRepository")
 */
class Kamer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\TussenTabel", inversedBy="KamerNummer", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $KamerNummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $KamerNaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $KamerBeschrijving;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $KamerPrijs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKamerNummer(): ?TussenTabel
    {
        return $this->KamerNummer;
    }

    public function setKamerNummer(TussenTabel $KamerNummer): self
    {
        $this->KamerNummer = $KamerNummer;

        return $this;
    }

    public function getKamerNaam(): ?string
    {
        return $this->KamerNaam;
    }

    public function setKamerNaam(string $KamerNaam): self
    {
        $this->KamerNaam = $KamerNaam;

        return $this;
    }

    public function getKamerBeschrijving(): ?string
    {
        return $this->KamerBeschrijving;
    }

    public function setKamerBeschrijving(string $KamerBeschrijving): self
    {
        $this->KamerBeschrijving = $KamerBeschrijving;

        return $this;
    }

    public function getKamerPrijs(): ?string
    {
        return $this->KamerPrijs;
    }

    public function setKamerPrijs(string $KamerPrijs): self
    {
        $this->KamerPrijs = $KamerPrijs;

        return $this;
    }
}
