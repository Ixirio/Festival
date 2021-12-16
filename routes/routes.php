<?php
// Les fonctionnements des formulaires d'inscription, de connexion et de candidature étant assez similaires, ne seront pas commentées les actions redondantes.
Flight::route('/', function () {
    // Affichage de la page principale du site.
    Flight::render("index.tpl", array()); 

});

Flight::route('GET /register', function () {
    // Affichage du template de la page du formulaire d'enregistrement.
    Flight::render("register.tpl", array()); 


});
// DÉBUT DU FORMULAIRE D'INSCRIPTION
Flight::route('POST /register', function () {

    $form = Flight::request()->data; // Récupération des données du formulaire rempli par l'utilisateur.

    $db = flight::get("maBase");

    $messages = array();
     // Préparation de la requete pour tester si l'email est déja dans la base
    $email = $db->prepare("SELECT mail FROM users WHERE mail = :mail");
    // Préparation de la requete pour tester si le nom d'utilisateur est déja dans la base
    $name = $db->prepare("SELECT name FROM users WHERE name = :name"); 
    // Début des tests du formulaire d'inscription pour chaque champ, s'il est vide on renvoie un message d'erreur.
    $registerUser = $db->prepare("INSERT INTO users VALUES(:name, :mail, :pass)"); 

    if (empty(trim($form->name))) {
        $messages['name'] = "Veuillez saisir un nom d'utilisateur";
    } else {
        $name->execute(array(':name' => $form->name));
         // On teste si le pseudo renseigné n'est pas déjà dans la base de données.
        if ($name->rowCount() != 0) {
            $messages['name'] = "Ce pseudo est déja utilisé !";
        }
    }

    if (empty(trim($form->mail))) {
        $messages['mail'] = "Veuillez saisir une adresse mail";

    } else {

        // On teste si le mail renseigné est valide puis s'il n'est pas déjà dans la base de données.
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

        $messages['password'] = "Veuillez saisir un mot de passe";
    } else {
        // On teste si la longueur du mot de passe est conforme.
        if (strlen($form->password) < 8) { 
            $messages['password'] = "Le mot de passe doit faire plus de 8 caractères !";
        }
    }
    // Gestion des messages d'erreurs, si il y en a 1 ou plus on réaffiche la page avec les infos que l'utilisateur avait renseigné
    // Sinon, on exécute la requete qui insère les données saisies par l'utilisateur dans la table et on affiche le template success.
    if (count($messages) > 0) {
        Flight::render("register.tpl", array("valeurs" => $_POST, "messages" => $messages));
    } else {
        $registerUser->execute(array(':name' => $_POST['name'], ':mail' => $_POST['mail'], ':pass' => password_hash($_POST['password'], PASSWORD_DEFAULT)));
        var_dump($registerUser);
        Flight::render("success.tpl", array());
    }

});
// FIN DU FORMULAIRE D'INSCRIPTION

