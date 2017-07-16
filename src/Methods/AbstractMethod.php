<?php

namespace ZpgRtf\Methods;

use GuzzleHttp\Client;

/**
 * The listing method allows you to list, update or delete listings on the ZPG rtf.
 */
abstract class AbstractMethod
{
    /** @var string */
    const BASE_URI = 'https://realtime-listings-api.webservices.zpg.co.uk/sandbox/v1/';

    /** @var Client */
    private $client;

    /**
     * @param string $certificate
     */
    public function __construct($certificate)
    {
        $this->client = new Client([
            'base_uri' => self::BASE_URI,
            'cert' => $certificate,
        ]);
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     *
     * @return static
     */
    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }
}
