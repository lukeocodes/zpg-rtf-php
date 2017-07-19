<?php

namespace ZpgRtf\Objects;

/**
 * This object describes any ongoing service charges which are applicable. Note that you can only specify one of
 * per_unit_area_units or frequency.
 */
class ServiceChargeObject implements \JsonSerializable
{
    /** @var float */
    private $charge;

    /**
     * Enum (sq_feet, sq_yards, sq_metres, acres, hectares)
     *
     * @var string
     */
    private $perUnitAreaUnits;

    /**
     * Enum (per_person_per_week, per_week, per_month, per_quarter, per_year)
     *
     * @var string
     */
    private $frequency;

    /**
     * @return float
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * @param float $charge
     *
     * @return ServiceChargeObject
     */
    public function setCharge($charge)
    {
        $this->charge = $charge;

        return $this;
    }

    /**
     * @return string
     */
    public function getPerUnitAreaUnits()
    {
        return $this->perUnitAreaUnits;
    }

    /**
     * @param string $perUnitAreaUnits
     *
     * @return ServiceChargeObject
     */
    public function setPerUnitAreaUnits($perUnitAreaUnits)
    {
        $this->perUnitAreaUnits = $perUnitAreaUnits;

        return $this;
    }

    /**
     * @return string
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param string $frequency
     *
     * @return ServiceChargeObject
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return array_filter([
            'charge' => $this->getCharge(),
            'per_unit_area_units' => $this->getPerUnitAreaUnits(),
            'frequency' => $this->getFrequency(),
        ]);
    }
}
