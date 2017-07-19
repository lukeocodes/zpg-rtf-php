<?php

namespace ZpgRtf\Tests\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ZpgRtf\Methods\BranchMethod;
use ZpgRtf\Objects\BranchObject;
use ZpgRtf\Objects\CoordinatesObject;
use ZpgRtf\Objects\LocationObject;
use ZpgRtf\Objects\PafAddressObject;

class BranchMethodTest extends TestCase
{
    public function testUpdateBranchValidationPasses()
    {
        // Prepare the payload to send.
        $branch = new BranchObject();
        $branch->setWebsite('https://www.testagent.com/branch-name')
            ->setTelephone('02081111121')
            ->setBranchReference('branch-001')
            ->setBranchName('branch-name')
            ->setEmail('branch-name@testagent.com');

        $branchLocation = new LocationObject();
        $branchLocation->setPropertyNameOrNumber(9)
            ->setStreetName('Some Road')
            ->setLocality('Somefield')
            ->setTownOrCity('Somebury')
            ->setCounty('Somefolk')
            ->setPostalCode('SO10 2YA')
            ->setCountryCode('GB');

        $branchCoordinates = new CoordinatesObject();
        $branchCoordinates->setLatitude(52.0451852)
            ->setLongitude(0.7523342);

        $branchLocation->setCoordinates($branchCoordinates);

        $branchPaf = new PafAddressObject();
        $branchPaf->setAddressKey('02341509')
            ->setOrganisationKey('00001150')
            ->setPostcodeType('S');

        $branchLocation->setPafAddress($branchPaf)
            ->setPafUdprn('00001234');

        $branch->setLocation($branchLocation);

        // Start the method to handle the payload with the certificate supplied by ZPG.
        $method = new BranchMethod(__DIR__.'/../Mocks/certificate.pem');

        // We need a mock response so our tests don't actually spam ZPG.
        $mock = new MockHandler([
            new Response(200, [
                'Content-type' => 'application/json'
            ], file_get_contents(__DIR__.'/../Mocks/update_branch_200_response.json'))
        ]);

        // The mock is given to a handler stack that the client knows what to do with.
        $handler = HandlerStack::create($mock);

        // Now create a client to the method for us to send it.
        $mockClient = new Client(['handler' => $handler]);
        $method->setClient($mockClient);

        // Send the payload off to the api.
        $response = $method->sendUpdate($branch);

        $this->assertInstanceOf(
            Response::class,
            $response
        );
    }


    public function testUpdateBranchValidationFails()
    {
        // Prepare the payload to send.
        $branch = new BranchObject();

        // Start the method to handle the payload with the certificate supplied by ZPG.
        $method = new BranchMethod(__DIR__.'/../Mocks/certificate.pem');

        // We need a mock response so our tests don't actually spam ZPG.
        $mock = new MockHandler([
            new Response(400, [
                'Content-type' => 'application/json'
            ], file_get_contents(__DIR__.'/../Mocks/update_branch_400_response.json'))
        ]);

        // The mock is given to a handler stack that the client knows what to do with.
        $handler = HandlerStack::create($mock);

        // Now create a client to the method for us to send it.
        $mockClient = new Client(['handler' => $handler]);
        $method->setClient($mockClient);

        $this->expectException(\Exception::class);

        // Send the payload off to the api.
        $method->sendUpdate($branch);
    }
}
