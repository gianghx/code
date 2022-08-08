<?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    ini_set('display_errors', 1);
    define('DOMAIN', $_SERVER['HTTP_HOST'].'/daisuko/cms');
    // define('SID', md5(DOMAIN));
    define('HOME', 'http://'.$_SERVER['HTTP_HOST'].'/daisuko');
    define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/daisuko/cms');
    define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].'/daisuko');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost:3308');
    define('DB_NAME', 'daisuko');
    define('DB_USER', 'root');
    define('DB_PASS', '');
?>
