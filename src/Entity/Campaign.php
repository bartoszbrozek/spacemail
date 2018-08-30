<?php

namespace App\Entity;

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
}
