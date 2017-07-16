<?php

namespace ZpgRtf\Objects;

/**
 * Royal Mail's addressing scheme is known as Postcode Address File (PAF). Many third-party systems use this to
 * facilitate the selection of an address from an initial postcode. Per Royal Mail's specification: "Each address on
 * PAF® has an eight-digit number associated with it - the Address Key. This number in conjunction with the
 * Organisation Key and Postcode Type identifies the address."
 */
class PafAddressObject implements \JsonSerializable
{
    /** @var string */
    private $addressKey;

    /** @var string */
    private $organisationKey;

    /** @var string */
    private $postcodeType;

    /**
     * @return string
     */
    public function getAddressKey()
    {
        return $this->addressKey;
    }

    /**
     * @param string $addressKey
     *
     * @return PafAddressObject
     */
    public function setAddressKey($addressKey)
    {
        $this->addressKey = $addressKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrganisationKey()
    {
        return $this->organisationKey;
    }

    /**
     * @param string $organisationKey
     *
     * @return PafAddressObject
     */
    public function setOrganisationKey($organisationKey)
    {
        $this->organisationKey = $organisationKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostcodeType()
    {
        return $this->postcodeType;
    }

    /**
     * @param string $postcodeType
     *
     * @return PafAddressObject
     */
    public function setPostcodeType($postcodeType)
    {
        $this->postcodeType = $postcodeType;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return [
            'address_key' => $this->getAddressKey(),
            'organisation_key' => $this->getOrganisationKey(),
            'postcode_type' => $this->getPostcodeType(),
        ];
    }
}
