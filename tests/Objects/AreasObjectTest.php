<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\AreasObject;
use ZpgRtf\Objects\MinMaxAreaObject;

class AreasObjectTest extends TestCase
{
    /**
     * @var AreasObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new AreasObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            AreasObject::class,
            $this->object
        );
    }

    public function testCanSetExternal()
    {
        $this->assertInstanceOf(
            AreasObject::class,
            $this->object->setExternal(new MinMaxAreaObject())
        );

        $this->assertInstanceOf(
            MinMaxAreaObject::class,
            $this->object->getExternal()
        );
    }

    public function testCanSetInternal()
    {
        $this->assertInstanceOf(
            AreasObject::class,
            $this->object->setInternal(new MinMaxAreaObject())
        );

        $this->assertInstanceOf(
            MinMaxAreaObject::class,
            $this->object->getInternal()
        );
    }

    public function testCanJsonSerialize()
    {
        $this->assertJson(
            json_encode($this->object)
        );
    }
}
