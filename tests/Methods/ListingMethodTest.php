<?php

namespace ZpgRtf\Tests\Helpers;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Methods\ListingMethod;

class ListingMethodTest extends TestCase
{
    public function testListListings()
    {
        $method = new ListingMethod(__DIR__.'/../Mocks/certificate.pem');
        $this->assertNull($method->list());
    }

    public function testUpdateListing()
    {
        $method = new ListingMethod(__DIR__.'/../Mocks/certificate.pem');
        $this->assertNull($method->update());
    }

    public function testDeleteListing()
    {
        $method = new ListingMethod(__DIR__.'/../Mocks/certificate.pem');
        $this->assertNull($method->delete());
    }
}
