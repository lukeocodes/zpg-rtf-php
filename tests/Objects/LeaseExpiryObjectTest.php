<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Helpers\DateTimeHelper;
use ZpgRtf\Objects\LeaseExpiryObject;

class LeaseExpiryObjectTest extends TestCase
{
    /**
     * @var LeaseExpiryObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new LeaseExpiryObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            LeaseExpiryObject::class,
            $this->object
        );
    }

    public function testCanSetExpiryDate()
    {
        $this->assertInstanceOf(
            LeaseExpiryObject::class,
            $this->object->setExpiryDate(new DateTimeHelper())
        );

        $this->assertInstanceOf(
            DateTimeHelper::class,
            $this->object->getExpiryDate()
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
