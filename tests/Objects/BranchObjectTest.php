<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\BranchObject;
use ZpgRtf\Objects\LocationObject;

class BranchObjectTest extends TestCase
{
    /**
     * @var BranchObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new BranchObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            BranchObject::class,
            $this->object
        );
    }

    public function testCanSetBranchReference()
    {
        $this->assertInstanceOf(
            BranchObject::class,
            $this->object->setBranchReference('branch-001')
        );

        $this->assertStringStartsWith(
            'branch-001',
            $this->object->getBranchReference()
        );
    }

    public function testCanSetBranchName()
    {
        $this->assertInstanceOf(
            BranchObject::class,
            $this->object->setBranchName('branch 001')
        );

        $this->assertStringStartsWith(
            'branch 001',
            $this->object->getBranchName()
        );
    }

    public function testCanSetLocation()
    {
        $this->assertInstanceOf(
            BranchObject::class,
            $this->object->setLocation(new LocationObject())
        );

        $this->assertInstanceOf(
            LocationObject::class,
            $this->object->getLocation()
        );
    }

    public function testCanSetTelephone()
    {
        $this->assertInstanceOf(
            BranchObject::class,
            $this->object->setTelephone('07000000000')
        );

        $this->assertStringStartsWith(
            '07000000000',
            $this->object->getTelephone()
        );
    }

    public function testCanSetEmail()
    {
        $this->assertInstanceOf(
            BranchObject::class,
            $this->object->setEmail('test@test.com')
        );

        $this->assertStringStartsWith(
            'test@test.com',
            $this->object->getEmail()
        );
    }

    public function testCanSetWebsite()
    {
        $this->assertInstanceOf(
            BranchObject::class,
            $this->object->setWebsite('https://github.com')
        );

        $this->assertStringStartsWith(
            'https://github.com',
            $this->object->getWebsite()
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
