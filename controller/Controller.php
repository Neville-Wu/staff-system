<?php

class Controller
{
    public function __construct()
    {
        if (!Helpers::access() && $_GET['ctrl'] != 'user/login') {
            Helpers::redirect('user/login');
        }
    }
}
