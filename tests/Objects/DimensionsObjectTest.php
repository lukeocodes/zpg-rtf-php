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
            $this->object->setLength(12)
        );

        $this->assertSame(
            12,
            $this->object->getLength()
        );
    }

    public function testCanSetWidth()
    {
        $this->assertInstanceOf(
            DimensionsObject::class,
            $this->object->setWidth(8)
        );

        $this->assertSame(
            8,
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

    public function testCanJsonSerialize()
    {
        $this->assertJson(
            json_encode($this->object)
        );
    }
}
