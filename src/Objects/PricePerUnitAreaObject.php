<?php

namespace ZpgRtf\Objects;

/**
 * This object describes a price which is provided as a function of floor area.
 */
class PricePerUnitAreaObject implements \JsonSerializable
{
    /** @var null|float */
    private $price;

    /**
     * Enum (sq_feet, sq_yards, sq_metres, acres, hectares)
     *
     * @var null|string
     */
    private $units;

    /**
     * @return null|float
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
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return null|string
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
    public function setUnits(string $units): self
    {
        $this->units = $units;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'price' => $this->getPrice(),
            'units' => $this->getUnits(),
        ]);
    }
}
