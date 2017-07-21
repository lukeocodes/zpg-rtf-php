<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\ContentObject;

class ContentObjectTest extends TestCase
{
    /**
     * @var ContentObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new ContentObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            ContentObject::class,
            $this->object
        );
    }

    public function testCanSetUrl()
    {
        $this->assertInstanceOf(
            ContentObject::class,
            $this->object->setUrl('https://www.github.com')
        );

        $this->assertStringStartsWith(
            'https://www.github.com',
            $this->object->getUrl()
        );
    }

    public function testCanSetType()
    {
        $this->assertInstanceOf(
            ContentObject::class,
            $this->object->setType('image')
        );

        $this->assertStringStartsWith(
            'image',
            $this->object->getType()
        );
    }

    public function testSetTypeInvalidValueReturnsException()
    {
        $this->expectException(\Exception::class);

        $this->object->setType('not_an_image');
    }

    public function testCanSetCaption()
    {
        $this->assertInstanceOf(
            ContentObject::class,
            $this->object->setCaption('An image.')
        );

        $this->assertStringStartsWith(
            'An image.',
            $this->object->getCaption()
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
