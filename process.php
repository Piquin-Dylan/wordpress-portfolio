<?php

session_start();

/*
 * Valider les deux champs
 */
$email = '';
//Validation pour le nom complet
if (empty(trim($_POST['name']))) {
    $_SESSION['errors']['name'] = 'Le champs nom est requis';
}

//Validation pour l'email
if (array_key_exists('email', $_REQUEST)) {
    $email = trim($_REQUEST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']['email'] = 'L’email doit être un email valide';
    }
    if (empty(trim($_POST['email']))) {
        $_SESSION['errors']['email'] = 'Le champs email est requis';
    }
}

//Validation pour le numéros de téléphone
if (empty(trim($_POST['phone']))) {
    $_SESSION['errors']['phone'] = 'Le champs numéro de téléphone est requis';
} elseif (
    strlen($_POST['phone']) < 9 ||
    !is_numeric(str_replace(['+', '(', ')', ' '], '', $_POST['phone']))
) {
    $_SESSION['errors']['phone'] = 'Le format du téléphone n’est pas reconnu';
}

//Validation du champs  sujet
if (empty(trim($_POST['subject']))) {
    $_SESSION['errors']['subject'] = 'Le champs sujet est requis';
}


//Validation pour le champs message

if (empty(trim($_POST['area']))){
    $_SESSION['errors']['area'] = 'Le champs message est requis';
}

/*
* S’il y a des erreurs, on redirige vers la page du formulaire, en mémorisant le temps d'une requête les erreurs et les anciennes données
*/
{
    if (isset($_SESSION['errors'])) {
        $_SESSION['old'] = $_REQUEST;
        header('Location: /contact');
        exit;
    }
}


?>
