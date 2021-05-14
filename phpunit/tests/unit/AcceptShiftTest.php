<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Accept Shift test
class AcceptShiftTest extends TestCase{
    /** @test */
    public function Accept_Shift()

    {
        $value = ['status' => 'Accepted', 'id' => 3];
        $u = User::setAllocationStatus($value);
        
        $this->assertNotEmpty($u);
    }


}