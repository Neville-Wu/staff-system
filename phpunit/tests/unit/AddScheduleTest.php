<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//login Status test
class AddScheduleTest extends TestCase{
    /** @test */
    public function Add_Schedule()

    {
        $post = ['name'=>'peter', 'start_time'=>'2021-04-03 12:30:00', 'end_time'=>'2021-04-04 12:30:00', 'location'=>'office'];
        $schedule = Schedule::insert($post['name'], $post['start_time'], $post['end_time'], $post['location']);

        $this->assertNotEmpty($schedule);
    }


}