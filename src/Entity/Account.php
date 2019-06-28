<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccountRepository")
 */
class Account
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservering", mappedBy="AccountNummer")
     */
    private $AccountNummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Gebruikersnaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Wachtwoord;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Rol;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Banknummer;

    public function __construct()
    {
        $this->AccountNummer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Reservering[]
     */
    public function getAccountNummer(): Collection
    {
        return $this->AccountNummer;
    }

    public function addAccountNummer(Reservering $accountNummer): self
    {
        if (!$this->AccountNummer->contains($accountNummer)) {
            $this->AccountNummer[] = $accountNummer;
            $accountNummer->setAccountNummer($this);
        }

        return $this;
    }

    public function removeAccountNummer(Reservering $accountNummer): self
    {
        if ($this->AccountNummer->contains($accountNummer)) {
            $this->AccountNummer->removeElement($accountNummer);
            // set the owning side to null (unless already changed)
            if ($accountNummer->getAccountNummer() === $this) {
                $accountNummer->setAccountNummer(null);
            }
        }

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getGebruikersnaam(): ?string
    {
        return $this->Gebruikersnaam;
    }

    public function setGebruikersnaam(string $Gebruikersnaam): self
    {
        $this->Gebruikersnaam = $Gebruikersnaam;

        return $this;
    }

    public function getWachtwoord(): ?string
    {
        return $this->Wachtwoord;
    }

    public function setWachtwoord(string $Wachtwoord): self
    {
        $this->Wachtwoord = $Wachtwoord;

        return $this;
    }

    public function getRol(): ?string
    {
        return $this->Rol;
    }

    public function setRol(string $Rol): self
    {
        $this->Rol = $Rol;

        return $this;
    }

    public function getBanknummer(): ?string
    {
        return $this->Banknummer;
    }

    public function setBanknummer(string $Banknummer): self
    {
        $this->Banknummer = $Banknummer;

        return $this;
    }
}
