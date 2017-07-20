<?php

namespace ZpgRtf\Objects;

/**
 * A content object specifies a single piece of media content associated with the listing, such as an image or brochure.
 * The listing/update:content attribute is an array of these content objects, which will be displayed in the order
 * provided.
 */
class ContentObject implements \JsonSerializable
{
    /** @var string */
    private $url;

    /**
     * Enum(audio_tour, brochure, document, epc_graph, epc_report, floor_plan, home_pack, image,
     * site_plan, virtual_tour)
     *
     * @var string
     */
    private $type;

    /** @var string */
    private $caption;

    /**
     * @return null|string
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
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return null|string
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
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return null|string
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
    public function setCaption(string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'url' => $this->getUrl(),
            'type' => $this->getType(),
            'caption' => $this->getCaption(),
        ]);
    }
}
