<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\PafAddressObject;

class PafAddressObjectTest extends TestCase
{
    /**
     * @var PafAddressObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new PafAddressObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            PafAddressObject::class,
            $this->object
        );
    }

    public function testCanSetAddressKey()
    {
        $this->assertInstanceOf(
            PafAddressObject::class,
            $this->object->setAddressKey('string')
        );

        $this->assertSame(
            'string',
            $this->object->getAddressKey()
        );
    }

    public function testCanSetOrganisationKey()
    {
        $this->assertInstanceOf(
            PafAddressObject::class,
            $this->object->setOrganisationKey('string')
        );

        $this->assertSame(
            'string',
            $this->object->getOrganisationKey()
        );
    }

    public function testCanSetPostcodeType()
    {
        $this->assertInstanceOf(
            PafAddressObject::class,
            $this->object->setPostcodeType('string')
        );

        $this->assertSame(
            'string',
            $this->object->getPostcodeType()
        );
    }

    public function testCanJsonSerialize()
    {
        $this->assertJson(
            json_encode($this->object)
        );
    }
}
