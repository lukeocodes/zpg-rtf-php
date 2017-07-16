<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\PricePerUnitAreaObject;

class PricePerUnitAreaObjectTest extends TestCase
{
    /**
     * @var PricePerUnitAreaObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new PricePerUnitAreaObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            PricePerUnitAreaObject::class,
            $this->object
        );
    }

    public function testCanSetPrice()
    {
        $this->assertInstanceOf(
            PricePerUnitAreaObject::class,
            $this->object->setPrice(250000)
        );

        $this->assertSame(
            250000,
            $this->object->getPrice()
        );
    }

    public function testCanSetUnits()
    {
        $this->assertInstanceOf(
            PricePerUnitAreaObject::class,
            $this->object->setUnits('sq_feet')
        );

        $this->assertSame(
            'sq_feet',
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
