<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Manager Calendar  test
class ManagerCalendarTest extends TestCase{
    /** @test */
    public function ManagerCalendar()

    {
        $Calendar = Schedule::get()->all();
        $this->assertEquals($Calendar[0]['name'], 'test');
    }


}