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
     * @return string
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
    public function setHeading($heading)
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * @return DimensionsObject
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
    public function setDimensions(DimensionsObject $dimensions)
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * @return string
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
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return [
            'heading' => $this->getHeading(),
            'dimensions' => $this->getDimensions(),
            'text' => $this->getText(),
        ];
    }
}
