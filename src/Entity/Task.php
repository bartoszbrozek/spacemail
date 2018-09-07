<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $scheduleDate;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\RecipentList", inversedBy="tasks")
     */
    private $recipentList;

    public function __construct()
    {
        $this->recipentList = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getScheduleDate(): ?\DateTimeInterface
    {
        return $this->scheduleDate;
    }

    public function setScheduleDate(\DateTimeInterface $scheduleDate): self
    {
        $this->scheduleDate = $scheduleDate;

        return $this;
    }

    /**
     * @return Collection|RecipentList[]
     */
    public function getRecipentList(): Collection
    {
        return $this->recipentList;
    }

    public function addRecipentList(RecipentList $recipentList): self
    {
        if (!$this->recipentList->contains($recipentList)) {
            $this->recipentList[] = $recipentList;
        }

        return $this;
    }

    public function removeRecipentList(RecipentList $recipentList): self
    {
        if ($this->recipentList->contains($recipentList)) {
            $this->recipentList->removeElement($recipentList);
        }

        return $this;
    }
}
