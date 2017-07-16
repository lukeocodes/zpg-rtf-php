<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\CoordinatesObject;
use ZpgRtf\Objects\LocationObject;
use ZpgRtf\Objects\PafAddressObject;

class LocationObjectTest extends TestCase
{
    /**
     * @var LocationObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new LocationObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            LocationObject::class,
            $this->object
        );
    }

    public function testCanSetPropertyNameOrNumber()
    {
        $this->assertInstanceOf(
            LocationObject::class,
            $this->object->setPropertyNameOrNumber('22')
        );

        $this->assertSame(
            '22',
            $this->object->getPropertyNameOrNumber()
        );
    }

    public function testCanSetStreetName()
    {
        $this->assertInstanceOf(
            LocationObject::class,
            $this->object->setStreetName('Test Street')
        );

        $this->assertSame(
            'Test Street',
            $this->object->getStreetName()
        );
    }

    public function testCanSetLocality()
    {
        $this->assertInstanceOf(
            LocationObject::class,
            $this->object->setLocality('Locality')
        );

        $this->assertSame(
            'Locality',
            $this->object->getLocality()
        );
    }

    public function testCanSetTownOrCity()
    {
        $this->assertInstanceOf(
            LocationObject::class,
            $this->object->setTownOrCity('Town')
        );

        $this->assertSame(
            'Town',
            $this->object->getTownOrCity()
        );
    }

    public function testCanSetCounty()
    {
        $this->assertInstanceOf(
            LocationObject::class,
            $this->object->setCounty('County')
        );

        $this->assertSame(
            'County',
            $this->object->getCounty()
        );
    }

    public function testCanSetPostalCode()
    {
        $this->assertInstanceOf(
            LocationObject::class,
            $this->object->setPostalCode('QQ1 1SS')
        );

        $this->assertSame(
            'QQ1 1SS',
            $this->object->getPostalCode()
        );
    }

    public function testCanSetCountryCode()
    {
        $this->assertInstanceOf(
            LocationObject::class,
            $this->object->setCountryCode('GB')
        );

        $this->assertSame(
            'GB',
            $this->object->getCountryCode()
        );
    }

    public function testCanSetCoordinates()
    {
        $this->assertInstanceOf(
            LocationObject::class,
            $this->object->setCoordinates(new CoordinatesObject())
        );

        $this->assertInstanceOf(
            CoordinatesObject::class,
            $this->object->getCoordinates()
        );
    }

    public function testCanSetPafAddress()
    {
        $this->assertInstanceOf(
            LocationObject::class,
            $this->object->setPafAddress(new PafAddressObject())
        );

        $this->assertInstanceOf(
            PafAddressObject::class,
            $this->object->getPafAddress()
        );
    }

    public function testCanSetPafUdprn()
    {
        $this->assertInstanceOf(
            LocationObject::class,
            $this->object->setPafUdprn('00001234')
        );

        $this->assertSame(
            '00001234',
            $this->object->getPafUdprn()
        );
    }


    public function testCanJsonSerialize()
    {
        $this->assertJson(
            json_encode($this->object)
        );
    }
}
