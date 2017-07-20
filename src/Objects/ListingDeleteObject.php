<?php

namespace ZpgRtf\Objects;

/**
 * The listing delete object allows you to remove a listing from a branch's inventory list.
 */
class ListingDeleteObject implements \JsonSerializable
{
    /** @var null|string */
    private $listingReference;

    /**
     * Enum (withdrawn, offer_accepted, exchanged, completed, let)
     *
     * @var null|string
     */
    private $deletionReason;

    /**
     * @return null|string
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
    public function setListingReference(string $listingReference): self
    {
        $this->listingReference = $listingReference;

        return $this;
    }

    /**
     * @return null|string
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
    public function setDeletionReason(string $deletionReason): self
    {
        $this->deletionReason = $deletionReason;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'listing_reference' => $this->getListingReference(),
            'deletion_reason' => $this->getDeletionReason(),
        ]);
    }
}
