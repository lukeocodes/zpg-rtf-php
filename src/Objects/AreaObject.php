<?php

namespace ZpgRtf\Objects;

/**
 * This describes a single area. It is a constituent of a number of other objects. This should not be confused with the
 * areas object.
 */
class AreaObject implements \JsonSerializable
{
    /** @var int **/
    private $value;

    /**
     * Array of enum (sq_feet, sq_yards, sq_metres, acres, hectares)
     *
     * @var string e.g. sq_metres
     */
    private $units;

    /**
     * @return null|int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     *
     * @return AreaObject
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

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
     * @return AreaObject
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
            'units' => $this->getUnits(),
            'value' => $this->getValue(),
        ]);
    }
}
