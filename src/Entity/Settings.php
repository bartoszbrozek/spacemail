<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SettingsRepository")
 */
class Settings
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
    private $companyName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timezone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accessKeyID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secretAccessKey;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sesRegion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sendingRate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $systemApiKey;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apiCredentialsProfile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apiCredentialsPath;

    private $regions;

    public function setRegions(array $regions) {
        $this->regions = $regions;
    }

    public function getRegions() {
        return $this->regions;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
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

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getAccessKeyID(): ?string
    {
        return $this->accessKeyID;
    }

    public function setAccessKeyID(?string $accessKeyID): self
    {
        $this->accessKeyID = $accessKeyID;

        return $this;
    }

    public function getSecretAccessKey(): ?string
    {
        return $this->secretAccessKey;
    }

    public function setSecretAccessKey(?string $secretAccessKey): self
    {
        $this->secretAccessKey = $secretAccessKey;

        return $this;
    }

    public function getSesRegion(): ?string
    {
        return $this->sesRegion;
    }

    public function setSesRegion(?string $sesRegion): self
    {
        $this->sesRegion = $sesRegion;

        return $this;
    }

    public function getSendingRate(): ?int
    {
        return $this->sendingRate;
    }

    public function setSendingRate(?int $sendingRate): self
    {
        $this->sendingRate = $sendingRate;

        return $this;
    }

    public function getSystemApiKey(): ?string
    {
        return $this->systemApiKey;
    }

    public function setSystemApiKey(?string $systemApiKey): self
    {
        $this->systemApiKey = $systemApiKey;

        return $this;
    }

    public function getApiCredentialsProfile(): ?string
    {
        return $this->apiCredentialsProfile;
    }

    public function setApiCredentialsProfile(?string $apiCredentialsProfile): self
    {
        $this->apiCredentialsProfile = $apiCredentialsProfile;

        return $this;
    }

    public function getApiCredentialsPath(): ?string
    {
        return $this->apiCredentialsPath;
    }

    public function setApiCredentialsPath(?string $apiCredentialsPath): self
    {
        $this->apiCredentialsPath = $apiCredentialsPath;

        return $this;
    }
}
