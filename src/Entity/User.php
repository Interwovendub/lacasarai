<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservering", mappedBy="accountnummer")
     */
    private $accountnummer;

    public function __construct()
    {
        parent::__construct();
        $this->accountnummer = new ArrayCollection();
        // your own logic
    }

    /**
     * @return Collection|Reservering[]
     */
    public function getAccountnummer(): Collection
    {
        return $this->accountnummer;
    }

    public function addAccountnummer(Reservering $accountnummer): self
    {
        if (!$this->accountnummer->contains($accountnummer)) {
            $this->accountnummer[] = $accountnummer;
            $accountnummer->setAccountnummer($this);
        }

        return $this;
    }

    public function removeAccountnummer(Reservering $accountnummer): self
    {
        if ($this->accountnummer->contains($accountnummer)) {
            $this->accountnummer->removeElement($accountnummer);
            // set the owning side to null (unless already changed)
            if ($accountnummer->getAccountnummer() === $this) {
                $accountnummer->setAccountnummer(null);
            }
        }

        return $this;
    }
}