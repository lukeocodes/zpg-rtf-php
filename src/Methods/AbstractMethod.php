<?php

namespace ZpgRtf\Methods;

use GuzzleHttp\Client;
use League\JsonGuard\Validator;
use League\JsonReference\Dereferencer;

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

    /**
     * @param string $schemaUri
     * @param string $uri
     * @param \JsonSerializable $object
     *
     * @return \GuzzleHttp\Psr7\Response
     *
     * @throws \Exception If validation fails. Needs a custom exception type.
     */
    protected function validateAndSend($schemaUri, $uri, \JsonSerializable $object)
    {
        $payload = json_encode($object);
        $schema = Dereferencer::draft4()->dereference($schemaUri);
        $validator = new Validator(json_decode($payload), $schema);

        if ($validator->fails()) {
            throw new \Exception('Fails validation');
        }

        return $this->getClient()->request('POST', $uri, [
            'body' => $payload
        ]);
    }
}
