<?php

Flight::route('/', function () {

    Flight::render("index.tpl", array());

});

Flight::route('GET /register', function () {

    Flight::render("register.tpl", array());

});

Flight::route('POST /register', function () {

    $form = Flight::request()->data;

    $db = flight::get("maBase");

    $messages = array();

    $email = $db->prepare("SELECT mail FROM users WHERE mail = :mail");
    $name = $db->prepare("SELECT name FROM users WHERE name = :name");
    $registerUser = $db->prepare("INSERT INTO users VALUES(:name, :mail, :pass)");

    if (empty(trim($form->name))) {
        $messages['name'] = "Le champs nom est obligatoire";
    } else {
        $name->execute(array(':name' => $form->name));
        if ($name->rowCount() != 0) {
            $messages['name'] = "Ce pseudo est déja utilisé !";
        }
    }

    if (empty(trim($form->mail))) {
        $messages['mail'] = "Le champs email est obligatoire";

    } else {


        if (filter_var($form->mail, FILTER_VALIDATE_EMAIL)) {
            $email->execute(array(':mail' => $form->mail));
            if ($email->rowCount() != 0) {
                $messages['mail'] = "Cet email est déja utilisé !";
            }
        } else {
            $messages['mail'] = "Adresse Email invalide !";
        }
    }

    if (empty(trim($form->password))) {

        $messages['password'] = "Le champ mot de passe est obligatoire";
    } else {

        if (strlen($form->password) < 8) {
            $messages['password'] = "Le mot de passe doit faire + de 8 caractères !";
        }
    }

    if (count($messages) > 0) {
        Flight::render("register.tpl", array("valeurs" => $_POST, "messages" => $messages));
    } else {
        $registerUser->execute(array(':name' => $_POST['name'], ':mail' => $_POST['mail'], ':pass' => password_hash($_POST['password'], PASSWORD_DEFAULT)));
        var_dump($registerUser);
        Flight::render("success.tpl", array());
    }

});

Flight::route('GET /login', function () {

    Flight::render("login.tpl", array());

});

Flight::route('POST /login', function () {

    $form = Flight::request()->data;
    $db = flight::get("maBase");

    $messages = array();

    if (empty(trim($form->login))) {
        $messages['login'] = "Le champ email est obligatoire";

    } else {

        if (filter_var($form->login, FILTER_VALIDATE_EMAIL)) {
            $requete = $db->prepare("SELECT * FROM users WHERE mail = :login");

        } else {
            $requete = $db->prepare("SELECT * FROM users WHERE name = :login");
        }
        $requete->execute(array(":login" => $form->login));
        if ($requete->rowCount() < 1) {
            $messages['login'] = "Identifiant invalide";
        }
    }

    if (empty(trim($form->password))) {
        $messages['password'] = "Le champ mot de passe est obligatoire";
    } else {
        if (strlen($form->password) < 8) {
            $messages['password'] = "Mot de passe invalide";
        } else {
            // $requete -> execute(array(":mail" => $form->email));
            $requete = $requete->fetch();

            if(!password_verify($form->password, $requete['pass'])){
                $messages['password'] = "Identifiant ou mot de passe invalide !";
            }
        }
    }

    if (count($messages) > 0) {
        Flight::render("login.tpl", array("valeurs" => $_POST, "messages" => $messages));

    } else {
        $_SESSION['utilisateur'] = array(
            "pseudo" => $requete['name'], "email" => $requete['mail']);
        Flight::render("index.tpl", array());
    }


});

Flight::route('GET /candidature', function () {

    Flight::render("candidature.tpl", array());

});

?>