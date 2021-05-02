<?php


class IndexController extends Controller
{
    public function index()
    {
        Helpers::render('site/home');
    }
}

