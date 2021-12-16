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

            if (!password_verify($form->password, $requete['pass'])) {
                $messages['password'] = "Identifiant ou mot de passe invalide !";
            }
        }
    }

    if ($requete['name'] == "root") {
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

    $toAdd = array();

    // On check si le groupeName est vide
    if (empty(trim($form['groupeName']))) {
        $messages['groupeName'] = "Veuillez saisir le nom du groupe";

    } else{
        $toAdd['groupeName']  = $form['groupeName'];
    }

    // On check si le departement est vide
    if (empty(trim($form['departement']))) {
        $messages['departement'] = "Veuillez entrer un département valide";
    }else{
        $toAdd['departement']  = $form['departement'];
    }
    // On check si le sceneType est vide
    if (empty(trim($form['sceneType']))) {
        $messages['sceneType'] = "Veuillez choisir un type de scène";
    }else{
        $toAdd['sceneType']  = $form['sceneType'];
    }
    // On check si le repName est vide
    if (empty(trim($form['repName']))) {
        $messages['repName'] = "Veuillez saisir le nom  du représentant";
    }else{
        $toAdd['repName']  = $form['repName'];
    }
    // On check si le repFName est vide
    if (empty(trim($form['repFName']))) {
        $messages['repFName'] = "Veuillez saisir le prénom du représentant";
    }else{
        $toAdd['repFName']  = $form['repFName'];
    }
    // On check si le repAddress est vide
    if (empty(trim($form['repAddress']))) {
        $messages['repAddress'] = "Veuillez saisir l'adresse du représentant";
    }else{
        $toAdd['repAddress']  = $form['repAddress'];
    }
    // On check si le repPostCode est vide
    if (empty(trim($form['repPostCode']))) {
        $messages['repPostCode'] = "Veuillez saisir le code postal du représentant";
    }else{
        $toAdd['repPostCode']  = (int)$form['repPostCode'];
    }
    // On check si le repMail est vide
    if (empty(trim($form['repMail']))) {
        $messages['repMail'] = "Veuillez saisir l'adresse mail du représentant";
    }else{
        $toAdd['repMail']  = $form['repMail'];
    }
    // On check si le repPhone est vide
    if (empty(trim($form['repPhone']))) {
        $messages['repPhone'] = "Veuillez saisir le numéro de téléphone du représentant";
    }else{
        $toAdd['repPhone']  = (int)$form['repPhone'];
    }

    // On check si le musicType est vide
    if (empty(trim($form['musicType']))) {
        $messages['musicType'] = "Veuillez saisir le style musical";
    } else{
        $toAdd['musicType']  = $form['musicType'];
    }
    // On check si le yearOfCreation est vide
    if (empty(trim($form['yearOfCreation']))) {
        $messages['yearOfCreation'] = "Veuillez saisir l'année de création du groupe";
    } else{
        $toAdd['yearOfCreation']  = (int)$form['yearOfCreation'];
    }
    // On check si le textPresentation est vide
    if (empty(trim($form['textPresentation']))) {
        $messages['textPresentation'] = "Veuillez saisir une présentation de votre texte";
    } else{
        $toAdd['textPresentation']  = $form['textPresentation'];
    }
    // On check si le scenicExperiences est vide
    if (empty(trim($form['scenicExperiences']))) {
        $messages['scenicExperiences'] = "Veuillez saisir votre expérience scénique";
    }else{
        $toAdd['scenicExperiences']  = $form['scenicExperiences'];
    }// On check si le website est vide
    if (empty(trim($form['website']))) {
        $messages['website'] = "Veuillez saisir votre site internet / Facebook";
    }else{
        $toAdd['website']  = $form['website'];
    }

    // On check si le soundcloud n'est pas vide
    if (!empty(trim($form['soundcloud']))) {
        $toAdd['soundcloud']  = $form['soundcloud'];
    } else {
        $toAdd['soundcloud'] = "";
    }
    // On check si le youtube n'est pas vide
    if (!empty(trim($form['youtube']))) {
        $toAdd['youtube']  = $form['youtube'];
    } else {
        $toAdd['youtube'] ="";
    }

    // DEBUT GERER PARTIE MEMBRES MULTIPLES

    // membres 1

    $toAdd['memberNumber'] = (int)$form['memberNumber'];

    for ($i = 1; $i <= 8; $i++) {
        $toAdd['memberName' . $i]  = "";
        $toAdd['memberFName' . $i]  = "";
        $toAdd['memberInstrument' . $i]  = "";
    }


    for ($i = 1; $i <= (int)$form['memberNumber']; $i++) {

        // On check si le memberName n'est pas vide
        if (empty(trim($form['memberName' . $i]))) {
            $messages['memberName' . $i] = "Veuillez saisir le prénom du membre " . $i;
        }else{
            $toAdd['memberName' . $i]  = $form['memberName' . $i];
        }
        // On check si le memberFName n'est pas vide
        if (empty(trim($form['memberFName' . $i]))) {
            $messages['memberFName' . $i] = "Veuillez saisir le nom du membre " . $i;
        }else{
            $toAdd['memberFName' . $i]  = $form['memberFName' . $i];
        }
        // On check si le memberInstrument n'est pas vide
        if (empty(trim($form['memberInstrument' . $i]))) {
            $messages['memberInstrument' . $i] = "Veuillez saisir le(s) instrument(s) du membre " . $i;
        }else{
            $toAdd['memberInstrument' . $i]  = $form['memberInstrument' . $i];
        }

    }


    //var_dump($toAdd);

    // FIN GERER PARTIE MEMBRES MULTIPLES


    // DEBUT GERER PARTIE FICHIERS MULTIPLES


    // FIN GERER PARTIE FICHIERS MULTIPLES



    $departements = $db->query("SELECT * FROM departement");
    $departements = $departements->fetchAll();


    /*
    $registerUser = $db->prepare("INSERT INTO candidature VALUES(
                               :groupeName,
                                :departement,
                                :sceneType,
                                :repName,
                                :repFName,
                                :repAddress,
                                :repPostCode,
                                :repMail,
                                :repPhone,
                                :musicType,
                                :yearOfCreation,
                                :textPresentation,
                                :scenicExperiences,
                                :website,
                                :soundcloud,
                                :youtube,
                                :memberNumber,
                                :memberName1,
                                :memberFName1,
                                :memberInstrument1,
                                :memberName2,
                                :memberFName2,
                                :memberInstrument2,
                                :memberName3,
                                :memberFName3,
                                :memberInstrument3,
                                :memberName4,
                                :memberFName4,
                                :memberInstrument4,
                                :memberName5,
                                :memberFName5,
                                :memberInstrument5,
                                :memberName6,
                                :memberFName6,
                                :memberInstrument6,
                                :memberName7,
                                :memberFName7,
                                :memberInstrument7,
                                :memberName8,
                                :memberFName8,
                                :memberInstrument8,
                                :audio1,
                                :audio2,
                                :audio3,
                                :dossierPresse,
                                :photo1,
                                :photo2,
                                :ficheTechnique,
                                :sacemPdf,
                                :statutAssociatif,
                                :inscritSacem,
                                :producteur,
                                :idCandidature
                                )
                                ");


    var_dump($registerUser->errorInfo());
    echo("<br>");

    if (!
    $registerUser->execute(array(
        ':groupeName' => $toAdd['groupeName'],
        ':departement' => $toAdd['departement'],
        ':sceneType' => $toAdd['sceneType'],
        ':repName' => $toAdd['repName'],
        ':repFName' => $toAdd['repFName'],
        ':repAddress' => $toAdd['repAddress'],
        ':repPostCode' => $toAdd['repPostCode'],
        ':repMail' => $toAdd['repMail'],
        ':repPhone' => $toAdd['repPhone'],
        ':musicType' => $toAdd['musicType'],
        ':yearOfCreation' => $toAdd['yearOfCreation'],
        ':textPresentation' => $toAdd['textPresentation'],
        ':scenicExperiences' => $toAdd['scenicExperiences'],
        ':website' => $toAdd['website'],
        ':soundcloud' => $toAdd['soundcloud'],
        ':youtube' => $toAdd['youtube'],
        ':memberNumber' => $toAdd['memberNumber'],
        ':memberName1' => $toAdd['memberName1'],
        ':memberFName1' => $toAdd['memberFName1'],
        ':memberInstrument1' => $toAdd['memberInstrument1'],
        ':memberName2' => $toAdd['memberName2'],
        ':memberFName2' => $toAdd['memberFName2'],
        ':memberInstrument2' => $toAdd['memberInstrument2'],
        ':memberName3' => $toAdd['memberName3'],
        ':memberFName3' => $toAdd['memberFName3'],
        ':memberInstrument3' => $toAdd['memberInstrument3'],
        ':memberName4' => $toAdd['memberName4'],
        ':memberFName4' => $toAdd['memberFName4'],
        ':memberInstrument4' => $toAdd['memberInstrument4'],
        ':memberName5' => $toAdd['memberName5'],
        ':memberFName5' => $toAdd['memberFName5'],
        ':memberInstrument5' => $toAdd['memberInstrument5'],
        ':memberName6' => $toAdd['memberName6'],
        ':memberFName6' => $toAdd['memberFName6'],
        ':memberInstrument6' => $toAdd['memberInstrument6'],
        ':memberName7' => $toAdd['memberName7'],
        ':memberFName7' => $toAdd['memberFName7'],
        ':memberInstrument7' => $toAdd['memberInstrument7'],
        ':memberName8' => $toAdd['memberName8'],
        ':memberFName8' => $toAdd['memberFName8'],
        ':memberInstrument8' => $toAdd['memberInstrument8'],
        ':audio1' => "test",
        ':audio2' => "test",
        ':audio3' => "test",
        ':dossierPresse' => "test",
        ':photo1' => "test",
        ':photo2' => "test",
        ':ficheTechnique' => "test",
        ':sacemPdf' => 1,
        ':statutAssociatif' => 1,
        ':inscritSacem' => 1,
        ':producteur' => 1,
        ':idCandidature' => 1
    ))) {
        echo "Échec lors de l'exécution :" . var_dump($registerUser->errorInfo());
    }

    */
    Flight::render("candidature.tpl", array("departements" => $departements, "valeurs" => $_POST, "messages" => $messages));


});

Flight::route('GET /profil', function () {

    Flight::render("profil.tpl", array());

});

Flight::route('GET /logout', function () {

    session_destroy();
    Flight::redirect("/");

});

?>

