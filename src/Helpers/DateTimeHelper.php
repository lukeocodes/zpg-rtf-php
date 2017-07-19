<?php

namespace ZpgRtf\Helpers;

class DateTimeHelper extends \DateTime implements \JsonSerializable
{
    /** @var string */
    private $helperFormat = 'c';

    /**
     * @return string
     */
    public function getHelperFormat(): string
    {
        return $this->helperFormat;
    }

    /**
     * @param string $helperFormat
     */
    public function setHelperFormat(string $helperFormat): self
    {
        $this->helperFormat = $helperFormat;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): string
    {
        return $this->format($this->getHelperFormat());
    }
}
