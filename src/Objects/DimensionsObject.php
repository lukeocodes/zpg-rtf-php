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
     * @return float
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
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return float
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
    public function setWidth($width)
    {
        $this->width = $width;

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
     * @return DimensionsObject
     */
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return array_filter([
            'length' => $this->getLength(),
            'width' => $this->getWidth(),
            'units' => $this->getUnits(),
        ]);
    }
}
