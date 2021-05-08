<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//List User  test
class ListUserTest extends TestCase{
    /** @test */
    public function ListUser()

    {
        $user = User::get()->all();
        $this->assertEquals($user[0]['full_name'], 'Test1');
    }


}