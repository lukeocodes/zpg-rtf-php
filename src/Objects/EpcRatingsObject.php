<?php

namespace ZpgRtf\Objects;

/**
 * The Energy Performance Certificate (EPC) provides information about the energy efficiency and environmental impact
 * of the property.
 */
class EpcRatingsObject implements \JsonSerializable
{
    /** @var int */
    private $eerCurrentRating;

    /** @var int */
    private $eerPotentialRating;

    /** @var int */
    private $eirCurrentRating;

    /** @var int */
    private $eirPotentialRating;

    /**
     * @return int
     */
    public function getEerCurrentRating()
    {
        return $this->eerCurrentRating;
    }

    /**
     * @param int $eerCurrentRating
     *
     * @return EpcRatingsObject
     */
    public function setEerCurrentRating($eerCurrentRating)
    {
        $this->eerCurrentRating = $eerCurrentRating;

        return $this;
    }

    /**
     * @return int
     */
    public function getEerPotentialRating()
    {
        return $this->eerPotentialRating;
    }

    /**
     * @param int $eerPotentialRating
     *
     * @return EpcRatingsObject
     */
    public function setEerPotentialRating($eerPotentialRating)
    {
        $this->eerPotentialRating = $eerPotentialRating;

        return $this;
    }

    /**
     * @return int
     */
    public function getEirCurrentRating()
    {
        return $this->eirCurrentRating;
    }

    /**
     * @param int $eirCurrentRating
     *
     * @return EpcRatingsObject
     */
    public function setEirCurrentRating($eirCurrentRating)
    {
        $this->eirCurrentRating = $eirCurrentRating;

        return $this;
    }

    /**
     * @return int
     */
    public function getEirPotentialRating()
    {
        return $this->eirPotentialRating;
    }

    /**
     * @param int $eirPotentialRating
     *
     * @return EpcRatingsObject
     */
    public function setEirPotentialRating($eirPotentialRating)
    {
        $this->eirPotentialRating = $eirPotentialRating;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return array_filter([
            'eer_current_rating' => $this->getEerCurrentRating(),
            'eer_potential_rating' => $this->getEerPotentialRating(),
            'eir_current_rating' => $this->getEirCurrentRating(),
            'eir_potential_rating' => $this->getEirPotentialRating(),
        ]);
    }
}
