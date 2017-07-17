<?php

namespace ZpgRtf\Objects;

/**
 * The listing delete object allows you to remove a listing from a branch's inventory list.
 */
class ListingDeleteObject implements \JsonSerializable
{
    /** @var string */
    private $listingReference;

    /** @var string */
    private $deletionReason;

    /**
     * @return string
     */
    public function getListingReference()
    {
        return $this->listingReference;
    }

    /**
     * @param string $listingReference
     *
     * @return ListingDeleteObject
     */
    public function setListingReference($listingReference)
    {
        $this->listingReference = $listingReference;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeletionReason()
    {
        return $this->deletionReason;
    }

    /**
     * @param string $deletionReason
     *
     * @return ListingDeleteObject
     */
    public function setDeletionReason($deletionReason)
    {
        $this->deletionReason = $deletionReason;

        return $this;
    }

    /** {@inheritDoc} */
    function jsonSerialize()
    {
        return [
            'listing_reference' => $this->getListingReference(),
            'deletion_reason' => $this->getDeletionReason(),
        ];
    }
}
