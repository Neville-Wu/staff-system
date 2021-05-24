
<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Workload Notification
class WorkloadNoteTest extends TestCase{
    /** @test */
    public function WorkloadNote()

    {
        $msg = Notification::sendMessage([
            'user_id' => 1,
            'message' => 'Your work hours have been changed to ' . 20 . ' hours per week.',
            'datetime' => date('Y-m-d H:i')
        ]);
        $this->assertNotEmpty($msg);
    }


}