<?php
// Récupérer les erreurs et les anciennes données des transients
$errors = get_transient('contact_form_errors');
$old = get_transient('contact_form_old');

// Affichage des erreurs et des anciennes données dans le formulaire
?>

<h2>Formulaire de contact</h2>
<form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" >
    <label for="name">Nom complet</label>
    <input type="text" name="name" value="<?php echo isset($old['name']) ? esc_attr($old['name']) : ''; ?>" required>
    <?php if (!empty($errors['name'])): ?>
        <p class="error"><?php echo esc_html($errors['name']); ?></p>
    <?php endif; ?>

    <label for="email">Adresse mail</label>
    <input type="email" name="email" value="<?php echo isset($old['email']) ? esc_attr($old['email']) : ''; ?>"
           required>
    <?php if (!empty($errors['email'])): ?>
        <p class="error"><?php echo esc_html($errors['email']); ?></p>
    <?php endif; ?>

    <label for="phone">Numéro de téléphone</label>
    <input type="tel" name="phone" value="<?php echo isset($old['phone']) ? esc_attr($old['phone']) : ''; ?>" required>
    <?php if (!empty($errors['phone'])): ?>
        <p class="error"><?php echo esc_html($errors['phone']); ?></p>
    <?php endif; ?>

    <label for="subject">Sujet</label>
    <input type="text" name="subject" value="<?php echo isset($old['subject']) ? esc_attr($old['subject']) : ''; ?>"
           required>
    <?php if (!empty($errors['subject'])): ?>
        <p class="error"><?php echo esc_html($errors['subject']); ?></p>
    <?php endif; ?>

    <label for="area">Message</label>
    <textarea name="area" required><?php echo isset($old['area']) ? esc_textarea($old['area']) : ''; ?></textarea>
    <?php if (!empty($errors['area'])): ?>
        <p class="error"><?php echo esc_html($errors['area']); ?></p>
    <?php endif; ?>

    <input type="submit" value="Envoyer">
</form>

<?php
// Vider les transients après le rendu du formulaire
delete_transient('contact_form_errors');
delete_transient('contact_form_old');
?>
