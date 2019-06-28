<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BetalingRepository")
 */
class Betaling
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reservering", inversedBy="BetaalNummer", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $BetaalNummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BetaalMethode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBetaalNummer(): ?Reservering
    {
        return $this->BetaalNummer;
    }

    public function setBetaalNummer(Reservering $BetaalNummer): self
    {
        $this->BetaalNummer = $BetaalNummer;

        return $this;
    }

    public function getBetaalMethode(): ?string
    {
        return $this->BetaalMethode;
    }

    public function setBetaalMethode(string $BetaalMethode): self
    {
        $this->BetaalMethode = $BetaalMethode;

        return $this;
    }
}
