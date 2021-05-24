<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Duration  test
class DurationTest extends TestCase{
    /** @test */
    public function Duration()

    {
        $schedule = Schedule::get(2)->one();
        $us = Schedule::editDuration('2021-05-04 01:00:00', '2021-05-04 05:00:00', 2);

        $this->assertNotEmpty($us);
    }


}