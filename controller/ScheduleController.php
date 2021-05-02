<?php

class ScheduleController extends Controller
{
    public function add()
    {
        if (isset($_POST['schedule']))
        {
            $post = $_POST['schedule'];
            $schedule = Schedule::insert($post['name'], $post['start_time'], $post['end_time'], $post['location']);

            if($schedule)
            {
                Helpers::alert('schedule/add', 'Added successfully!');
            }
            else
            {
                Helpers::render('schedule/add', ['errors'=>'The start time, end time, or location was entered incorrectly.']);
            }
        }
        else
        {
            Helpers::render('schedule/add');
        }
    }

    public function list()
    {
        Helpers::render('schedule/list', ['list' => Schedule::get()->all()]);
    }

}
