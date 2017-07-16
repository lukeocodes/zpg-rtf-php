<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\MinimumContractLengthObject;

class MinimumContractLengthObjectTest extends TestCase
{
    /**
     * @var MinimumContractLengthObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new MinimumContractLengthObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            MinimumContractLengthObject::class,
            $this->object
        );
    }

    public function testCanSetMinimumLength()
    {
        $this->assertInstanceOf(
            MinimumContractLengthObject::class,
            $this->object->setMinimumLength('6')
        );

        $this->assertSame(
            '6',
            $this->object->getMinimumLength()
        );
    }

    public function testCanSetUnits()
    {
        $this->assertInstanceOf(
            MinimumContractLengthObject::class,
            $this->object->setUnits('months')
        );

        $this->assertSame(
            'months',
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
