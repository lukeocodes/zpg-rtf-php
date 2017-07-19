<?php

namespace ZpgRtf\Objects;

use ZpgRtf\Helpers\DateTimeHelper;

/**
 * The expiry of leasehold tenure can be expressed as the actual expiry date or the number of years remaining on the
 * lease.
 */
class LeaseExpiryObject implements \JsonSerializable
{
    /** @var DateTimeHelper */
    private $expiryDate;

    /**
     * @return DateTimeHelper
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
    public function setExpiryDate(DateTimeHelper $expiryDate)
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return array_filter([
            'expiry_date' => $this->getExpiryDate()
        ]);
    }
}
