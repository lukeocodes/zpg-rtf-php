<?php

namespace ZpgRtf\Objects;

/**
 * The branch object structures the main branch payload.
 */
class BranchObject implements \JsonSerializable
{
    /** @var string */
    private $branchReference;

    /** @var string */
    private $branchName;

    /** @var LocationObject */
    private $location;

    /** @var string */
    private $telephone;

    /** @var string */
    private $email;

    /** @var string */
    private $website;

    /**
     * @return null|string
     */
    public function getBranchReference()
    {
        return $this->branchReference;
    }

    /**
     * @param string $branchReference
     *
     * @return BranchObject
     */
    public function setBranchReference(string $branchReference)
    {
        $this->branchReference = $branchReference;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getBranchName()
    {
        return $this->branchName;
    }

    /**
     * @param string $branchName
     *
     * @return BranchObject
     */
    public function setBranchName(string $branchName): self
    {
        $this->branchName = $branchName;

        return $this;
    }

    /**
     * @return null|LocationObject
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param LocationObject $location
     *
     * @return BranchObject
     */
    public function setLocation(LocationObject $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     *
     * @return BranchObject
     */
    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return BranchObject
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     *
     * @return BranchObject
     */
    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'branch_reference' => $this->getBranchReference(),
            'branch_name' => $this->getBranchName(),
            'location' => $this->getLocation(),
            'telephone' => $this->getTelephone(),
            'email' => $this->getEmail(),
            'website' => $this->getWebsite(),
        ]);
    }
}
