<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Staff Calendar  test
class StaffCalendarTest extends TestCase{
    /** @test */
    public function StaffCalendar()

    {
        $schedule = User_Schedule::getAllocateSchedule(2)->all();
        $this->assertNotEmpty($schedule);
    }


}