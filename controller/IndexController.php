<?php


class IndexController extends Controller
{
    public $page_restriction = ['insert', 'update', 'delete'];

    public function __construct()
    {
        if (!Helpers::access(99) && in_array(CTRL, $this->page_restriction)) {
//            Helpers::render('404');
            die();
        }
    }

    public function index()
    {
        Helpers::render('site/home');
    }
}

