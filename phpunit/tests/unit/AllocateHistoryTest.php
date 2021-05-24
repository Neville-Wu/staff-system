
<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Allocate History test
class AllocateHistoryTest extends TestCase{
    /** @test */
    public function AllocateHistory()

    {
        $history = User_Schedule::getAllocateSchedule(1)->all();
        
        $this->assertNotEmpty($history);
    }


}