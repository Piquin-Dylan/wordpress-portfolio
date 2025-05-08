<?php
// Démarrer la session
session_start();

// Initialiser les variables
$email = '';

// Validation pour le nom complet
if (empty(trim($_POST['name']))) {
    $_SESSION['errors']['name'] = 'Le champ nom est requis';
}

// Validation pour l'email
if (isset($_POST['email'])) {
    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']['email'] = 'L’email doit être un email valide';
    }
    if (empty(trim($_POST['email']))) {
        $_SESSION['errors']['email'] = 'Le champ email est requis';
    }
}

// Validation pour le numéro de téléphone
if (empty(trim($_POST['phone']))) {
    $_SESSION['errors']['phone'] = 'Le champ numéro de téléphone est requis';
} elseif (
    strlen($_POST['phone']) < 9 ||
    !is_numeric(str_replace(['+', '(', ')', ' '], '', $_POST['phone']))
) {
    $_SESSION['errors']['phone'] = 'Le format du téléphone n’est pas reconnu';
}

// Validation du champ sujet
if (empty(trim($_POST['subject']))) {
    $_SESSION['errors']['subject'] = 'Le champ sujet est requis';
}

// Validation pour le champ message
if (empty(trim($_POST['area']))) {
    $_SESSION['errors']['area'] = 'Le champ message est requis';
}

// Si des erreurs existent, on redirige vers la page du formulaire
if (!empty($_SESSION['errors'])) {
    // Sauvegarder les anciennes données dans $_SESSION pour pouvoir les réutiliser après redirection
    $_SESSION['old'] = $_POST;

    // Utiliser des transients pour stocker les erreurs et anciennes données pendant 5 minutes
    set_transient('contact_form_errors', $_SESSION['errors'], 60 * 5);  // 5 minutes
    set_transient('contact_form_old', $_SESSION['old'], 60 * 5);  // 5 minutes

    // Déboguer la session avant de rediriger (si nécessaire)
    // echo '<pre>';
    // var_dump($_SESSION); // Affiche le contenu de la session
    // echo '</pre>';
    // exit; // Arrêter l'exécution pour examiner le contenu de la session

    // Redirection vers la page de contact
    header('Location: /contact');
    exit;
}

// Si aucune erreur, le formulaire est valide (exécuter ici ce que tu souhaites faire, comme envoyer un email ou enregistrer les données)
// Exemple : envoyer un email, sauvegarder dans la base de données, etc.

// Vider les transients après traitement
delete_transient('contact_form_errors');
delete_transient('contact_form_old');

// Exemple d'envoi d'email (à personnaliser selon tes besoins)
$to = 'example@example.com'; // L'email où tu veux envoyer le formulaire
$subject = 'Nouveau message du formulaire de contact';
$message = "Nom: " . $_POST['name'] . "\n";
$message .= "Email: " . $_POST['email'] . "\n";
$message .= "Téléphone: " . $_POST['phone'] . "\n";
$message .= "Sujet: " . $_POST['subject'] . "\n";
$message .= "Message: " . $_POST['area'] . "\n";
$headers = 'From: ' . $_POST['email'];

// Envoi de l'email (ne pas oublier d'activer la fonction mail sur ton serveur)
mail($to, $subject, $message, $headers);

// Redirection vers la page de remerciement ou une autre page
header('Location: /merci');
exit;

?>
