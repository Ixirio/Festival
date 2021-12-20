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
    // Récupération des données du formulaire rempli par l'utilisateur.
    $form = Flight::request()->data;

    $db = flight::get("maBase");

    $messages = array();
    // Préparation de la requete pour tester si l'email est déja dans la base
    $email = $db->prepare("SELECT mail FROM users WHERE mail = :mail");
    // Préparation de la requete pour tester si le nom d'utilisateur est déja dans la base
    $name = $db->prepare("SELECT name FROM users WHERE name = :name");
    // Début des tests du formulaire d'inscription pour chaque champ, s'il est vide on renvoie un message d'erreur.
    $registerUser = $db->prepare("INSERT INTO users VALUES(:name, :mail, :pass, 1)");

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
        $_SESSION['utilisateur'] = array("pseudo" => $_POST['name'], "email" => $_POST['mail'], "admin" => false);
        Flight::redirect("/");
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

            $messages['password'] = "Identifiant ou mot de passe invalide";
        }
    }

    if (isset($requete['name'])) {
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
    }
    // Si le nom d'utilisateur est "root", l'utilisateur sera défini comme administrateur sur le site.
    // On avait des doutes, mais c'est sûr de procéder ainsi :
    // https://stackoverflow.com/questions/1181105/how-safe-are-php-session-variables
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

    // Début test pour savoir si une candidature a déja été déposée par cet utilisateur.

    $testForm = $db->prepare("SELECT * FROM candidature WHERE ID_CANDIDATURE = :id");

    $testForm->execute(array(":id" => $_SESSION['utilisateur']['pseudo']));

    if ($testForm->rowCount() != 0 || $_SESSION['utilisateur']['pseudo'] == "root") {
        Flight::redirect('/showCandidature');
    }

    $departements = $db->query("SELECT * FROM departement");
    $departements = $departements->fetchAll();

    $scenes = $db->query("SELECT * FROM scene");
    $scenes = $scenes->fetchAll();

    Flight::render("candidature.tpl", array("scenes" => $scenes, "departements" => $departements));

});
// DÉBUT DU FORMULAIRE DE CANDIDATURE
Flight::route('POST /candidature', function () {

    $db = flight::get("maBase");
    $form = Flight::request()->data;
    $messages = array();

    $toAdd = array();

    // Si l'utilisateur n'as pas son dossier attribué pour les fichiers, alors on lui créer.
    if (!file_exists('files/$_SESSION["utilisateur"]["pseudo"]')) {
        mkdir('files/$_SESSION["utilisateur"]["pseudo"]', 0777, true);
    }

    // On vérifie que tous les champs nécéssaires sont remplis.
    if (empty(trim($form['groupeName']))) {
        $messages['groupeName'] = "Veuillez saisir le nom du groupe";
    } else {
        $toAdd['groupeName'] = $form['groupeName'];
    }

    if (empty(trim($form['departement']))) {
        $messages['departement'] = "Veuillez entrer un département valide";
    } else {
        $toAdd['departement'] = $form['departement'];
    }
    if (empty(trim($form['sceneType']))) {
        $messages['sceneType'] = "Veuillez choisir un type de scène";
    } else {
        $toAdd['sceneType'] = $form['sceneType'];
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
        // On vérifie que le nombre entré fait bien 5 caractères, sinon ce n'est pas un code postal.
        if (is_numeric($form['repPostCode'])) {
            if (strlen($form->repPostCode) != 5) {
                $messages['repPostCode'] = "Veuillez saisir un code postal valide";
            }
            $toAdd['repPostCode'] = (int)$form['repPostCode'];
        } else {
            $messages['repPostCode'] = "Veuillez saisir un code postal valide";
        }
    }

    if (empty(trim($form['repMail']))) {
        $messages['repMail'] = "Veuillez saisir l'adresse mail du représentant";
    } else {
        if (filter_var($form['repMail'], FILTER_VALIDATE_EMAIL)) {
            $toAdd['repMail'] = $form['repMail'];
        } else {
            $messages['repMail'] = "Mail non-valide";
        }
    }

    if (empty(trim($form['repPhone']))) {
        $messages['repPhone'] = "Veuillez saisir le numéro de téléphone du représentant";
    } else {
        // On vérifie que l'utilisateur a bien entré un nombre, afin de ne pas entrer de texte dans une valeur numérique dans la base de données.
        // On vérifie que le nombre entré fait bien 10 caractères, sinon ce n'est pas un numéro de téléphone.
        if (is_numeric($form['repPhone'])) {
            if (strlen($form->repPhone) != 10) {
                $messages['repPhone'] = "Veuillez saisir un numéro de téléphone valide";
            }
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
        if (filter_var($form['website'], FILTER_VALIDATE_URL)) {
            $toAdd['website'] = $form['website'];
        } else {
            $messages['website'] = "l'URL n'est pas valide.";
        }
    }

    if (!empty(trim($form['soundcloud']))) {
        if (filter_var($form['soundcloud'], FILTER_VALIDATE_URL)) {
            $toAdd['soundcloud'] = $form['soundcloud'];
        } else {
            $messages['soundcloud'] = "l'URL n'est pas valide.";
        }
    } else {
        $toAdd['soundcloud'] = "";
    }

    if (!empty(trim($form['youtube']))) {
        if (filter_var($form['youtube'], FILTER_VALIDATE_URL)) {
            $toAdd['youtube'] = $form['youtube'];
        } else {
            $messages['youtube'] = "l'URL n'est pas valide.";
        }
    } else {
        $toAdd['youtube'] = "";
    }

    // DEBUT GÉRER PARTIE MEMBRES MULTIPLES

    if (empty(trim($form['memberNumber']))) {
        $messages['memberNumber'] = 'memberNumber vide';
    } else {
        if (is_numeric($form['memberNumber'])) {
            $toAdd['memberNumber'] = (int)$form['memberNumber'];
        } else {
            $messages['memberNumber'] = "Il faut fournir un nombre.";
        }
    }

    // On initialise dans notre tableau des éléments à ajouter dans la BDD, les valeurs des 8 membres.
    // Si les membres n'existent pas, la base sera remplie par un champ vide.
    // Il est tout de même impératif de les initialiser.
    for ($i = 1; $i <= 8; $i++) {
        $toAdd['memberName' . $i] = "";
        $toAdd['memberFName' . $i] = "";
        $toAdd['memberInstrument' . $i] = "";
    }

    // Boucle allant de 1 à (nombre de Membres choisi dans le select).
    // Permet de faire la vérification des membres sans écrire le code spécifique à chaque fois.
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

    // Ici on gère la vérification des fichiers.
    // Premièrement, on vérifie si le fichier est vide et s'il n'y a pas eu d'erreurs.
    // Ensuite, on teste si la fonction "move_uploaded_file" renvoie vrai, si c'est le cas, c'est que le fichier a bien
    // été déplacé sur le serveur.
    // Les noms ont un début aléatoire, puis sont traités pour éviter les noms problématiques.
    if ((isset($_FILES['audio1']) && $_FILES["audio1"]["error"] <= 0) && move_uploaded_file($_FILES['audio1']['tmp_name'],

            'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['audio1']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio1']['name']))) {

        // Une fois les tests réussi, le fichier est sur le serveur. Il faut maintenant vérifier s'il est bien ce qu'il prétend être.
        // Il suffit de modifier un fichier en mettant ".mp3" pour berner un navigateur.
        // Si le test est passé, le lien vers le fichier sera ajouté à la BDD

        $fileLink = 'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['audio1']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio1']['name']);
        if (mime_content_type($fileLink) == "audio/mpeg") {
            $toAdd['audio1'] = $fileLink;
        } else {
            $messages['audio1'] = "Le fichier n'est pas un .mp3";
        }
    } else {
        $messages['audio1'] = "Le fichier n'est pas valide";
    }
    // Le code suivant est redondant, il n'est donc pas nécéssaire de le commenter
    if ((isset($_FILES['audio2']) && $_FILES["audio2"]["error"] <= 0) && move_uploaded_file($_FILES['audio2']['tmp_name'],

            'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['audio2']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio2']['name']))) {
        $fileLink = 'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['audio2']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio2']['name']);
        if (mime_content_type($fileLink) == "audio/mpeg") {
            $toAdd['audio2'] = $fileLink;
        } else {
            $messages['audio2'] = "Le fichier n'est pas un .mp3";
        }
    } else {
        $messages['audio2'] = "Le fichier n'est pas valide";
    }

    if ((isset($_FILES['audio3']) && $_FILES["audio3"]["error"] <= 0) && move_uploaded_file($_FILES['audio3']['tmp_name'],

            'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['audio3']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio3']['name']))) {
        $fileLink = 'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['audio3']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['audio3']['name']);
        if (mime_content_type($fileLink) == "audio/mpeg") {
            $toAdd['audio3'] = $fileLink;
        } else {
            $messages['audio3'] = "Le fichier n'est pas un .mp3";
        }
    } else {
        $messages['audio3'] = "Le fichier n'est pas valide";
    }
    // C'est exactement le même principe que pour les autres, sauf que si aucun fichier n'est fourni, on met juste "null" dans la BDD.
    if ((isset($_FILES['dossierPresse']) && $_FILES["dossierPresse"]["error"] <= 0) && move_uploaded_file($_FILES['dossierPresse']['tmp_name'],

            'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['dossierPresse']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['dossierPresse']['name']))) {
        $fileLink = 'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['dossierPresse']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['dossierPresse']['name']);
        if (mime_content_type($fileLink) == "application/pdf") {
            $toAdd['dossierPresse'] = $fileLink;
        } else {
            $messages['dossierPresse'] = "Le fichier n'est pas un .pdf";
        }
    } else {
        $toAdd['dossierPresse'] = "";
    }

    // VÉRIFICATION PHOTO 1
    // La différence ici est la vérification du DPI. On n'accepte que jpg/png. En fonction, on va charger l'image dans une variable,
    // Puis on récupère sa résolution et on compare.
    if ((isset($_FILES['photo1']) && $_FILES["photo1"]["error"] <= 0) && move_uploaded_file($_FILES['photo1']['tmp_name'],

            'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['photo1']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['photo1']['name']))) {
        $fileLink = 'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['photo1']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['photo1']['name']);

        if (mime_content_type($fileLink) == "image/png") {
            $image = imagecreatefrompng($fileLink);
            $res = imageresolution($image);
            if ($res[0] > 300 && $res[1] > 300) {
                $toAdd['photo1'] = $fileLink;
            } else {
                $messages['photo1'] = "DPI inférieur à 300";
            }

        } else if (mime_content_type($fileLink) == "image/jpeg") {
            $image = imagecreatefromjpeg($fileLink);
            $res = imageresolution($image);
            if ($res[0] > 300 && $res[1] > 300) {
                $toAdd['photo1'] = $fileLink;
            } else {
                $messages['photo1'] = "DPI inférieur à 300";
            }
        } else {
            $messages['photo1'] = "Le fichier n'est pas un .png ou .jpg";
        }

    } else {
        $messages['photo1'] = "Le fichier n'est pas valide";
    }

    // VÉRIFICATION PHOTO 2
    if ((isset($_FILES['photo2']) && $_FILES["photo2"]["error"] <= 0) && move_uploaded_file($_FILES['photo2']['tmp_name'],

            'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['photo2']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['photo2']['name']))) {
        $fileLink = 'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['photo2']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['photo2']['name']);

        if (mime_content_type($fileLink) == "image/png") {
            $image = imagecreatefrompng($fileLink);
            $res = imageresolution($image);
            if ($res[0] > 300 && $res[1] > 300) {
                $toAdd['photo2'] = $fileLink;
            } else {
                $messages['photo2'] = "DPI inférieur à 300";
            }

        } else if (mime_content_type($fileLink) == "image/jpeg") {
            $image = imagecreatefromjpeg($fileLink);
            $res = imageresolution($image);
            if ($res[0] > 300 && $res[1] > 300) {
                $toAdd['photo2'] = $fileLink;
            } else {
                $messages['photo2'] = "DPI inférieur à 300";
            }
        } else {
            $messages['photo2'] = "Le fichier n'est pas un .png ou .jpg";
        }

    } else {
        $messages['photo2'] = "Le fichier n'est pas valide";
    }

    // VÉRIFICATION PDF FICHE TECHNIQUE
    if ((isset($_FILES['ficheTechnique']) && $_FILES["ficheTechnique"]["error"] <= 0) && move_uploaded_file($_FILES['ficheTechnique']['tmp_name'],

            'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['ficheTechnique']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['ficheTechnique']['name']))) {
        $fileLink = 'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['ficheTechnique']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['ficheTechnique']['name']);
        if (mime_content_type($fileLink) == "application/pdf") {
            $toAdd['ficheTechnique'] = $fileLink;
        } else {
            $messages['ficheTechnique'] = "Le fichier n'est pas un .pdf";
        }
    } else {
        $messages['ficheTechnique'] = "Le fichier n'est pas valide";
    }

    // VÉRIFICATION PDF SACEM
    if ((isset($_FILES['sacemPdf']) && $_FILES["sacemPdf"]["error"] <= 0) && move_uploaded_file($_FILES['sacemPdf']['tmp_name'],

            'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['sacemPdf']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['sacemPdf']['name']))) {
        $fileLink = 'files/$_SESSION["utilisateur"]["pseudo"]' . basename($_FILES['sacemPdf']['tmp_name']) . "_" . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_FILES['sacemPdf']['name']);
        if (mime_content_type($fileLink) == "application/pdf") {
            $toAdd['sacemPdf'] = $fileLink;
        } else {
            $messages['sacemPdf'] = "Le fichier n'est pas un .pdf";
        }
    } else {
        $messages['sacemPdf'] = "Le fichier n'est pas valide";
    }


    // VÉRIFICATION CHECKBOX STATUT ASSOCIATIF
    if (isset($_POST['statutAssociatif'])) {
        $toAdd['statutAssociatif'] = 1;
    } else {
        $toAdd['statutAssociatif'] = 0;
    }
    // VÉRIFICATION CHECKBOX SACEM

    if (isset($_POST['sacem'])) {
        $toAdd['sacem'] = 1;
    } else {
        $toAdd['sacem'] = 0;
    }
    // VÉRIFICATION CHECKBOX PRODUCTEUR

    if (isset($_POST['producer'])) {
        $toAdd['producer'] = 1;
    } else {
        $toAdd['producer'] = 0;
    }

    // On ajoute la clé primaire de la table, qui est le pseudo de la personne ayant rempli le formulaire.
    $toAdd['idCandidature'] = $_SESSION['utilisateur']['pseudo'];


    // FIN GERER PARTIE FICHIERS MULTIPLES

    // On a besoin de charger la liste des départements dans un select, ainsi que les scènes.
    // Il faut donc les récupérer dans la BDD, puis les passer au template.
    $departements = $db->query("SELECT * FROM departement");
    $departements = $departements->fetchAll();

    $scenes = $db->query("SELECT * FROM scene");
    $scenes = $scenes->fetchAll();

    // Si on a une erreur, on recharge la page et on affiche les erreurs.
    // Sinon, on prépare la requête SQL, rien de compliqué c'est juste très long.
    if (count($messages) > 0) {
        Flight::render("candidature.tpl", array("scenes" => $scenes, "departements" => $departements, "valeurs" => $_POST, "messages" => $messages));
    } else {
        $addCandidature = $db->prepare("INSERT INTO candidature VALUES(
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
                                :sacem,
                                :producer,
                                :idCandidature
                                )
                                ");

        // Puis une fois la requête préparée, on l'exécute en fournissant le contenu de la requête toAdd.
        // Avec du recul, vu qu'on fournit à la fonction execute() un tableau, il aurait pu être généré automatiquement.
        if (!$addCandidature->execute(array(':groupeName' => $toAdd['groupeName'], ':departement' => $toAdd['departement'], ':sceneType' => $toAdd['sceneType'], ':repName' => $toAdd['repName'], ':repFName' => $toAdd['repFName'], ':repAddress' => $toAdd['repAddress'], ':repPostCode' => $toAdd['repPostCode'], ':repMail' => $toAdd['repMail'], ':repPhone' => $toAdd['repPhone'], ':musicType' => $toAdd['musicType'], ':yearOfCreation' => $toAdd['yearOfCreation'], ':textPresentation' => $toAdd['textPresentation'], ':scenicExperiences' => $toAdd['scenicExperiences'], ':website' => $toAdd['website'], ':soundcloud' => $toAdd['soundcloud'], ':youtube' => $toAdd['youtube'], ':memberNumber' => $toAdd['memberNumber'], ':memberName1' => $toAdd['memberName1'], ':memberFName1' => $toAdd['memberFName1'], ':memberInstrument1' => $toAdd['memberInstrument1'], ':memberName2' => $toAdd['memberName2'], ':memberFName2' => $toAdd['memberFName2'], ':memberInstrument2' => $toAdd['memberInstrument2'], ':memberName3' => $toAdd['memberName3'], ':memberFName3' => $toAdd['memberFName3'], ':memberInstrument3' => $toAdd['memberInstrument3'], ':memberName4' => $toAdd['memberName4'], ':memberFName4' => $toAdd['memberFName4'], ':memberInstrument4' => $toAdd['memberInstrument4'], ':memberName5' => $toAdd['memberName5'], ':memberFName5' => $toAdd['memberFName5'], ':memberInstrument5' => $toAdd['memberInstrument5'], ':memberName6' => $toAdd['memberName6'], ':memberFName6' => $toAdd['memberFName6'], ':memberInstrument6' => $toAdd['memberInstrument6'], ':memberName7' => $toAdd['memberName7'], ':memberFName7' => $toAdd['memberFName7'], ':memberInstrument7' => $toAdd['memberInstrument7'], ':memberName8' => $toAdd['memberName8'], ':memberFName8' => $toAdd['memberFName8'], ':memberInstrument8' => $toAdd['memberInstrument8'], ':audio1' => $toAdd['audio1'], ':audio2' => $toAdd['audio2'], ':audio3' => $toAdd['audio3'], ':dossierPresse' => $toAdd['dossierPresse'], ':photo1' => $toAdd['photo1'], ':photo2' => $toAdd['photo2'], ':ficheTechnique' => $toAdd['ficheTechnique'], ':sacemPdf' => $toAdd['sacemPdf'], ':statutAssociatif' => $toAdd['statutAssociatif'], ':sacem' => $toAdd['sacem'], ':producer' => $toAdd['producer'], ':idCandidature' => $toAdd['idCandidature']))) {
            echo "Échec lors de l'exécution :" . var_dump($addCandidature->errorInfo());
        } else {
            Flight::redirect("/candidature");
        }

    }


});
// FIN  DU FORMULAIRE DE CANDIDATURE

Flight::route('GET /showCandidature', function () {

    if (isset($_SESSION['utilisateur'])) {


        $db = flight::get("maBase");
        $datas = $db->prepare("SELECT * FROM candidature WHERE ID_CANDIDATURE = :id");

        // On va récupérer la session de l'utilisateur connecté et l'utiliser comme id
        $id = $_SESSION['utilisateur']['pseudo'];

        // Sauf si l'utilisateur est admin. Alors on va prendre en id l'argument "id" passé en get, s'il existe et n'est pas vide.
        if ($_SESSION['utilisateur']['admin'] == 1 && isset(Flight::request()->query['id']) && !empty(Flight::request()->query['id'])) {
            $id = Flight::request()->query['id'];
        }

        $datas->execute(array(":id" => $id));
        if ($datas->rowCount() >= 1) {
            $datas = $datas->fetch();
            Flight::render("showCandidature.tpl", array("data" => $datas));
        } else {
            Flight::redirect("/");
        }

    } else {
        Flight::redirect("/");
    }
});

Flight::route('GET /listCandidatures', function () {

    if ($_SESSION['utilisateur']['admin'] == 1) {
        $db = flight::get("maBase");

        $datas = $db->query("SELECT * FROM candidature");
        if ($datas->rowCount()) {
            $datas = $datas->fetchAll();
        } else {
            $datas = array();
        }

        Flight::render("listCandidatures.tpl", array("candidatures" => $datas));
    } else {
        Flight::redirect("/");
    }

});

Flight::route('GET /deleteCandidature', function () {

    if ($_SESSION['utilisateur']['admin'] == 1 && isset(Flight::request()->query['id']) && !empty(Flight::request()->query['id'])) {
        $id = Flight::request()->query['id'];
        $db = flight::get("maBase");
        $datas = $db->prepare("DELETE FROM candidature WHERE ID_CANDIDATURE = :id ");
        $datas->execute(array(":id" => $id));


        Flight::redirect("listCandidatures");
    } else {
        Flight::redirect("/");
    }

});

Flight::route('GET /listUsers', function () {

    if ($_SESSION['utilisateur']['admin'] == 1) {
        $db = flight::get("maBase");

        $datas = $db->query("SELECT * FROM users");
        if ($datas->rowCount()) {
            $datas = $datas->fetchAll();
        } else {
            $datas = array();
        }

        Flight::render("listUsers.tpl", array("users" => $datas));

    } else {
        Flight::redirect("/");
    }

});

Flight::route('GET /logout', function () {

    $_SESSION = array();
    Flight::redirect("/");

});

// On vérifie que la personne qui tente d'accéder au fichier, est bien celle qui possède ce fichier.
Flight::route('GET /files/@user/@file', function ($user, $file) {
    if (isset($_SESSION['utilisateur']) && $user == $_SESSION['utilisateur']['pseudo']){
        Flight::redirect("/files/$user/$file");
    } else {
        Flight::redirect("/");
    }
});



// DÉBUT PARTIE API

// On récupère simplement les candidatures, on prend le nombre de lignes dans la base, puis on l'affiche au format json.

Flight::route('GET /stats/nombre-candidatures', function () {

    $db = flight::get("maBase");
    $datas = $db->query("SELECT * FROM candidature")->rowCount();

    echo "<pre>" . json_encode($datas, JSON_PRETTY_PRINT) . "</pre>";

});

// On récupère la liste des départements présent dans la table CANDIDATURE, on enlève les doublons.
// Puis pour chaque département trouvé, on va afficher toutes les candidatures associées.
Flight::route('GET /stats/candidatures-par-departement', function () {

    $db = flight::get("maBase");

    $departements = $db->query("SELECT DEPARTEMENT FROM candidature");

    if ($departements->rowCount() >= 1) {
        $departements = $departements->fetchAll();
        $departements = array_unique($departements, SORT_REGULAR);
    }

    $result = array();
    foreach ($departements as $dep) {
        $data = $db->query("SELECT * FROM candidature WHERE DEPARTEMENT = '$dep[0]'")->fetchAll();
        $result[$dep[0]] = $data;
    }
    echo "<pre>" . json_encode($result, JSON_PRETTY_PRINT) . "</pre>";

});

// On récupère l'argument passé dans la requête.
// Le code du département est passé, on doit le "traduire" en sa version "écrite". On se sert de la base "departement" pour ça.
// Ensuite, on récupère toutes les candidatures qui ont ce département, et on les affiche.

Flight::route('GET /stats/candidatures-par-departement/@dep', function ($dep) {

    $db = flight::get("maBase");
    $depName = $db->prepare("SELECT departement_nom FROM departement WHERE departement_code = :dep");

    if (!empty($depName)) {
        $depName->execute(array(":dep" => $dep));
        if ($depName->rowCount() >= 1) {
            $depName = $depName->fetchAll()[0][0];
        }
    }

    $datas = $db->prepare("SELECT * FROM candidature WHERE DEPARTEMENT = :dep");
    $datas->execute(array(":dep" => $depName));
    if ($datas->rowCount() >= 1) {
        $datas = $datas->fetchAll();
        echo "<pre>" . json_encode($datas, JSON_PRETTY_PRINT) . "</pre>";
    }
});

// On récupère toutes les candidatures qui ont un des départements composant les "Haut-de-france" puis on les affiche.

Flight::route('GET /stats/candidatures-hauts-de-france', function () {
    $db = flight::get("maBase");
    $data = $db->query("SELECT * FROM candidature WHERE 
                                DEPARTEMENT = 'Somme' or 
                                DEPARTEMENT = 'Aisne' or 
                                DEPARTEMENT = 'Nord' or 
                                DEPARTEMENT = 'Oise' or 
                                DEPARTEMENT = 'Pas-de-Calais'")->fetchAll();
    $result['Haut De France'] = $data;
    echo "<pre>" . json_encode($result, JSON_PRETTY_PRINT) . "</pre>";
});

// On récupère toutes les candidatures qui N'ONT PAS un des départements composant les "Hauts-de-france" puis on les affiche.
Flight::route('GET /stats/candidatures-hors-hauts-de-france', function () {
    $db = flight::get("maBase");
    $data = $db->query("SELECT * FROM candidature WHERE not(
                                DEPARTEMENT = 'Somme' or 
                                DEPARTEMENT = 'Aisne' or 
                                DEPARTEMENT = 'Nord' or 
                                DEPARTEMENT = 'Oise' or 
                                DEPARTEMENT = 'Pas-de-Calais')")->fetchAll();
    $result['Haut De France'] = $data;
    echo "<pre>" . json_encode($result, JSON_PRETTY_PRINT) . "</pre>";
});

// Pareil que pour les départements, mais avec la scène à la place des départements
Flight::route('GET /stats/candidatures-par-scene', function () {

    $db = flight::get("maBase");

    $scenes = $db->query("SELECT TYPE_SCENE FROM candidature");

    if ($scenes->rowCount() >= 1) {
        $scenes = $scenes->fetchAll();
        $scenes = array_unique($scenes, SORT_REGULAR);
    }

    $result = array();
    foreach ($scenes as $scene) {


        $data = $db->query("SELECT * FROM candidature WHERE TYPE_SCENE = '$scene[0]'")->fetchAll();
        $result[$scene[0]] = $data;
    }
    echo "<pre>" . json_encode($result, JSON_PRETTY_PRINT) . "</pre>";

});

// Pareil que pour les départements, mais avec la scène à la place des départements.
Flight::route('GET /stats/candidatures-par-scene/@scene', function ($scene) {

    var_dump($scene);
    if (strtolower($scene) == "acoustique" || strtolower($scene) == "folk") {
        $scene = "Acoustique/Folk";
    }

    if (strtolower($scene) == "amplifié" || strtolower($scene) == "amplifie" || strtolower($scene) == "rock") {
        $scene = "Amplifie/Rock";
    }

    var_dump($scene);
    $db = flight::get("maBase");

    $datas = $db->prepare("SELECT * FROM candidature WHERE TYPE_SCENE = :scene");
    $datas->execute(array(":scene" => $scene));
    if ($datas->rowCount() >= 1) {
        $datas = $datas->fetchAll();
        echo "<pre>" . json_encode($datas, JSON_PRETTY_PRINT) . "</pre>";
    }

});

// FIN PARTIE API
