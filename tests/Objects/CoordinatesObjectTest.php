<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\CoordinatesObject;

class CoordinatesObjectTest extends TestCase
{
    /**
     * @var CoordinatesObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new CoordinatesObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            CoordinatesObject::class,
            $this->object
        );
    }

    public function testCanSetLatitude()
    {
        $this->assertInstanceOf(
            CoordinatesObject::class,
            $this->object->setLatitude(52.0451569)
        );

        $this->assertEquals(
            52.0451569,
            $this->object->getLatitude()
        );
    }

    public function testCanSetLongitude()
    {
        $this->assertInstanceOf(
            CoordinatesObject::class,
            $this->object->setLongitude(0.7513656)
        );

        $this->assertEquals(
            0.7513656,
            $this->object->getLongitude()
        );
    }

    public function testCanJsonSerialize()
    {
        $this->assertJson(
            json_encode($this->object)
        );
    }
}
