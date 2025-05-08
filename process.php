<?php
// Démarrer la session
session_start();

// Initialiser les variables d'erreurs et de données anciennes
$errors = [];
$old = [];

// Validation pour le nom complet
if (empty(trim($_POST['name']))) {
    $errors['name'] = 'Le champ nom est requis';
}

// Validation pour l'email
if (isset($_POST['email'])) {
    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'L’email doit être un email valide';
    }
    if (empty(trim($_POST['email']))) {
        $errors['email'] = 'Le champ email est requis';
    }
}

// Validation pour le numéro de téléphone
if (empty(trim($_POST['phone']))) {
    $errors['phone'] = 'Le champ numéro de téléphone est requis';
} elseif (
    strlen($_POST['phone']) < 9 ||
    !is_numeric(str_replace(['+', '(', ')', ' '], '', $_POST['phone']))
) {
    $errors['phone'] = 'Le format du téléphone n’est pas reconnu';
}

// Validation du champ sujet
if (empty(trim($_POST['subject']))) {
    $errors['subject'] = 'Le champ sujet est requis';
}

// Validation pour le champ message
if (empty(trim($_POST['area']))) {
    $errors['area'] = 'Le champ message est requis';
}

// Si des erreurs existent, on redirige vers la page du formulaire
if (!empty($errors)) {
    // Sauvegarder les anciennes données dans $_SESSION pour pouvoir les réutiliser après redirection
    $_SESSION['old'] = $_POST;

    // Sauvegarder les erreurs dans la session
    $_SESSION['errors'] = $errors;

    // Redirection vers la page de contact
    header('Location: /contact');
    exit;
}

// Si aucune erreur, le formulaire est valide (exécuter ici ce que tu souhaites faire, comme envoyer un email ou enregistrer les données)
// Exemple : envoyer un email, sauvegarder dans la base de données, etc.

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

// Vider les erreurs et les anciennes données après traitement
unset($_SESSION['errors']);
unset($_SESSION['old']);

// Redirection vers la page de remerciement ou une autre page
header('Location: /merci');
exit;
?>
