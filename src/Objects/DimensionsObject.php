<?php

namespace ZpgRtf\Objects;

/**
 * Information about the dimensions of a room.
 */
class DimensionsObject implements \JsonSerializable
{
    /** @var float */
    private $length;

    /** @var float */
    private $width;

    /**
     * Enum (feet, metres)
     *
     * @var string
     */
    private $units;

    /**
     * @return null|float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param float $length
     *
     * @return DimensionsObject
     */
    public function setLength(float $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return null|float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     *
     * @return DimensionsObject
     */
    public function setWidth(float $width): self
    {
        $this->width = $width;

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
     * @return DimensionsObject
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
            'length' => $this->getLength(),
            'width' => $this->getWidth(),
            'units' => $this->getUnits(),
        ]);
    }
}
