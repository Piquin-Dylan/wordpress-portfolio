<?php
/**
 * Template Name: Page de contact
 */

session_start();

// Récupération des anciennes données et erreurs
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$success = $_SESSION['success'] ?? null;

// Nettoyage après usage
$_SESSION['old'] = null;
$_SESSION['errors'] = null;
$_SESSION['success'] = null;

get_header();
?>
<div class="container">
    <?php if ($success): ?>
        <p class="success_message"><?php echo $success; ?></p>
    <?php endif; ?>

    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" novalidate>
        <input type="hidden" name="action" value="dw_submit_contact_form">

        <section class="container_form">
            <h2><?php _e('Contactez-moi', 'theme-de-test-hepl'); ?></h2>

            <label for="name"><?php _e('Nom complet', 'theme-de-test-hepl'); ?></label>
            <input class="input_form" type="text" name="name" id="name"
                   value="<?php echo $old['name'] ?? '' ?>"
                   placeholder="Ex: Jean Dupont" required>
            <?php if (!empty($errors['name'])): ?>
                <p class="error_validation"><?php echo $errors['name']; ?></p>
            <?php endif; ?>

            <label for="email"><?php _e('Adresse mail', 'theme-de-test-hepl'); ?></label>
            <input class="input_form" type="email" name="email" id="email"
                   value="<?php echo $old['email'] ?? ''; ?>"
                   placeholder="Ex: jeandupont@example.com" required>
            <?php if (!empty($errors['email'])): ?>
                <p class="error_validation"><?php echo $errors['email']; ?></p>
            <?php endif; ?>

            <label for="phone"><?php _e('Numéro de téléphone', 'theme-de-test-hepl'); ?></label>
            <input class="input_form" type="tel" name="phone" id="phone"
                   value="<?php echo $old['phone'] ?? ''; ?>"
                   placeholder="+ 32 451 20 67 90" required>
            <?php if (!empty($errors['phone'])): ?>
                <p class="error_validation"><?php echo $errors['phone']; ?></p>
            <?php endif; ?>

            <label for="subject"><?php _e('Sujet', 'theme-de-test-hepl'); ?></label>
            <input class="input_form" type="text" id="subject" name="subject"
                   value="<?php echo $old['subject'] ?? '' ?>"
                   placeholder="<?php _e('Sujet du mail', 'theme-de-test-hepl'); ?>" required>
            <?php if (!empty($errors['subject'])): ?>
                <p class="error_validation"><?php echo $errors['subject']; ?></p>
            <?php endif; ?>

            <label for="area"><?php _e('Votre Message', 'theme-de-test-hepl'); ?></label>
            <textarea name="area" id="area" cols="40" rows="10"
                      placeholder="<?php _e('Entrer votre message', 'theme-de-test-hepl'); ?>" required><?php echo $old['area'] ?? ''; ?></textarea>
            <?php if (!empty($errors['area'])): ?>
                <p class="error_validation"><?php echo $errors['area']; ?></p>
            <?php endif; ?>

            <input class="btn_submit" type="submit" value="<?php _e('Envoyer', 'theme-de-test-hepl'); ?>">
        </section>
    </form>

    <aside>
        <h2 class="title_coordonnées"><?php _e('Mes coordonnées', 'theme-de-test-hepl'); ?></h2>
        <ul itemscope itemtype="https://schema.org/Person" class="liste_cord">
            <li itemprop="telephone" class="item_name"><?php _e('Numéro de téléphone', 'theme-de-test-hepl'); ?> :
                <a aria-label="Me contacter à ce numéro de téléphone : +32 (0)0493 96 60 56"
                   title="Me contacter à ce numéro de téléphone : +32 (0)0493 96 60 56"
                   class="item" href="tel:<?php the_field('num_tel'); ?>"><?php the_field('num_tel'); ?></a>
            </li>
            <li class="item_name"><?php _e('Adresse mail', 'theme-de-test-hepl'); ?>
                <a aria-label="Envoyez un mail à cette adresse : <?php the_field('adresse_mail'); ?>"
                   title="Envoyez un mail à cette adresse : <?php the_field('adresse_mail'); ?>"
                   itemprop="email" class="item"
                   href="mailto:<?php the_field('adresse_mail'); ?>"><?php the_field('adresse_mail'); ?></a>
            </li>
            <li class="item_name" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                <?php _e('Adresse postale', 'theme-de-test-hepl'); ?>
                <span itemprop="streetAddress" class="item"><?php the_field('adresse'); ?></span>
            </li>
        </ul>
    </aside>
</div>

<?php get_footer(); ?>
