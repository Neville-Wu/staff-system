<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//example test
class FirstTest extends TestCase{
    /** @test */
    public function Login_status()

        {
            $user = User::get(1)->one();
            $this->assertEquals($user['id'], 1);
        }
}