Flight::route('GET /login', function () {

    Flight::render("login.tpl", array());

});
// DÉBUT DU FORMULAIRE DE CONNEXION
Flight::route('POST /login', function () {

    $form = Flight::request()->data;
    $db = flight::get("maBase");

    $messages = array();

    $admin = "0";

    if (empty(trim($form->login))) {
        $messages['login'] = "Veuillez saisir une adresse mail";

    } else {

        if (filter_var($form->login, FILTER_VALIDATE_EMAIL)) {
            $requete = $db->prepare("SELECT * FROM users WHERE mail = :login");

        } else {
            $requete = $db->prepare("SELECT * FROM users WHERE name = :login");
        }
        $requete->execute(array(":login" => $form->login));
        $requeteRowCount = $requete->rowCount();
        $requete = $requete->fetch();
        if ($requeteRowCount < 1) {

            $messages['login'] = "Identifiant invalide";
        }
    }

    if (empty(trim($form->password))) {
        $messages['password'] = "Veuillez saisir un mot de passe";
    } else {
        if (strlen($form->password) < 8) {
            $messages['password'] = "Mot de passe invalide";
        } else {
            if (!password_verify($form->password, $requete['pass'])) {
                $messages['password'] = "Identifiant ou mot de passe invalide !";
            }
        }
    }
    // Si le nom d'utilisateur est "admin", l'utilisateur sera défini comme administrateur sur le site.
    if (isset($requete['name']) && $requete['name'] == "root") {
        $admin = "1";
    }

    if (count($messages) > 0) {
        Flight::render("login.tpl", array("valeurs" => $_POST, "messages" => $messages));
    } else {
        $_SESSION['utilisateur'] = array("pseudo" => $requete['name'], "email" => $requete['mail'], "admin" => $admin);
        Flight::redirect("/");
    }

});
// FIN DU FORMULAIRE DE CONNEXION
Flight::route('GET /candidature', function () {

    $db = flight::get("maBase");
    $departements = $db->query("SELECT * FROM departement");
    $departements = $departements->fetchAll();

    Flight::render("candidature.tpl", array("departements" => $departements));

});
// DÉBUT DU FORMULAIRE DE CANDIDATURE
Flight::route('POST /candidature', function () {

    $db = flight::get("maBase");
    $form = Flight::request()->data;
    $messages = array();

    $toAdd = array();

    // On vérifie que tous les champs nécéssaires sont remplis.
    if (empty(trim($form['groupeName']))) {
        $messages['groupeName'] = "Veuillez saisir le nom du groupe";
    } else {
        $toAdd['groupeName'] = $form['groupeName'];
    }

    if (empty(trim($form['departement']))) {
        $messages['departement'] = "Veuillez entrer un département valide";
    }else{
        $toAdd['departement']  = $form['departement'];
    }
    if (empty(trim($form['sceneType']))) {
        $messages['sceneType'] = "Veuillez choisir un type de scène";
    }else{
        $toAdd['sceneType']  = $form['sceneType'];
    }

    if (empty(trim($form['repName']))) {
        $messages['repName'] = "Veuillez saisir le nom  du représentant";
    } else {
        $toAdd['repName'] = $form['repName'];
    }

    if (empty(trim($form['repFName']))) {
        $messages['repFName'] = "Veuillez saisir le prénom du représentant";
    } else {
        $toAdd['repFName'] = $form['repFName'];
    }

    if (empty(trim($form['repAddress']))) {
        $messages['repAddress'] = "Veuillez saisir l'adresse du représentant";
    } else {
        $toAdd['repAddress'] = $form['repAddress'];
    }

    if (empty(trim($form['repPostCode']))) {
        $messages['repPostCode'] = "Veuillez saisir le code postal du représentant";
    } else {
    // On vérifie que l'utilisateur a bien entré un nombre, afin de ne pas entrer de texte dans une valeur numérique dans la base de données.
        if (is_numeric($form['repPostCode'])) {
            $toAdd['repPostCode'] = (int)$form['repPostCode'];
        } else {
            $messages['repPostCode'] = "Veuillez saisir un code postal valide";
        }
    }

    if (empty(trim($form['repMail']))) {
        $messages['repMail'] = "Veuillez saisir l'adresse mail du représentant";
    } else {
        $toAdd['repMail'] = $form['repMail'];
    }

    if (empty(trim($form['repPhone']))) {
        $messages['repPhone'] = "Veuillez saisir le numéro de téléphone du représentant";
    } else {
        if (is_numeric($form['repPhone'])) {
            $toAdd['repPhone'] = (int)$form['repPhone'];
        } else {
            $messages['repPhone'] = "Veuillez saisir un numéro de téléphone valide";
        }
    }

    if (empty(trim($form['musicType']))) {
        $messages['musicType'] = "Veuillez saisir le style musical";
    } else {
        $toAdd['musicType'] = $form['musicType'];
    }

    if (empty(trim($form['yearOfCreation']))) {
        $messages['yearOfCreation'] = "Veuillez saisir l'année de création du groupe";
    } else {
        if (is_numeric($form['yearOfCreation'])) {
            $toAdd['yearOfCreation'] = (int)$form['yearOfCreation'];
        } else {
            $messages['yearOfCreation'] = "Veuillez saisir une année valide";
        }
    }

    if (empty(trim($form['textPresentation']))) {
        $messages['textPresentation'] = "Veuillez saisir une présentation de votre texte";
    } else {
        $toAdd['textPresentation'] = $form['textPresentation'];
    }

    if (empty(trim($form['scenicExperiences']))) {
        $messages['scenicExperiences'] = "Veuillez saisir votre expérience scénique";
    } else {
        $toAdd['scenicExperiences'] = $form['scenicExperiences'];
    }
    if (empty(trim($form['website']))) {
        $messages['website'] = "Veuillez saisir votre site internet / Facebook";
    } else {
        $toAdd['website'] = $form['website'];
    }

    if (!empty(trim($form['soundcloud']))) {
        $toAdd['soundcloud'] = $form['soundcloud'];
    } else {
        $toAdd['soundcloud'] = "";
    }

    if (!empty(trim($form['youtube']))) {
        $toAdd['youtube'] = $form['youtube'];
    } else {
        $toAdd['youtube'] = "";
    }

    // DEBUT GERER PARTIE MEMBRES MULTIPLES

    // membres 1

    if (empty(trim($form['memberNumber']))) {
        $messages['memberNumber'] = 'memberNumber vide';
    } else {
        if (is_numeric($form['memberNumber'])) {
            $toAdd['memberNumber'] = (int)$form['memberNumber'];
        } else {
            $messages['memberNumber'] = "Il faut fournir un nombre.";
        }
    }

    //Commentaire Loic
    for ($i = 1; $i <= 8; $i++) {
        $toAdd['memberName' . $i] = "";
        $toAdd['memberFName' . $i] = "";
        $toAdd['memberInstrument' . $i] = "";
    }

    //Commentaire Loic
    for ($i = 1; $i <= (int)$form['memberNumber']; $i++) {

        if (empty(trim($form['memberName' . $i]))) {
            $messages['memberName' . $i] = "Veuillez saisir le prénom du membre " . $i;
        } else {
            $toAdd['memberName' . $i] = $form['memberName' . $i];
        }
        if (empty(trim($form['memberFName' . $i]))) {
            $messages['memberFName' . $i] = "Veuillez saisir le nom du membre " . $i;
        } else {
            $toAdd['memberFName' . $i] = $form['memberFName' . $i];
        }
        if (empty(trim($form['memberInstrument' . $i]))) {
            $messages['memberInstrument' . $i] = "Veuillez saisir le(s) instrument(s) du membre " . $i;
        } else {
            $toAdd['memberInstrument' . $i] = $form['memberInstrument' . $i];
        }

    }

    // FIN GERER PARTIE MEMBRES MULTIPLES


    // DEBUT GERER PARTIE FICHIERS MULTIPLES

    // Commentaire Loic (Explique en gros ce que cette partie fait genre comment tu gères la verif et tout)
    if (
        (isset($_FILES['audio1']) && $_FILES["audio1"]["error"] <= 0) &&
        move_uploaded_file($_FILES['audio1']['tmp_name'],

            'files/' .
            basename($_FILES['audio1']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio1']['name']))
    ) {
        $fileLink = 'files/' .
            basename($_FILES['audio1']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio1']['name']);
        if (mime_content_type($fileLink) == "audio/mpeg") {
            $toAdd['audio1'] = $fileLink;
        } else {
            $messages['audio1'] = "Le fichier n'est pas un .mp3";
        }
    } else {
        $messages['audio1'] = "Le fichier n'est pas valide";
    }
    // Le code suivant est redondant, il n'est donc pas nécéssaire de le commenter
    if (
        (isset($_FILES['audio2']) && $_FILES["audio2"]["error"] <= 0) &&
        move_uploaded_file($_FILES['audio2']['tmp_name'],

            'files/' .
            basename($_FILES['audio2']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio2']['name']))
    ) {
        $fileLink = 'files/' .
            basename($_FILES['audio2']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio2']['name']);
        if (mime_content_type($fileLink) == "audio/mpeg") {
            $toAdd['audio2'] = $fileLink;
        } else {
            $messages['audio2'] = "Le fichier n'est pas un .mp3";
        }
    } else {
        $messages['audio2'] = "Le fichier n'est pas valide";
    }

    if (
        (isset($_FILES['audio3']) && $_FILES["audio3"]["error"] <= 0) &&
        move_uploaded_file($_FILES['audio3']['tmp_name'],

            'files/' .
            basename($_FILES['audio3']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio3']['name']))
    ) {
        $fileLink = 'files/' .
            basename($_FILES['audio3']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio3']['name']);
        if (mime_content_type($fileLink) == "audio/mpeg") {
            $toAdd['audio3'] = $fileLink;
        } else {
            $messages['audio3'] = "Le fichier n'est pas un .mp3";
        }
    } else {
        $messages['audio3'] = "Le fichier n'est pas valide";
    }
    //Commentaire Loic (parce que facultatif)
    if (
        (isset($_FILES['dossierPresse']) && $_FILES["dossierPresse"]["error"] <= 0) &&
        move_uploaded_file($_FILES['dossierPresse']['tmp_name'],

            'files/' .
            basename($_FILES['dossierPresse']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['dossierPresse']['name']))
    ) {
        $fileLink = 'files/' .
            basename($_FILES['dossierPresse']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['dossierPresse']['name']);
        if (mime_content_type($fileLink) == "application/pdf") {
            $toAdd['dossierPresse'] = $fileLink;
        } else {
            $messages['dossierPresse'] = "Le fichier n'est pas un .pdf";
        }
    } else {
        $toAdd['dossierPresse'] = "";;
    }
    //Commentaire Loic pour les DPI
    if (
        (isset($_FILES['photo1']) && $_FILES["photo1"]["error"] <= 0) &&
        move_uploaded_file($_FILES['photo1']['tmp_name'],

            'files/' .
            basename($_FILES['photo1']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['photo1']['name']))
    ) {
        $fileLink = 'files/' .
            basename($_FILES['photo1']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['photo1']['name']);

        if (mime_content_type($fileLink) == "image/png"){
            $image = imagecreatefrompng($fileLink);
            $res = imageresolution($image);
            if ($res[0]>300 && $res[1]>300){
                $toAdd['photo1'] = $fileLink;
            } else {
                $messages['photo1'] = "DPI inférieur à 300";
            }

        }
        else if (mime_content_type($fileLink) == "image/jpeg") {
            $image = imagecreatefromjpeg($fileLink);
            $res = imageresolution($image);
            if ($res[0]>300 && $res[1]>300){
                $toAdd['photo1'] = $fileLink;
            } else {
                $messages['photo1'] = "DPI inférieur à 300";
            }
        }
        else {
            $messages['photo1'] = "Le fichier n'est pas un .png ou .jpg";
        }

    } else {
        $messages['photo1'] = "Le fichier n'est pas valide";
    }

    if (
        (isset($_FILES['photo2']) && $_FILES["photo2"]["error"] <= 0) &&
        move_uploaded_file($_FILES['photo2']['tmp_name'],

            'files/' .
            basename($_FILES['photo2']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['photo2']['name']))
    ) {
        $fileLink = 'files/' .
            basename($_FILES['photo2']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['photo2']['name']);

        if (mime_content_type($fileLink) == "image/png"){
            $image = imagecreatefrompng($fileLink);
            $res = imageresolution($image);
            if ($res[0]>300 && $res[1]>300){
                $toAdd['photo2'] = $fileLink;
            } else {
                $messages['photo2'] = "DPI inférieur à 300";
            }

        }
        else if (mime_content_type($fileLink) == "image/jpeg") {
            $image = imagecreatefromjpeg($fileLink);
            $res = imageresolution($image);
            if ($res[0]>300 && $res[1]>300){
                $toAdd['photo2'] = $fileLink;
            } else {
                $messages['photo2'] = "DPI inférieur à 300";
            }
        }
        else {
            $messages['photo2'] = "Le fichier n'est pas un .png ou .jpg";
        }

    } else {
        $messages['photo2'] = "Le fichier n'est pas valide";
    }
    // FIN GERER PARTIE FICHIERS MULTIPLES

    //Commentaire Loic Explique ton gros caca là

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

    //Commentaire Loic ptet un dernier commentaire sur les requetes
    $departements = $db->query("SELECT * FROM departement");
    $departements = $departements->fetchAll();

    $scenes = $db->query("SELECT * FROM scene");
    $scenes = $scenes->fetchAll();
    Flight::render("candidature.tpl", array("scenes" => $scenes, "departements" => $departements, "valeurs" => $_POST, "messages" => $messages));


});
// FIN  DU FORMULAIRE DE CANDIDATURE
Flight::route('GET /profil', function () {

    Flight::render("profil.tpl", array());

});

Flight::route('GET /logout', function () {

    session_destroy();
    Flight::redirect("/");

});

?>

