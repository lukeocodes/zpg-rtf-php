<?php

namespace ZpgRtf\Objects;

/**
 * Google Street View provides users with the ability to virtually explore outdoor areas. This is becoming increasingly
 * valuable to users, who are able to, for example: plan routes to bus stops; see which services are provided by local
 * shops.
 */
class GoogleStreetViewObject implements \JsonSerializable
{
    /** @var null|CoordinatesObject */
    private $coordinates;

    /** @var null|float */
    private $heading;

    /** @var null|float */
    private $pitch;

    /**
     * @return null|CoordinatesObject
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
    public function setCoordinates(CoordinatesObject $coordinates): self
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * @return null|float
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
    public function setHeading(float $heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * @return null|float
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
    public function setPitch(float $pitch): self
    {
        $this->pitch = $pitch;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'coordinates' => $this->getCoordinates(),
            'heading' => $this->getHeading(),
            'pitch' => $this->getPitch(),
        ]);
    }
}
