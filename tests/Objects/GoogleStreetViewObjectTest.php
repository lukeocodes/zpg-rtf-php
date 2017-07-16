<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\CoordinatesObject;
use ZpgRtf\Objects\GoogleStreetViewObject;

class GoogleStreetViewObjectTest extends TestCase
{
    /**
     * @var GoogleStreetViewObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new GoogleStreetViewObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            GoogleStreetViewObject::class,
            $this->object
        );
    }

    public function testCanSetCoordinates()
    {
        $this->assertInstanceOf(
            GoogleStreetViewObject::class,
            $this->object->setCoordinates(new CoordinatesObject())
        );

        $this->assertInstanceOf(
            CoordinatesObject::class,
            $this->object->getCoordinates()
        );
    }

    public function testCanSetHeading()
    {
        $this->assertInstanceOf(
            GoogleStreetViewObject::class,
            $this->object->setHeading(74.5)
        );

        $this->assertSame(
            74.5,
            $this->object->getHeading()
        );
    }

    public function testCanSetPitch()
    {
        $this->assertInstanceOf(
            GoogleStreetViewObject::class,
            $this->object->setPitch(-90)
        );

        $this->assertSame(
            -90,
            $this->object->getPitch()
        );
    }

    public function testCanJsonSerialize()
    {
        $this->assertJson(
            json_encode($this->object)
        );
    }
}
