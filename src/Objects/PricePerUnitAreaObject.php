<?php

namespace ZpgRtf\Objects;

/**
 * This object describes a price which is provided as a function of floor area.
 */
class PricePerUnitAreaObject implements \JsonSerializable
{
    /** @var float */
    private $price;

    /**
     * Enum (sq_feet, sq_yards, sq_metres, acres, hectares)
     *
     * @var string
     */
    private $units;

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return PricePerUnitAreaObject
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param string $units
     *
     * @return PricePerUnitAreaObject
     */
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return [
            'price' => $this->getPrice(),
            'units' => $this->getUnits(),
        ];
    }
}
