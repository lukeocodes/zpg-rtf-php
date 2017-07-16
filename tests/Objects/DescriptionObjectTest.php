<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\DescriptionObject;
use ZpgRtf\Objects\DimensionsObject;

class DescriptionObjectTest extends TestCase
{
    /**
     * @var DescriptionObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new DescriptionObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            DescriptionObject::class,
            $this->object
        );
    }

    public function testCanSetHeading()
    {
        $this->assertInstanceOf(
            DescriptionObject::class,
            $this->object->setHeading('Heading')
        );

        $this->assertSame(
            'Heading',
            $this->object->getHeading()
        );
    }

    public function testCanTestDimensions()
    {
        $this->assertInstanceOf(
            DescriptionObject::class,
            $this->object->setDimensions(new DimensionsObject())
        );

        $this->assertInstanceOf(
            DimensionsObject::class,
            $this->object->getDimensions()
        );
    }

    public function testCanSetText()
    {
        $this->assertInstanceOf(
            DescriptionObject::class,
            $this->object->setText('Text here')
        );

        $this->assertSame(
            'Text here',
            $this->object->getText()
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
