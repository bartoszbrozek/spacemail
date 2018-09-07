<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampaignRepository")
 */
class Campaign
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
    private $subject;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fromName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fromEmail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $replyToEmail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $queryString;

    /**
     * @ORM\Column(type="text")
     */
    private $htmlCode;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $trackOpens;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $trackClicks;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Brand", inversedBy="campaign")
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $recipents;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sentDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $uniqueOpens;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $uniqueClicks;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\CampaignStatus", inversedBy="campaign", cascade={"persist"})
     */
    private $status;

    private $emailIdentities;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\RecipentList", mappedBy="campaign")
     */
    private $recipentLists;

    public function __construct()
    {
        $this->recipentLists = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getFromName(): ?string
    {
        return $this->fromName;
    }

    public function setFromName(string $fromName): self
    {
        $this->fromName = $fromName;

        return $this;
    }

    public function getFromEmail(): ?string
    {
        return $this->fromEmail;
    }

    public function setFromEmail(string $fromEmail): self
    {
        $this->fromEmail = $fromEmail;

        return $this;
    }

    public function getReplyToEmail(): ?string
    {
        return $this->replyToEmail;
    }

    public function setReplyToEmail(string $replyToEmail): self
    {
        $this->replyToEmail = $replyToEmail;

        return $this;
    }

    public function getQueryString(): ?string
    {
        return $this->queryString;
    }

    public function setQueryString(?string $queryString): self
    {
        $this->queryString = $queryString;

        return $this;
    }

    public function getHtmlCode(): ?string
    {
        return $this->htmlCode;
    }

    public function setHtmlCode(string $htmlCode): self
    {
        $this->htmlCode = $htmlCode;

        return $this;
    }

    public function getTrackOpens(): ?bool
    {
        return $this->trackOpens;
    }

    public function setTrackOpens(?bool $trackOpens): self
    {
        $this->trackOpens = $trackOpens;

        return $this;
    }

    public function getTrackClicks(): ?bool
    {
        return $this->trackClicks;
    }

    public function setTrackClicks(?bool $trackClicks): self
    {
        $this->trackClicks = $trackClicks;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
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

    public function getRecipents(): ?int
    {
        return $this->recipents;
    }

    public function setRecipents(?int $recipents): self
    {
        $this->recipents = $recipents;

        return $this;
    }

    public function getSentDate(): ?\DateTimeInterface
    {
        return $this->sentDate;
    }

    public function setSentDate(?\DateTimeInterface $sentDate): self
    {
        $this->sentDate = $sentDate;

        return $this;
    }

    public function getUniqueOpens(): ?int
    {
        return $this->uniqueOpens;
    }

    public function setUniqueOpens(?int $uniqueOpens): self
    {
        $this->uniqueOpens = $uniqueOpens;

        return $this;
    }

    public function getUniqueClicks(): ?int
    {
        return $this->uniqueClicks;
    }

    public function setUniqueClicks(?int $uniqueClicks): self
    {
        $this->uniqueClicks = $uniqueClicks;

        return $this;
    }

    public function getStatus(): ?CampaignStatus
    {
        return $this->status;
    }

    public function setStatus(?CampaignStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Email identities
     */
    public function setEmailIdentities(array $emailIdentities)
    {
        $this->emailIdentities = $emailIdentities;
    }

    public function getEmailIdentities(): ?array
    {
        return $this->emailIdentities;
    }

    /**
     * @return Collection|RecipentList[]
     */
    public function getRecipentLists(): Collection
    {
        return $this->recipentLists;
    }

    public function addRecipentList(RecipentList $recipentList): self
    {
        if (!$this->recipentLists->contains($recipentList)) {
            $this->recipentLists[] = $recipentList;
            $recipentList->addCampaign($this);
        }

        return $this;
    }

    public function removeRecipentList(RecipentList $recipentList): self
    {
        if ($this->recipentLists->contains($recipentList)) {
            $this->recipentLists->removeElement($recipentList);
            $recipentList->removeCampaign($this);
        }

        return $this;
    }
}
