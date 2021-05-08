<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//login test
class LoginTest extends TestCase{
    /** @test */
    public function Login_Test()
    {
        
        $email = "admin1@example.com";
        $password = md5("admin1");
        $user = User::get(3)->one();
        $this ->assertEquals($user['id'], 3);
        $this ->assertEquals($user['email'], $email);
        $this ->assertEquals($user['password'], $password);

    }
}