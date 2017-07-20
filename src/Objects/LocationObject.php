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
    /** @var null|string */
    private $propertyNameOrNumber;

    /** @var null|string */
    private $streetName;

    /** @var null|string */
    private $locality;

    /** @var null|string */
    private $townOrCity;

    /** @var null|string */
    private $county;

    /** @var null|string */
    private $postalCode;

    /** @var null|string */
    private $countryCode;

    /** @var null|CoordinatesObject */
    private $coordinates;

    /** @var null|PafAddressObject */
    private $pafAddress;

    /** @var null|string */
    private $pafUdprn;

    /**
     * @return null|string
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
    public function setPropertyNameOrNumber(string $propertyNameOrNumber): self
    {
        $this->propertyNameOrNumber = $propertyNameOrNumber;

        return $this;
    }

    /**
     * @return null|string
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
    public function setStreetName(string $streetName): self
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * @return null|string
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
    public function setLocality(string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * @return null|string
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
    public function setTownOrCity(string $townOrCity): self
    {
        $this->townOrCity = $townOrCity;

        return $this;
    }

    /**
     * @return null|string
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
    public function setCounty(string $county): self
    {
        $this->county = $county;

        return $this;
    }

    /**
     * @return null|string
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
    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return null|string
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
    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return null|CoordinatesObject
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
    public function setCoordinates(CoordinatesObject $coordinates): self
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * @return null|PafAddressObject
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
    public function setPafAddress(PafAddressObject $pafAddress): self
    {
        $this->pafAddress = $pafAddress;

        return $this;
    }

    /**
     * @return null|string
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
    public function setPafUdprn(string $pafUdprn): self
    {
        $this->pafUdprn = $pafUdprn;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
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
