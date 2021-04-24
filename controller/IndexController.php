<?php


class IndexController extends Controller
{
    public $page_restriction = ['insert', 'update', 'delete'];

    public function __construct()
    {
        parent::__construct();
        if (!Helpers::access() && in_array(CTRL, $this->page_restriction)) {
//            Helpers::render('404');
            die();
        }
    }

    public function index()
    {
        Helpers::render('site/home');
    }
}

