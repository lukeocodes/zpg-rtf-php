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
     * @return string
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
    public function setBranchReference($branchReference)
    {
        $this->branchReference = $branchReference;

        return $this;
    }

    /**
     * @return string
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
    public function setBranchName($branchName)
    {
        $this->branchName = $branchName;

        return $this;
    }

    /**
     * @return LocationObject
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
    public function setLocation(LocationObject $location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return string
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
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return string
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
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
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
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize() {
        return [
            'branch_reference' => $this->getBranchReference(),
            'branch_name' => $this->getBranchName(),
            'location' => $this->getLocation(),
            'telephone' => $this->getTelephone(),
            'email' => $this->getEmail(),
            'website' => $this->getWebsite(),
        ];
    }
}
