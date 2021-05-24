

<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Change Work hour test
class ChangeWorkhourTest extends TestCase{
    /** @test */
    public function ChangeWorkhour()

    {
        $us = User::editProfile(['work_hours' => 30], 2);
        $this->assertNotEmpty($us);
    }


}