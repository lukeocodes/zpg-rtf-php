<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\AreaObject;

class AreaObjectTest extends TestCase
{
    /**
     * @var AreaObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new AreaObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            AreaObject::class,
            $this->object
        );
    }

    public function testCanSetValue()
    {
        $this->assertInstanceOf(
            AreaObject::class,
            $this->object->setValue(54.6)
        );

        $this->assertSame(
            54.6,
            $this->object->getValue()
        );
    }

    public function testCanSetUnits()
    {
        $this->assertInstanceOf(
            AreaObject::class,
            $this->object->setUnits('sq_metres')
        );

        $this->assertStringStartsWith(
            'sq_metres',
            $this->object->getUnits()
        );
    }

    public function testSetUnitsInvalidValueReturnsException()
    {
        $this->expectException(\Exception::class);

        $this->object->setUnits('sq_meters');
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
