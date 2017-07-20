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
     * @return null|int
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
    public function setEerCurrentRating(int $eerCurrentRating): self
    {
        $this->eerCurrentRating = $eerCurrentRating;

        return $this;
    }

    /**
     * @return null|int
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
    public function setEerPotentialRating(int $eerPotentialRating): self
    {
        $this->eerPotentialRating = $eerPotentialRating;

        return $this;
    }

    /**
     * @return null|int
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
    public function setEirCurrentRating(int $eirCurrentRating): self
    {
        $this->eirCurrentRating = $eirCurrentRating;

        return $this;
    }

    /**
     * @return null|int
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
    public function setEirPotentialRating(int $eirPotentialRating): self
    {
        $this->eirPotentialRating = $eirPotentialRating;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'eer_current_rating' => $this->getEerCurrentRating(),
            'eer_potential_rating' => $this->getEerPotentialRating(),
            'eir_current_rating' => $this->getEirCurrentRating(),
            'eir_potential_rating' => $this->getEirPotentialRating(),
        ]);
    }
}
