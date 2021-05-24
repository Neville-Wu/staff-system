
<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Deactivate test
class DeactivateTest extends TestCase{
    /** @test */
    public function Deactivate()

    {
        $value = ['mode' => 'deactivated', 'id' => 1];
        $us = User::setAccountMode($value);
        $this->assertNotEmpty($us);
    }


}