<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Reject Shift test
class RejectShiftTest extends TestCase{
    /** @test */
    public function Reject_Shift()

    {
        $value = ['status' => 'Rejected', 'id' => 3];
        $u = User::setAllocationStatus($value);
        
        $this->assertNotEmpty($u);
    }


}