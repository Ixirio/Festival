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

    $admin = "0";

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

    if ($requete['name'] == "root"){
        $admin = "1";
    }

    if (count($messages) > 0) {
        Flight::render("login.tpl", array("valeurs" => $_POST, "messages" => $messages));

    } else {
        $_SESSION['utilisateur'] = array("pseudo" => $requete['name'], "email" => $requete['mail'], "admin" => $admin);
        Flight::redirect("/");
    }

});

Flight::route('GET /candidature', function () {

    $db = flight::get("maBase");
    $departements = $db->query("SELECT * FROM departement");
    $departements = $departements->fetchAll();

    Flight::render("candidature.tpl", array("departements" => $departements));

});

Flight::route('POST /candidature', function () {

    $db = flight::get("maBase");


    $form = Flight::request()->data;
    $messages = array();


    // On check si le groupeName est vide
    if (empty(trim($form->groupeName))) {
        $messages['groupeName'] = "groupeName vide";
    }

    // On check si le departement est vide
    if (empty(trim($form->departement))) {
        $messages['departement'] = "departement vide";
    }
    // On check si le sceneType est vide
    if (empty(trim($form->sceneType))) {
        $messages['sceneType'] = "sceneType vide";
    }
    // On check si le repName est vide
    if (empty(trim($form->repName))) {
        $messages['repName'] = "repName vide";
    }
    // On check si le repFName est vide
    if (empty(trim($form->repFName))) {
        $messages['repFName'] = "repFName vide";
    }
    // On check si le repAddress est vide
    if (empty(trim($form->repAddress))) {
        $messages['repAddress'] = "repAddress vide";
    }
    // On check si le repPostCode est vide
    if (empty(trim($form->repPostCode))) {
        $messages['repPostCode'] = "repPostCode vide";
    }
    // On check si le repMail est vide
    if (empty(trim($form->repMail))) {
        $messages['repMail'] = "repMail vide";
    }
    // On check si le repPhone est vide
    if (empty(trim($form->repPhone))) {
        $messages['repPhone'] = "repPhone vide";
    }

    // On check si le musicType est vide
    if (empty(trim($form->musicType))) {
        $messages['musicType'] = "musicType vide";
    }

    // On check si le musicType est vide
    if (empty(trim($form->musicType))) {
        $messages['musicType'] = "musicType vide";
    }    // On check si le yearOfCreation est vide
    if (empty(trim($form->yearOfCreation))) {
        $messages['yearOfCreation'] = "yearOfCreation vide";
    }    // On check si le textPresentation est vide
    if (empty(trim($form->textPresentation))) {
        $messages['textPresentation'] = "textPresentation vide";
    }    // On check si le scenicExperiences est vide
    if (empty(trim($form->scenicExperiences))) {
        $messages['scenicExperiences'] = "scenicExperiences vide";
    }    // On check si le website est vide
    if (empty(trim($form->website))) {
        $messages['website'] = "website vide";
    }

        // On check si le soundcloud n'est pas vide
    if (!empty(trim($form->soundcloud))) {

    }
    // On check si le youtube n'est pas vide
    if (!empty(trim($form->youtube))) {

    }

    // On check si le memberNumber est vide
    if (empty(trim($form->memberNumber))) {
        $messages['memberNumber'] = "memberNumber vide";
    }

    // DEBUT GERER PARTIE MEMBRES MULTIPLES





    // FIN GERER PARTIE MEMBRES MULTIPLES




    // DEBUT GERER PARTIE FICHIERS MULTIPLES





    // FIN GERER PARTIE FICHIERS MULTIPLES







    $departements = $db->query("SELECT * FROM departement");
    $departements = $departements->fetchAll();
    Flight::render("candidature.tpl", array("departements" => $departements,"valeurs" => $_POST, "messages" => $messages));
});

Flight::route('GET /profil', function(){

    Flight::render("profil.tpl", array());

});

Flight::route('GET /logout', function(){

    session_destroy();
    Flight::redirect("/");

});

?>