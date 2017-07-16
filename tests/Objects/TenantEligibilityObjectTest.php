<?php

namespace ZpgRtf\Tests\Objects;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Objects\TenantEligibilityObject;

class TenantEligibilityObjectTest extends TestCase
{
    /**
     * @var TenantEligibilityObject
     */
    protected $object;

    public function setUp()
    {
        $this->object = new TenantEligibilityObject();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            TenantEligibilityObject::class,
            $this->object
        );
    }

    public function setDss()
    {
        $this->assertInstanceOf(
            TenantEligibilityObject::class,
            $this->object->setDss('excluded')
        );

        $this->assertSame(
            'excluded',
            $this->object->getDss()
        );
    }

    public function setStudents()
    {
        $this->assertInstanceOf(
            TenantEligibilityObject::class,
            $this->object->setStudents('excluded')
        );

        $this->assertSame(
            'excluded',
            $this->object->getStudents()
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
