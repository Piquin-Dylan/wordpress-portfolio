<?php

session_start();

/*
 * Valider les deux champs
 */
$email = '';

if (array_key_exists('email', $_REQUEST)) {
    $email = trim($_REQUEST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']['email'] = 'L’email doit être un email';
    }
} else {
    $_SESSION['errors']['email'] = 'L’email est requis';
}
if (array_key_exists('phone', $_REQUEST) &&
    (
        strlen($_REQUEST['phone']) < 9 ||
        !is_numeric(str_replace(['+', '(', ')', ' '], '', $_REQUEST['phone']))
    )) {
    $_SESSION['errors']['phone'] = 'Le format du téléphone n’est pas reconnu';
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
