<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecipentRepository")
 */
class Recipent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\RecipentStatus", cascade={"persist", "remove"})
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RecipentList", inversedBy="recipent")
     */
    private $recipentList;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getStatus(): ?RecipentStatus
    {
        return $this->status;
    }

    public function setStatus(?RecipentStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getRecipentList(): ?RecipentList
    {
        return $this->recipentList;
    }

    public function setRecipentList(?RecipentList $recipentList): self
    {
        $this->recipentList = $recipentList;

        return $this;
    }
}
