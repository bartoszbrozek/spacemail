<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BrandRepository")
 */
class Brand
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
     * @ORM\Column(type="string", length=255)
     */
    private $allowedAttachmentsFileTypes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlQueryString;

    /**
     * @ORM\Column(type="boolean")
     */
    private $campaignSentNotifications;

    /**
     * @ORM\Column(type="integer")
     */
    private $monthlyLimit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Template", mappedBy="brand")
     */
    private $templates;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Campaign", mappedBy="brand")
     */
    private $campaign;

    public function __construct()
    {
        $this->templates = new ArrayCollection();
        $this->campaign = new ArrayCollection();
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

    public function getAllowedAttachmentsFileTypes(): ?string
    {
        return $this->allowedAttachmentsFileTypes;
    }

    public function setAllowedAttachmentsFileTypes(string $allowedAttachmentsFileTypes): self
    {
        $this->allowedAttachmentsFileTypes = $allowedAttachmentsFileTypes;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getUrlQueryString(): ?string
    {
        return $this->urlQueryString;
    }

    public function setUrlQueryString(string $urlQueryString): self
    {
        $this->urlQueryString = $urlQueryString;

        return $this;
    }

    public function getCampaignSentNotifications(): ?bool
    {
        return $this->campaignSentNotifications;
    }

    public function setCampaignSentNotifications(bool $campaignSentNotifications): self
    {
        $this->campaignSentNotifications = $campaignSentNotifications;

        return $this;
    }

    public function getMonthlyLimit(): ?int
    {
        return $this->monthlyLimit;
    }

    public function setMonthlyLimit(int $monthlyLimit): self
    {
        $this->monthlyLimit = $monthlyLimit;

        return $this;
    }

    public function getBrand()
    {
        return $this->getName();
    }

    /**
     * @return Collection|Template[]
     */
    public function getTemplates(): Collection
    {
        return $this->templates;
    }

    public function addTemplate(Template $template): self
    {
        if (!$this->templates->contains($template)) {
            $this->templates[] = $template;
            $template->setBrand($this);
        }

        return $this;
    }

    public function removeTemplate(Template $template): self
    {
        if ($this->templates->contains($template)) {
            $this->templates->removeElement($template);
            // set the owning side to null (unless already changed)
            if ($template->getBrand() === $this) {
                $template->setBrand(null);
            }
        }

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
            $campaign->setBrand($this);
        }

        return $this;
    }

    public function removeCampaign(Campaign $campaign): self
    {
        if ($this->campaign->contains($campaign)) {
            $this->campaign->removeElement($campaign);
            // set the owning side to null (unless already changed)
            if ($campaign->getBrand() === $this) {
                $campaign->setBrand(null);
            }
        }

        return $this;
    }

}
