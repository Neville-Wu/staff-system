
<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Create Account test
class CreateAccountTest extends TestCase{
    /** @test */
    public function CreateAccount()

    {
        $user = User::createAccount('test1@example.com', md5('test1'), 'Test1', 20,'staff');
        $this->assertNotEmpty($user);
    }


}