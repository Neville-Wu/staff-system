
<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Change Profile Test test
class ChangeProfileTest extends TestCase{
    /** @test */
    public function ChangeProfile()

    {
        $arr = [
            'full_name'=>'abc',
            'preferred_name'=>'abc',
            'phone'=>'123231',
            'home_address'=>'asdflicef',
            'email'=>'abc@example.com',
            'work_hours'=>30
        ];
        $us = User::editProfile($arr, 1);
        $this->assertNotEmpty($us);
    }


}