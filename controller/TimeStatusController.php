<?php

class TimeStatusController extends Controller
{
    public $page_restriction = [
        'staff' => ['add', 'list'],
        'manager' => []
    ];

    public function __construct()
    {
        parent::__construct();
        if (!Helpers::access('staff') && in_array(CTRL, $this->page_restriction['staff'])) {
            Helpers::render('view/errors/errors-403.php', [], [], [], true);
            die();
        }
    }


    /**
     * Add unavailable time
     */
    public function add()
    {
        if (isset($_POST['time_status'])) {
            $post = $_POST['time_status'];
            $time_status = TimeStatus::insert($_SESSION['user']['id'], $post['start_time'], $post['end_time'], $post['description']);

            if ($time_status) {
                Helpers::alert('time_status/add', 'Added successfully!');
            } else {
                Helpers::render('time_status/add', ['errors' => 'The start time, end time, or description was entered incorrectly.']);
            }
        } else {
            Helpers::render('time_status/add');
        }
    }


}