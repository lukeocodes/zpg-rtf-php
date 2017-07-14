<?php

namespace ZpgRtf\Objects;

/**
 * The branch object structures the branch payload.
 */
class BranchObject implements \JsonSerializable
{
    /** @var string */
    private $key;

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     *
     * @return BranchObject
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize() {
        return [
            'key' => $this->getKey(),
        ];
    }
}
