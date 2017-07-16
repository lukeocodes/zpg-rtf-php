<?php

namespace ZpgRtf\Objects;

/**
 * The internal/external areas of the property.
 */
class AreasObject implements \JsonSerializable
{
    /** @var MinMaxAreaObject */
    private $external;

    /** @var MinMaxAreaObject */
    private $internal;

    /**
     * @return MinMaxAreaObject
     */
    public function getExternal()
    {
        return $this->external;
    }

    /**
     * @param MinMaxAreaObject $external
     *
     * @return AreasObject
     */
    public function setExternal($external)
    {
        $this->external = $external;

        return $this;
    }

    /**
     * @return MinMaxAreaObject
     */
    public function getInternal()
    {
        return $this->internal;
    }

    /**
     * @param MinMaxAreaObject $internal
     *
     * @return AreasObject
     */
    public function setInternal($internal)
    {
        $this->internal = $internal;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return [
            'external' => $this->getExternal(),
            'internal' => $this->getInternal(),
        ];
    }
}
