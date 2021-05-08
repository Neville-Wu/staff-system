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


    public function list()
    {
        Helpers::render('schedule/list', ['list' => Schedule::get()->all()]);
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
