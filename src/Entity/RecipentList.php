<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecipentListRepository")
 */
class RecipentList
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
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Campaign", inversedBy="recipentLists")
     */
    private $campaign;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recipent", mappedBy="recipentList")
     */
    private $recipent;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Task", mappedBy="recipentList")
     */
    private $tasks;

    public function __construct()
    {
        $this->campaign = new ArrayCollection();
        $this->recipent = new ArrayCollection();
        $this->tasks = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Campaign[]
     */
    public function getCampaign(): Collection
    {
        return $this->campaign;
    }

    public function addCampaign(Campaign $campaign): self
    {
        if (!$this->campaign->contains($campaign)) {
            $this->campaign[] = $campaign;
        }

        return $this;
    }

    public function removeCampaign(Campaign $campaign): self
    {
        if ($this->campaign->contains($campaign)) {
            $this->campaign->removeElement($campaign);
        }

        return $this;
    }

    /**
     * @return Collection|Recipent[]
     */
    public function getRecipent(): Collection
    {
        return $this->recipent;
    }

    public function addRecipent(Recipent $recipent): self
    {
        if (!$this->recipent->contains($recipent)) {
            $this->recipent[] = $recipent;
            $recipent->setRecipentList($this);
        }

        return $this;
    }

    public function removeRecipent(Recipent $recipent): self
    {
        if ($this->recipent->contains($recipent)) {
            $this->recipent->removeElement($recipent);
            // set the owning side to null (unless already changed)
            if ($recipent->getRecipentList() === $this) {
                $recipent->setRecipentList(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->addRecipentList($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->contains($task)) {
            $this->tasks->removeElement($task);
            $task->removeRecipentList($this);
        }

        return $this;
    }
}
