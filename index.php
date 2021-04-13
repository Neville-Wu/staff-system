<?php

define('BASE_DIR', str_replace('\index.php', '', __FILE__));
define('BASE_URL', str_replace('index.php', '', $_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']));
define('DB_CONFIG', 'config/database.php');

include 'common/autoload.php';
$file_load = new FileLoad('');
$file_load->run();

include 'common/app.php';