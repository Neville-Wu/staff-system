<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//View Notification
class ViewNotificationTest extends TestCase{
    /** @test */
    public function View_Notification()

    {
        $notices =DB::table('user_schedule', '*, user_schedule.id s_id')
        ->condition('join schedule s on s.id=schedule_id where user_id=1')
        ->all();
        
        $this->assertNotEmpty($notices);
    }


}