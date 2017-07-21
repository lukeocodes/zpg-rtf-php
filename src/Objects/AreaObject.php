<?php

namespace ZpgRtf\Objects;

/**
 * This describes a single area. It is a constituent of a number of other objects. This should not be confused with the
 * areas object.
 */
class AreaObject implements \JsonSerializable
{
    /** @var null|float **/
    private $value;

    /**
     * Array of enum (sq_feet, sq_yards, sq_metres, acres, hectares)
     *
     * @var null|string
     */
    private $units;

    /**
     * @return null|float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     *
     * @return AreaObject
     */
    public function setValue(float $value): self
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
        $unitTypes = [
            'sq_feet',
            'sq_yards',
            'sq_metres',
            'acres',
            'hectares'
        ];

        if (in_array($units, $unitTypes)) {
            $this->units = $units;

            return $this;
        }

        throw new \Exception(sprintf('%s is not in %s', $units, json_encode($unitTypes)));
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
