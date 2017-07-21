<?php

namespace ZpgRtf\Tests\Objects;

use ZpgRtf\Objects\ListingDeleteObject;
use PHPUnit\Framework\TestCase;

class ListingDeleteObjectTest extends TestCase
{
    /**
     * @var ListingDeleteObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new ListingDeleteObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            ListingDeleteObject::class,
            $this->object
        );
    }

    public function testCanSetListingReference()
    {
        $this->assertInstanceOf(
            ListingDeleteObject::class,
            $this->object->setListingReference('listing-000001')
        );

        $this->assertSame(
            'listing-000001',
            $this->object->getListingReference()
        );
    }

    public function testCanSetDeletionReason()
    {
        $this->assertInstanceOf(
            ListingDeleteObject::class,
            $this->object->setDeletionReason('withdrawn')
        );

        $this->assertSame(
            'withdrawn',
            $this->object->getDeletionReason()
        );
    }

    public function testSetDeletionReasonInvalidValueReturnsException()
    {
        $this->expectException(\Exception::class);

        $this->object->setDeletionReason('withdraw');
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
