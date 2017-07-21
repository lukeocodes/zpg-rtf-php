<?php

namespace ZpgRtf\Objects;

/**
 * A content object specifies a single piece of media content associated with the listing, such as an image or brochure.
 * The listing/update:content attribute is an array of these content objects, which will be displayed in the order
 * provided.
 */
class ContentObject implements \JsonSerializable
{
    /** @var null|string */
    private $url;

    /**
     * Enum(audio_tour, brochure, document, epc_graph, epc_report, floor_plan, home_pack, image,
     * site_plan, virtual_tour)
     *
     * @var null|string
     */
    private $type;

    /** @var null|string */
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
        $types = [
            'audio_tour',
            'brochure',
            'document',
            'epc_graph',
            'epc_report',
            'floor_plan',
            'home_pack',
            'image',
            'site_plan',
            'virtual_tour'
        ];

        if (in_array($type, $types)) {
            $this->type = $type;

            return $this;
        }

        throw new \Exception(sprintf('%s is not in %s', $type, json_encode($types)));
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
