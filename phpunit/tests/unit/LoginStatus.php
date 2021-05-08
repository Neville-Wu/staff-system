<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//login Status test
class LoginStatus extends TestCase{
    /** @test */
    public function Login_status()

        {
            $user = User::get(1)->one();
            $this->assertEquals($user['id'], 1);
        }
    
   
}

