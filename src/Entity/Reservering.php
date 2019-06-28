<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReserveringRepository")
 */
class Reservering
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $AanmaakDatum;

    /**
     * @ORM\Column(type="date")
     */
    private $AankomstDatum;

    /**
     * @ORM\Column(type="date")
     */
    private $VertrekDatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Kinderen;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Volwassenen;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Betaling", mappedBy="BetaalNummer", cascade={"persist", "remove"})
     */
    private $BetaalNummer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="AccountNummer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $AccountNummer;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\TussenTabel", inversedBy="Reserveringsnummer", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Reserveringsnummer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="accountnummer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $accountnummer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAanmaakDatum(): ?\DateTimeInterface
    {
        return $this->AanmaakDatum;
    }

    public function setAanmaakDatum(\DateTimeInterface $AanmaakDatum): self
    {
        $this->AanmaakDatum = $AanmaakDatum;

        return $this;
    }

    public function getAankomstDatum(): ?\DateTimeInterface
    {
        return $this->AankomstDatum;
    }

    public function setAankomstDatum(\DateTimeInterface $AankomstDatum): self
    {
        $this->AankomstDatum = $AankomstDatum;

        return $this;
    }

    public function getVertrekDatum(): ?\DateTimeInterface
    {
        return $this->VertrekDatum;
    }

    public function setVertrekDatum(\DateTimeInterface $VertrekDatum): self
    {
        $this->VertrekDatum = $VertrekDatum;

        return $this;
    }

    public function getKinderen(): ?string
    {
        return $this->Kinderen;
    }

    public function setKinderen(string $Kinderen): self
    {
        $this->Kinderen = $Kinderen;

        return $this;
    }

    public function getVolwassenen(): ?string
    {
        return $this->Volwassenen;
    }

    public function setVolwassenen(string $Volwassenen): self
    {
        $this->Volwassenen = $Volwassenen;

        return $this;
    }

    public function getBetaalNummer(): ?Betaling
    {
        return $this->BetaalNummer;
    }

    public function setBetaalNummer(Betaling $BetaalNummer): self
    {
        $this->BetaalNummer = $BetaalNummer;

        // set the owning side of the relation if necessary
        if ($this !== $BetaalNummer->getBetaalNummer()) {
            $BetaalNummer->setBetaalNummer($this);
        }

        return $this;
    }

    public function getAccountNummer(): ?Account
    {
        return $this->AccountNummer;
    }

    public function setAccountNummer(?Account $AccountNummer): self
    {
        $this->AccountNummer = $AccountNummer;

        return $this;
    }

    public function getReserveringsnummer(): ?TussenTabel
    {
        return $this->Reserveringsnummer;
    }

    public function setReserveringsnummer(TussenTabel $Reserveringsnummer): self
    {
        $this->Reserveringsnummer = $Reserveringsnummer;

        return $this;
    }
}
