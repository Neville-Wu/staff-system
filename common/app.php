<?php

function __autoload($class){
    $dir = 'controller/'.ucfirst($class) . '.php';
    if (is_file($dir)) {
        include_once $dir;
    } else {
        die('"'.$dir.'" cannot be found');
    }
}

if (isset($_GET['ctrl'])) {
    $param_url = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'index/index';
    $param_url = explode('/', $param_url);
    define('CTRL', $param_url[1]);

    $param_url[0] = ucfirst($param_url[0]).'Controller';
    if (count($param_url) > 1) {
        $ctrl = new $param_url[0]();

        if (method_exists($ctrl, $param_url[1])) {
            $ctrl->{$param_url[1]}();
        }else{
            die('"'.$param_url[1].'" cannot be found');
        }
    }
} else {
    header('location:index.php?ctrl=index/index');
}