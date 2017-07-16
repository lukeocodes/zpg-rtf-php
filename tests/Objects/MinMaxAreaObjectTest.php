<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\AreaObject;
use ZpgRtf\Objects\MinMaxAreaObject;

class MinMaxAreaObjectTest extends TestCase
{
    /**
     * @var MinMaxAreaObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new MinMaxAreaObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            MinMaxAreaObject::class,
            $this->object
        );
    }

    public function testCanSetMinimum()
    {
        $this->assertInstanceOf(
            MinMaxAreaObject::class,
            $this->object->setMinimum(new AreaObject())
        );

        $this->assertInstanceOf(
            AreaObject::class,
            $this->object->getMinimum()
        );
    }

    public function testCanSetMaximum()
    {
        $this->assertInstanceOf(
            MinMaxAreaObject::class,
            $this->object->setMaximum(new AreaObject())
        );

        $this->assertInstanceOf(
            AreaObject::class,
            $this->object->getMaximum()
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
