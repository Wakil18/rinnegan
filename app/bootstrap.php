<?php
    // Loading Config
    require_once('config/config.php');

    //Loading the Libraries
    // require_once 'libraries/core.php';
    // require_once 'libraries/controller.php';
    // require_once 'libraries/database.php';


    // Autoload Core Libraries
    spl_autoload_register(function($className){
    /*
    *In order for this to work, the FILENAME needs to MATCH the CLASS Name
    */
        require_once 'libraries/' . $className . '.php';
    });