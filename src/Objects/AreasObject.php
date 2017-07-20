<?php

namespace ZpgRtf\Objects;

/**
 * The internal/external areas of the property.
 */
class AreasObject implements \JsonSerializable
{
    /** @var null|MinMaxAreaObject */
    private $external;

    /** @var null|MinMaxAreaObject */
    private $internal;

    /**
     * @return null|MinMaxAreaObject
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
    public function setExternal(MinMaxAreaObject $external): self
    {
        $this->external = $external;

        return $this;
    }

    /**
     * @return null|MinMaxAreaObject
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
