<?php

class ScheduleController extends Controller
{
    public $page_restriction = [
        'staff' => [],
        'manager' => ['add', 'list', 'managerCalendar']
    ];

    public function __construct()
    {
        parent::__construct();
        if (!Helpers::access('manager') && in_array(CTRL, $this->page_restriction['manager'])) {
            Helpers::render('view/errors/errors-403.php', [], [], [], true);
            die();
        }
    }


    public function list()
    {
        Helpers::render('schedule/list', ['list' => Schedule::get()->all()]);
    }


    public function add()
    {
        if (isset($_POST['schedule'])) {
            $post = $_POST['schedule'];
            $schedule = Schedule::insert($post['name'], $post['start_time'], $post['end_time'], $post['location']);

            if ($schedule) {
                Helpers::alert('schedule/add', 'Added successfully!');
            } else {
                Helpers::render('schedule/add', ['errors' => 'The start time, end time, or location was entered incorrectly.']);
            }
        } else {
            Helpers::render('schedule/add');
        }
    }

    public function editDuration()
    {
        if (isset($_POST['schedule'])) {
            $post = $_POST['schedule'];
            $us = Schedule::editDuration($post['start_time'], $post['end_time'], $_GET['id']);

            if ($us) {
                Helpers::alert('schedule/scheduleDetail', 'Edited successfully!', ['id'=>$_GET['id']]);
            }
        } else {
            $schedule = Schedule::get($_GET['id'])->one();
            Helpers::render('schedule/change_duration', ['schedule'=>$schedule]);
        }
    }

    public function scheduleDetail()
    {
        $schedule = Schedule::get($_GET['id'])->one();
        $user = TimeStatus::getAvailableStaff()->all();
        $allocated = User_Schedule::getAllocateStaff($_GET['id'])->all();
        $remain = User_Schedule::getRemainHours()->all();
        $userstatus = [];

        $allocate_id = array_map(function ($v) {
            return $v['id'];
        }, $allocated);

        foreach ($user as $u) {
            if (!empty($u['start_time']) && !empty($u['end_time'])) {
                if (($u['start_time'] >= $schedule['end_time'] || $u['end_time'] <= $schedule['start_time'])) {
                    $mark = 0;
                    foreach ($userstatus as $us) {
                        if ($us['user_id'] == $u['user_id']) {
                            $mark++;
                        }
                    }
                    if ($mark == 0) {
                        $u['timestatus'] = 'available';
                        $userstatus[] = $u;
                    }
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
            foreach ($remain as $v) {
                if ($v['user_id'] == $u['id']) {
                    $userstatus[count($userstatus) - 1]['hours'] = $u['work_hours'] - $v['hours'];
                } else {
                    $userstatus[count($userstatus) - 1]['hours'] = $u['work_hours'];
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

        Helpers::render('schedule/detail', [
            'schedule' => $schedule,
            'userstatus' => $userstatus,
            'allocate_id' => $allocate_id,
            'error' => $err
        ]);
    }


    public function managerCalendar()
    {
        Helpers::render('schedule/manager_calendar', [],['module_library/fullcalendar/dist/fullcalendar.min.css'],['module_library/fullcalendar/dist/fullcalendar.min.js','assets/js/modules-calendar.js']);
    }


    public function getListJson()
    {
        echo json_encode(Schedule::get()->all());
    }


    public function staffCalendar()
    {
        Helpers::render('schedule/staff_calendar', [],['module_library/fullcalendar/dist/fullcalendar.min.css'],['module_library/fullcalendar/dist/fullcalendar.min.js','assets/js/modules-calendar.js']);
    }


    public function getStaffScheduleJson()
    {
        $schedule = User_Schedule::getAllocateSchedule($_SESSION['user']['id'])->all();
        echo json_encode($schedule);
    }


    public function getTimeStatusJson()
    {
        $time_status = TimeStatus::get($_SESSION['user']["id"])->all();
        echo json_encode($time_status);
    }
}
