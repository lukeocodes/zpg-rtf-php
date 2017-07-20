<?php

namespace ZpgRtf\Objects;

use ZpgRtf\Helpers\DateTimeHelper;

/**
 * The expiry of leasehold tenure can be expressed as the actual expiry date or the number of years remaining on the
 * lease.
 */
class LeaseExpiryObject implements \JsonSerializable
{
    /** @var null|DateTimeHelper */
    private $expiryDate;

    /**
     * @return null|DateTimeHelper
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @param DateTimeHelper $expiryDate
     *
     * @return LeaseExpiryObject
     */
    public function setExpiryDate(DateTimeHelper $expiryDate): self
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'expiry_date' => $this->getExpiryDate()
        ]);
    }
}
