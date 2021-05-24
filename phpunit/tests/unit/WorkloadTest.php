
<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Workload Test
class WorkloadTest extends TestCase{
    /** @test */
    public function Workload()

    {
        $schedule = Schedule::get(2)->one();
        $date_start = date('Y-m-d H:i:s', strtotime('monday this week', strtotime($schedule['start_time'])));
        $date_end = date('Y-m-d H:i:s', strtotime("monday next week", strtotime($schedule['end_time'])));
        $remain = User_Schedule::getRemainHours($date_start, $date_end)->all();

        $this->assertEquals($date_start, '2021-05-03 00:00:00');
        $this->assertEquals($date_end, '2021-05-10 00:00:00');
        $this->assertEquals($remain[0]['user_id'], 1);
        $this->assertEquals($remain[0]['hours'], 4);
    }


}