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
    /**
     * @var Client
     */
    private $mockClient;

    public function setUp()
    {
        $mock = new MockHandler([
            new Response(200, [
                'Content-type' => 'application/json'
            ], file_get_contents(__DIR__.'/../Mocks/update_branch_200_response.json'))
        ]);

        $handler = HandlerStack::create($mock);
        $this->mockClient = new Client(['handler' => $handler]);
    }

    public function testUpdateBranchValidationPasses()
    {
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

        $method = new BranchMethod(__DIR__.'/../Mocks/certificate.pem');
        $response = $method->setClient($this->mockClient)->update($branch);

        $this->assertInstanceOf(
            Response::class,
            $response
        );
    }


    public function testUpdateBranchValidationFails()
    {
        $branch = new BranchObject();
        $branch->setWebsite('https://www.testagent.com/invalid-branch-name');
        $method = new BranchMethod(__DIR__.'/../Mocks/certificate.pem');

        $this->expectException(\Exception::class);

        $method->setClient($this->mockClient)->update($branch);
    }
}
