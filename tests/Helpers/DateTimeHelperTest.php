<?php

namespace ZpgRtf\Tests\Helpers;

use PHPUnit\Framework\TestCase;
use ZpgRtf\Helpers\DateTimeHelper;

class DateTimeHelperTest extends TestCase
{
    public function testCanInstantiate()
    {
        $this->assertInstanceOf(
            DateTimeHelper::class,
            new DateTimeHelper()
        );
    }

    public function testCanEncodeCustomFormat()
    {
        $format = 'c';
        $timestamp = date($format);

        $dateTimeHelper = new DateTimeHelper($timestamp);
        $dateTimeHelper->setHelperFormat($format);

        $this->assertSame(
            json_decode(json_encode($dateTimeHelper)),
            $timestamp
        );
    }
}
