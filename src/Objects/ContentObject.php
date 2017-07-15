<?php

namespace ZpgRtf\Objects;

class ContentObject implements \JsonSerializable
{
    /** @var string */
    private $url;

    /**
     * Enum(audio_tour, brochure, document, epc_graph, epc_report, floor_plan, home_pack, image, site_plan, virtual_tour)
     *
     * @var string
     * @todo Make these constants.
     */
    private $type;

    /** @var string */
    private $caption;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return ContentObject
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return ContentObject
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     *
     * @return ContentObject
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize() {
        return [
            'url' => $this->getUrl(),
            'type' => $this->getType(),
            'caption' => $this->getCaption(),
        ];
    }
}
