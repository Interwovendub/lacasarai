<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TussenTabelRepository")
 */
class TussenTabel
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
    private $Aantal;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Kamer", mappedBy="KamerNummer", cascade={"persist", "remove"})
     */
    private $KamerNummer;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reservering", mappedBy="Reserveringsnummer", cascade={"persist", "remove"})
     */
    private $Reserveringsnummer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAantal(): ?string
    {
        return $this->Aantal;
    }

    public function setAantal(string $Aantal): self
    {
        $this->Aantal = $Aantal;

        return $this;
    }

    public function getKamerNummer(): ?Kamer
    {
        return $this->KamerNummer;
    }

    public function setKamerNummer(Kamer $KamerNummer): self
    {
        $this->KamerNummer = $KamerNummer;

        // set the owning side of the relation if necessary
        if ($this !== $KamerNummer->getKamerNummer()) {
            $KamerNummer->setKamerNummer($this);
        }

        return $this;
    }

    public function getReserveringsnummer(): ?Reservering
    {
        return $this->Reserveringsnummer;
    }

    public function setReserveringsnummer(Reservering $Reserveringsnummer): self
    {
        $this->Reserveringsnummer = $Reserveringsnummer;

        // set the owning side of the relation if necessary
        if ($this !== $Reserveringsnummer->getReserveringsnummer()) {
            $Reserveringsnummer->setReserveringsnummer($this);
        }

        return $this;
    }
}
