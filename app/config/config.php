<?php
    // DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', '__YOUR_USER__');
    define('DB_PASS', '__YOUR_PASSWORD__');
    define('DB_NAME', '__YOUR_DBNAME__');

    // App Root
    /*
    *This dirname function trims the last directory / returns the parent directory
    *Primary App Root - D:\xampp\htdocs\rinnegan\app\config\config.php
    *After 1 dirname - D:\xampp\htdocs\rinnegan\app\config\
    *After 2nd dirname - D:\xampp\htdocs\rinnegan\app\
    
    *By using define function the directory is put into a constant
    */
    define('APPROOT', dirname(dirname(__FILE__)));

    // URL Root
    define('URLROOT', '__YOUR_URL__');

    // Site Name
    define('SiteName', '__YOUR_SITENAME__');