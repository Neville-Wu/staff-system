<?php

include(__DIR__."/../../../index.php");

use PHPUnit\Framework\TestCase;
//Calendar Detail test
class CalendarDetailTest extends TestCase{
    /** @test */
    public function Calendar_Detail()

    {
        $schedule = Schedule::get($_GET['id'])->one();
        $user = TimeStatus::getAvailableStaff()->all();
        $allocated = User_Schedule::getAllocateStaff($_GET['id'])->all();
        $userstatus = [];
        $allocate_id = array_map(function ($v) {
            return $v['id'];
        }, $allocated);

        foreach ($user as $u) {
            if (isset($u['start_time']) && isset($u['end_time'])) {
                if (($u['start_time'] >= $schedule['end_time'] || $u['end_time'] <= $schedule['start_time'])) {

                } else {
                    $u['timestatus'] = 'unavailable';
                    $userstatus[] = $u;
                }
            } else {
                $u['timestatus'] = 'available';
                $userstatus[] = $u;
            }
            foreach ($allocated as $v) {
                if ($v['user_id'] == $u['id']) {
                    $userstatus[count($userstatus) - 1]['status'] = $v['status'];
                }
            }
        }

        $err = '';
        if (isset($_POST['allocate'])) {
            $post = $_POST['allocate'];
            $us = User_Schedule::allocate($post);

            if ($us) {
                Helpers::alert('schedule/scheduleDetail', 'Added successfully!', ['id'=>$post['s_id']]);
            } else {
                $err = 'Allocate failed, please try again.';
            }
        }

        $this->assertNotEmpty($schedule);
    }


}