<?php

namespace ZpgRtf\Methods;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Client;
use League\JsonGuard\Validator;
use League\JsonReference\Dereferencer;

/**
 * The listing method allows you to list, update or delete listings on the ZPG rtf.
 */
abstract class AbstractMethod
{
    /** @var array */
    private $baseUri = [
        'sandbox' => 'https://realtime-listings-api.webservices.zpg.co.uk/sandbox/v1/',
        'live' => 'https://realtime-listings-api.webservices.zpg.co.uk/live/v1/',
    ];

    /** @var Client */
    private $client;

    /**
     * @param string $certificate
     *
     * @throws \Exception You will get an exception if you use an invalid environment variable.
     */
    public function __construct($certificate, $env = 'sandbox')
    {
        if (!in_array($env,['sandbox', 'live'])) {
            throw new \Exception(sprintf('Invalid environment. %s is not in [sandbox, live]', $env));
        }

        $this->client = new Client([
            'base_uri' => $this->baseUri[$env],
            'cert' => $certificate
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

        // Let's improve this with some sort of factory method to handle the response into a custom response type
        // whether it's a normal response, validation error or guzzle exception.
        if ($validator->fails()) {
            throw new \Exception('Fails validation');
        }

        try{
            $response = $this->getClient()->request('POST', $uri, [
                'body' => $payload,
                'headers' => [
                    'Content-Type' => 'application/json; profile=' . $schemaUri,
                ],
            ]);

            return $response;
        } catch (ClientException $e) {
            $responseContents = json_decode($e->getResponse()->getBody(true)->getContents(), true);

            if (false !== $responseContents && !empty($responseContents['error_advice'])) {
                throw new \Exception($responseContents['error_advice']);
            }

            throw new \Exception($e->getMessage());
        }
    }
}
