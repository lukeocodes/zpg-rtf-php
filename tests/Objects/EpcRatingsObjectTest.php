<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\EpcRatingsObject;

class EpcRatingsObjectTest extends TestCase
{
    /**
     * @var EpcRatingsObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new EpcRatingsObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            EpcRatingsObject::class,
            $this->object
        );
    }

    public function testCanSetEerCurrentRating()
    {
        $this->assertInstanceOf(
            EpcRatingsObject::class,
            $this->object->setEerCurrentRating(80)
        );

        $this->assertSame(
            80,
            $this->object->getEerCurrentRating()
        );
    }

    public function testCanSetEerPotentialRating()
    {
        $this->assertInstanceOf(
            EpcRatingsObject::class,
            $this->object->setEerPotentialRating(95)
        );

        $this->assertSame(
            95,
            $this->object->getEerPotentialRating()
        );
    }

    public function testCanSetEirCurrentRating()
    {
        $this->assertInstanceOf(
            EpcRatingsObject::class,
            $this->object->setEirCurrentRating(50)
        );

        $this->assertSame(
            50,
            $this->object->getEirCurrentRating()
        );
    }

    public function testCanSetEirPotentialRating()
    {
        $this->assertInstanceOf(
            EpcRatingsObject::class,
            $this->object->setEirPotentialRating(100)
        );

        $this->assertSame(
            100,
            $this->object->getEirPotentialRating()
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
