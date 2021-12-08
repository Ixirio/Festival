<?php

    require 'includes/flight/flight/Flight.php';
    require 'includes/smarty/libs/Smarty.class.php';
    require 'includes/pdo.php';

    $db = new PDO(
        "mysql:host=$baseAdress; port=$serverPort; dbname=$baseName",
        "$username",
        "$password"
    );

    Flight::set('maBase', $db);

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

    if(isset($_SESSION["utilisateur"])){
        Flight::view()->assign("utilisateur", $_SESSION["utilisateur"]);
    }

    require "routes/routes.php";

    Flight::start();

?>