
<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Change PasswordTest test
class ChangePassword Test extends TestCase{
    /** @test */
    public function ChangePassword()

    {
        $us = User::editProfile(['password'=>md5('abc')], 1);
        $this->assertNotEmpty($us);
    }


}