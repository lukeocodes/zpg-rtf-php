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
    public function getExternal(): MinMaxAreaObject
    {
        return $this->external;
    }

    /**
     * @param MinMaxAreaObject $external
     *
     * @return AreasObject
     */
    public function setExternal(MinMaxAreaObject $external): self
    {
        $this->external = $external;

        return $this;
    }

    /**
     * @return MinMaxAreaObject
     */
    public function getInternal(): MinMaxAreaObject
    {
        return $this->internal;
    }

    /**
     * @param MinMaxAreaObject $internal
     *
     * @return AreasObject
     */
    public function setInternal(MinMaxAreaObject $internal): self
    {
        $this->internal = $internal;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'external' => $this->getExternal(),
            'internal' => $this->getInternal(),
        ]);
    }
}
