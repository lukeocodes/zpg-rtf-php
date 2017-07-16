<?php

namespace ZpgRtf\Tests\Helpers;

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
        $branch = new BranchObject();
        $branch->setWebsite('https://www.testagent.com/branch-name')
            ->setTelephone('02081111121')
            ->setBranchReference('branch-001')
            ->setBranchName('branch-name')
            ->setEmail('branch-name@testagent.com');

        $branchLocation = new LocationObject();
        $branchLocation->setPropertyNameOrNumber(9)
            ->setStreetName('Churchfield Road')
            ->setLocality('Churchfield')
            ->setTownOrCity('Sudbury')
            ->setCounty('Suffolk')
            ->setPostalCode('CO10 2YA')
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

        $method = new BranchMethod();
        $result = $method->update($branch);

        $this->assertTrue($result);
    }

    public function testUpdateBranchValidationFails()
    {
        $this->expectException(\Exception::class);

        $branch = new BranchObject();
        $branch->setWebsite('https://www.testagent.com/invalid-branch-name');

        $method = new BranchMethod();
        $method->update($branch);
    }
}
