<?php

    require '../includes/flight/flight/Flight.php';
    require '../includes/smarty/libs/Smarty.class.php';


    Flight::register('view', 'Smarty', array(), function($smarty){
        $smarty->template_dir = './templates/';
        $smarty->compile_dir = './templates_c/';
        $smarty->config_dir = './config/';
        $smarty->cache_dir = './cache/';    
    });

    Flight::map('render', function($template, $data){
        Flight::view()->assign($data);
        Flight::view()->display($template);
    });

    require "routes/routes.php";

    Flight::start();

?>