<?php

    Flight::route('/', function(){
        
        Flight::render("index.tpl", array());

    });

    Flight::route('/login', function(){

        Flight::render("login.tpl", array());

    });

    Flight::route('/register', function(){

        Flight::render("register.tpl", array());

    });

?>