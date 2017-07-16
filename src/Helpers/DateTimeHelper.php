<?php

namespace ZpgRtf\Helpers;

class DateTimeHelper extends \DateTime implements \JsonSerializable
{
    /** @var string */
    private $helperFormat = 'c';

    /**
     * @return string
     */
    public function getHelperFormat()
    {
        return $this->helperFormat;
    }

    /**
     * @param string $helperFormat
     */
    public function setHelperFormat($helperFormat)
    {
        $this->helperFormat = $helperFormat;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {
        return $this->format($this->getHelperFormat());
    }
}
