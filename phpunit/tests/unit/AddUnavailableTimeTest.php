<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Add Unavailable Time test
class AddUnavailableTimeTest extends TestCase{
    /** @test */
    public function Add_Unavailable_Time()

    {
        $post = ['start_time'=>'2021-04-03 12:30:00', 'end_time'=>'2021-04-04 12:30:00','description'=>' '];
        $time_status = TimeStatus::insert(2, $post['start_time'], $post['end_time'], $post['description']);

        $this->assertNotEmpty($time_status);
    }


}