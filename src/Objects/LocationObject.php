<?php

namespace ZpgRtf\Objects;

/**
 * Providing an accurate address and location for the property is incredibly important because a large number of
 * existing and future features on our websites depend on it. For example: which council is responsible for the
 * maintaining and taxing the local area; or average travel times between the property and other locations of interest
 * to the user.
 */
class LocationObject implements \JsonSerializable
{
    /** @var string */
    private $propertyNameOrNumber;

    /** @var string */
    private $streetName;

    /** @var string */
    private $locality;

    /** @var string */
    private $townOrCity;

    /** @var string */
    private $county;

    /** @var string */
    private $postalCode;

    /** @var string */
    private $countryCode;

    /** @var CoordinatesObject */
    private $coordinates;

    /** @var PafAddressObject */
    private $pafAddress;

    /** @var string */
    private $pafUdprn;

    /**
     * @return string
     */
    public function getPropertyNameOrNumber()
    {
        return $this->propertyNameOrNumber;
    }

    /**
     * @param string $propertyNameOrNumber
     *
     * @return LocationObject
     */
    public function setPropertyNameOrNumber($propertyNameOrNumber)
    {
        $this->propertyNameOrNumber = $propertyNameOrNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @param string $streetName
     *
     * @return LocationObject
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param string $locality
     *
     * @return LocationObject
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * @return string
     */
    public function getTownOrCity()
    {
        return $this->townOrCity;
    }

    /**
     * @param string $townOrCity
     *
     * @return LocationObject
     */
    public function setTownOrCity($townOrCity)
    {
        $this->townOrCity = $townOrCity;

        return $this;
    }

    /**
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * @param string $county
     *
     * @return LocationObject
     */
    public function setCounty($county)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     *
     * @return LocationObject
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     *
     * @return LocationObject
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return CoordinatesObject
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param CoordinatesObject $coordinates
     *
     * @return LocationObject
     */
    public function setCoordinates(CoordinatesObject $coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * @return PafAddressObject
     */
    public function getPafAddress()
    {
        return $this->pafAddress;
    }

    /**
     * @param PafAddressObject $pafAddress
     *
     * @return LocationObject
     */
    public function setPafAddress(PafAddressObject $pafAddress)
    {
        $this->pafAddress = $pafAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getPafUdprn()
    {
        return $this->pafUdprn;
    }

    /**
     * @param string $pafUdprn
     *
     * @return LocationObject
     */
    public function setPafUdprn($pafUdprn)
    {
        $this->pafUdprn = $pafUdprn;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return array_filter([
            'property_number_or_name' => $this->getPropertyNameOrNumber(),
            'street_name' => $this->getStreetName(),
            'locality' => $this->getLocality(),
            'town_or_city' => $this->getTownOrCity(),
            'county' => $this->getCounty(),
            'postal_code' => $this->getPostalCode(),
            'country_code' => $this->getCountryCode(),
            'coordinates' => $this->getCoordinates(),
            'paf_address' => $this->getPafAddress(),
            'paf_udprn' => $this->getPafUdprn(),
        ]);
    }
}
