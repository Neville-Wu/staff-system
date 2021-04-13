<?php

class FileLoad
{
    public $base_dir = '';
    public $default_dir = ['lib', 'config/config.php', 'controller/Controller.php', 'model'];

    public function __construct($dir = null)
    {
        $this->base_dir = $dir;
    }

    public function run($dir = [])
    {
        $dir = count($dir) ? $dir : $this->default_dir;
        $this->load($dir);
    }

    public function load($arr, $dir = '')
    {
        foreach ($arr as $v) {
            $v = $dir . $v;
            if (is_dir($v)) {
                $this->load(array_slice(scandir($v), 2), $v . '/');
            } else if (is_file($v)) {
                include_once $this->base_dir . $v;
            }
        }
    }
}

