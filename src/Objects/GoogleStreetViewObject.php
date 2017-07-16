<?php

namespace ZpgRtf\Objects;

/**
 * Google Street View provides users with the ability to virtually explore outdoor areas. This is becoming increasingly
 * valuable to users, who are able to, for example: plan routes to bus stops; see which services are provided by local
 * shops.
 */
class GoogleStreetViewObject implements \JsonSerializable
{
    /** @var CoordinatesObject */
    private $coordinates;

    /** @var float */
    private $heading;

    /** @var float */
    private $pitch;

    /**
     * @return CoordinatesObject
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param CoordinatesObject $coordinates
     *
     * @return GoogleStreetViewObject
     */
    public function setCoordinates(CoordinatesObject $coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * @return float
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * @param float $heading
     *
     * @return GoogleStreetViewObject
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * @return float
     */
    public function getPitch()
    {
        return $this->pitch;
    }

    /**
     * @param float $pitch
     *
     * @return GoogleStreetViewObject
     */
    public function setPitch($pitch)
    {
        $this->pitch = $pitch;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return [
            'coordinates' => $this->getCoordinates(),
            'heading' => $this->getHeading(),
            'pitch' => $this->getPitch(),
        ];
    }
}
