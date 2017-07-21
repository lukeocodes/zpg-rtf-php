<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\DimensionsObject;

class DimensionsObjectTest extends TestCase
{
    /**
     * @var DimensionsObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new DimensionsObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            DimensionsObject::class,
            $this->object
        );
    }

    public function testCanSetLength()
    {
        $this->assertInstanceOf(
            DimensionsObject::class,
            $this->object->setLength(12.0)
        );

        $this->assertSame(
            12.0,
            $this->object->getLength()
        );
    }

    public function testCanSetWidth()
    {
        $this->assertInstanceOf(
            DimensionsObject::class,
            $this->object->setWidth(8.0)
        );

        $this->assertSame(
            8.0,
            $this->object->getWidth()
        );
    }

    public function testCanSetUnits()
    {
        $this->assertInstanceOf(
            DimensionsObject::class,
            $this->object->setUnits('feet')
        );

        $this->assertSame(
            'feet',
            $this->object->getUnits()
        );
    }

    public function testSetUnitsInvalidValueReturnsException()
    {
        $this->expectException(\Exception::class);

        $this->object->setUnits('foot');
    }

    public function testCanJsonSerialize()
    {
        $this->assertJson(
            json_encode($this->object)
        );

        $this->assertInstanceOf(
            \JsonSerializable::class,
            $this->object
        );
    }
}
