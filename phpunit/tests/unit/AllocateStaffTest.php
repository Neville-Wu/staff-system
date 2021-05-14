<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Allocate Staff  test
class AllocateStaffTest extends TestCase{
    /** @test */
    public function AllocateStaff()

    {
        $post = ['u_id' => 1, 's_id' => 4];
        $us = User_Schedule::allocate($post);

        $this->assertNotEmpty($us);
    }


}