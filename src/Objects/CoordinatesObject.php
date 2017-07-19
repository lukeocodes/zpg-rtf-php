<?php

namespace ZpgRtf\Objects;

/**
 * This object describes the geographic location of a point on the Earth's surface using the latitude/longitude system.
 * ZPG recommends you store latitude/longitude with a precision of at least 5 decimal places, which allows for locating
 * a point to within approximately 1 metre.
 */
class CoordinatesObject implements \JsonSerializable
{
    /** @var float */
    private $latitude;

    /** @var float */
    private $longitude;

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     *
     * @return CoordinatesObject
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     *
     * @return CoordinatesObject
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return array_filter([
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
        ]);
    }
}
