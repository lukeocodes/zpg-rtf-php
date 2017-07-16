<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\PricePerUnitAreaObject;
use ZpgRtf\Objects\PricingObject;

class PricingObjectTest extends TestCase
{
    /**
     * @var PricingObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new PricingObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            PricingObject::class,
            $this->object
        );
    }

    public function setTransactionType()
    {
        $this->assertInstanceOf(
            PricingObject::class,
            $this->object->setTransactionType('sale')
        );

        $this->assertSame(
            'sale',
            $this->object->getTransactionType()
        );
    }

    public function setCurrencyCode()
    {
        $this->assertInstanceOf(
            PricingObject::class,
            $this->object->setCurrencyCode('GBP')
        );

        $this->assertSame(
            'GBP',
            $this->object->getCurrencyCode()
        );
    }

    public function setPrice()
    {
        $this->assertInstanceOf(
            PricingObject::class,
            $this->object->setPrice(250000)
        );

        $this->assertSame(
            250000,
            $this->object->getPrice()
        );
    }

    public function setPricePerUnitArea()
    {
        $this->assertInstanceOf(
            PricingObject::class,
            $this->object->setPricePerUnitArea(new PricePerUnitAreaObject())
        );

        $this->assertInstanceOf(
            PricePerUnitAreaObject::class,
            $this->object->getPricePerUnitArea()
        );
    }

    public function setRentFrequency()
    {
        $this->assertInstanceOf(
            PricingObject::class,
            $this->object->setRentFrequency('per_week')
        );

        $this->assertSame(
            'per_week',
            $this->object->getRentFrequency()
        );
    }

    public function setPriceQualifier()
    {
        $this->assertInstanceOf(
            PricingObject::class,
            $this->object->setPriceQualifier('guide_price')
        );

        $this->assertSame(
            'guide_price',
            $this->object->getPriceQualifier()
        );
    }

    public function setAuction()
    {
        $this->assertInstanceOf(
            PricingObject::class,
            $this->object->setAuction(true)
        );

        $this->assertSame(
            true,
            $this->object->isAuction()
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
