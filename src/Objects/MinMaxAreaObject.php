<?php

namespace ZpgRtf\Objects;

/**
 * The min_max_area object defines an area range. Where only one is specified, we will regard them both as having the
 * same value - i.e. a fixed area.
 */
class MinMaxAreaObject implements \JsonSerializable
{
    /** @var null|AreaObject */
    private $minimum;

    /** @var null|AreaObject */
    private $maximum;

    /**
     * @return null|AreaObject
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * @param AreaObject $minimum
     *
     * @return MinMaxAreaObject
     */
    public function setMinimum(AreaObject $minimum): self
    {
        $this->minimum = $minimum;

        return $this;
    }

    /**
     * @return null|AreaObject
     */
    public function getMaximum()
    {
        return $this->maximum;
    }

    /**
     * @param AreaObject $maximum
     *
     * @return MinMaxAreaObject
     */
    public function setMaximum(AreaObject $maximum): self
    {
        $this->maximum = $maximum;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'minimum' => $this->getMinimum(),
            'maximum' => $this->getMaximum(),
        ]);
    }
}
