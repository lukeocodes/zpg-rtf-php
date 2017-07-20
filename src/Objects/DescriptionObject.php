<?php

namespace ZpgRtf\Objects;

/**
 * The description is expressed as an array of description objects, each of which represent a paragraph or section.
 */
class DescriptionObject implements \JsonSerializable
{
    /** @var string */
    private $heading;

    /** @var DimensionsObject */
    private $dimensions;

    /** @var string */
    private $text;

    /**
     * @return null|string
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * @param string $heading
     *
     * @return DescriptionObject
     */
    public function setHeading($heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * @return null|DimensionsObject
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param DimensionsObject $dimensions
     *
     * @return DescriptionObject
     */
    public function setDimensions(DimensionsObject $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return DescriptionObject
     */
    public function setText($text): self
    {
        $this->text = $text;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'heading' => $this->getHeading(),
            'dimensions' => $this->getDimensions(),
            'text' => $this->getText(),
        ]);
    }
}
