<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\ServiceChargeObject;

class ServiceChargeObjectTest extends TestCase
{
    /**
     * @var ServiceChargeObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new ServiceChargeObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            ServiceChargeObject::class,
            $this->object
        );
    }

    public function testCanSetCharge()
    {
        $this->assertInstanceOf(
            ServiceChargeObject::class,
            $this->object->setCharge(100.0)
        );

        $this->assertSame(
            100.0,
            $this->object->getCharge()
        );
    }

    public function testCanSetPerUnitAreaUnits()
    {
        $this->assertInstanceOf(
            ServiceChargeObject::class,
            $this->object->setPerUnitAreaUnits('sq_feet')
        );

        $this->assertSame(
            'sq_feet',
            $this->object->getPerUnitAreaUnits()
        );
    }

    public function testCanSetFrequency()
    {
        $this->assertInstanceOf(
            ServiceChargeObject::class,
            $this->object->setFrequency('per_year')
        );

        $this->assertSame(
            'per_year',
            $this->object->getFrequency()
        );
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
