<?php

    Flight::route('/', function(){
        
        Flight::render("index.tpl", array());

    });

    Flight::route('GET /register', function(){

        Flight::render("register.tpl", array());

    });

    Flight::route('POST /register', function(){

        $form = Flight::request() -> data;

        $db = flight::get("maBase");

        $messages = array();

        $email = $db -> prepare("SELECT Email FROM utilisateur WHERE Email = :mail");

        $stmt = $db -> prepare("INSERT INTO utilisateur VALUES(:Pseudo, :Email, :Motdepasse, :Ville, :Pays)");
    
        if(empty(trim($form -> nom))){
            $messages['pseudo'] = "Le champs nom est obligatoire";
        }
    
        if(empty(trim($form -> email))){
            $messages['email'] = "Le champs email est obligatoire";
            
        } else {

            
            if (filter_var($form -> email, FILTER_VALIDATE_EMAIL)){
                $email -> execute(array(':mail' => $form->email));
                if ($email -> rowCount() != 0){
                    $messages['email'] = "Cet email est déja utilisé !";  
                }
            } else{
                $messages['email'] = "Adresse Email invalide !";
            }
        }
    
        if(empty(trim($form -> password))){
            
            $messages['password'] = "Le champs mot de passe est obligatoire";
        } else {
    
            if(strlen($form->password) < 8 ){
                $messages['password'] = "Le mot de passe doit faire + de 8 caractères !";
            }
        }
    
        if (count($messages) > 0){
            Flight::render("register.tpl", array("valeurs" => $_POST, "messages" => $messages));
        } else {
            $stmt -> execute(array(':pseudo' => $_POST['pseudo'], ':Email' => $_POST['email'], ':Motdepasse' => password_hash($_POST['password'], PASSWORD_DEFAULT)));
            Flight::render("success.tpl", array());
        }

    });

    Flight::route('GET /login', function(){

        Flight::render("login.tpl", array());

    });

    Flight::route('POST /login', function(){

        $form = Flight::request() -> data;
        $db = flight::get("maBase");
    
        $messages = array();
    
        $mail = $db -> prepare("SELECT Email FROM utilisateur WHERE Email = :mail");
        $requete = $db -> prepare("SELECT * FROM utilisateur WHERE Email = :mail");
    
        if(empty(trim($form -> email))){
            $messages['email'] = "Le champs email est obligatoire";
            
        } else {
        
            if (filter_var($form -> email, FILTER_VALIDATE_EMAIL)){
    
                $mail -> execute(array(":mail" => $form->email));
    
                if($mail -> rowCount() < 1){
                    $messages['email'] = "Identifiant invalide";
                }
            }
        }
    
        if(empty(trim($form->password))){
            
            $messages['password'] = "Le champs mot de passe est obligatoire";
        } else {
            if(strlen($form->password) < 8 ){
                $messages['password'] = "Le mot de passe doit faire + de 8 caractères !";
            } else {
                $requete -> execute(array(":mail" => $form->email));
                $requete = $requete->fetch();
                if(!password_verify($form->password, $requete['Motdepasse'])){
                    $messages['password'] = "Identifiant invalide !";
                }
            }
        }
    
        if (count($messages) > 0){
            Flight::render("login.tpl",array("valeurs" => $_POST, "messages" => $messages));
    
        } else {
            $_SESSION['utilisateur'] = array(
                "pseudo" => $requete['Pseudo'], "email" => $requete['Email']);
            Flight::render("index.tpl", array());
        }
    

    });


?>