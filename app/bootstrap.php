<?php
    // Loading Config
    require_once('config/config.php');

    
    // Autoload Core Libraries
    spl_autoload_register(function($className){
    /*
    *In order for this to work, the FILENAME needs to MATCH the CLASS Name
    */
        require_once 'libraries/' . $className . '.php';
    });