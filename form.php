<?php
/**
 * Template Name: Page de contact
 */

session_start();
?>

<?php get_header(); ?>

<?php
if (have_posts()): while (have_posts()): the_post();

    $errors = $_SESSION['contact_form_errors'] ?? [];
    unset($_SESSION['contact_form_errors']);
    $old = $_SESSION['contact_form_old'] ?? [];
    unset($_SESSION['contact_form_old']);
    $success = $_SESSION['contact_form_success'] ?? false;
    unset($_SESSION['contact_form_success']);
    ?>

        <div class="contact__left"><?= get_the_content(); ?></div>
        <div class="contact__right">
            <?php if ($success): ?>
                <div class="contact__success">
                    <p><?= esc_html($success); ?></p>
                </div>
            <?php else: ?>
            <div class="container">
                <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="post" novalidate>
                    <input type="hidden" name="action" value="dw_submit_contact_form">
                    <section class="container_form">
                        <h2><?php _e('Contactez-moi', 'theme-de-test-hepl'); ?></h2>

                        <label for="firstname"><?php _e('Prénom', 'theme-de-test-hepl'); ?></label>
                        <input class="input_form" type="text" name="firstname" id="firstname"
                               value="<?= esc_attr($old['firstname'] ?? '') ?>"
                               placeholder="Ex: Jean" required>
                        <?php if (!empty($errors['firstname'])): ?>
                            <p class="error_validation"><?= esc_html($errors['firstname']); ?></p>
                        <?php endif; ?>

                        <label for="lastname"><?php _e('Nom', 'theme-de-test-hepl'); ?></label>
                        <input class="input_form" type="text" name="lastname" id="lastname"
                               value="<?= esc_attr($old['lastname'] ?? '') ?>"
                               placeholder="Ex: Dupont" required>
                        <?php if (!empty($errors['lastname'])): ?>
                            <p class="error_validation"><?= esc_html($errors['lastname']); ?></p>
                        <?php endif; ?>

                        <label for="email"><?php _e('Adresse mail', 'theme-de-test-hepl'); ?></label>
                        <input class="input_form" type="email" name="email" id="email"
                               value="<?= esc_attr($old['email'] ?? '') ?>"
                               placeholder="Ex: jeandupont@example.com" required>
                        <?php if (!empty($errors['email'])): ?>
                            <p class="error_validation"><?= esc_html($errors['email']); ?></p>
                        <?php endif; ?>

                        <label for="message"><?php _e('Votre Message', 'theme-de-test-hepl'); ?></label>
                        <textarea class="input_form" name="message" id="message" cols="40" rows="40"
                                  placeholder="<?php _e('Entrer votre message', 'theme-de-test-hepl'); ?>"
                                  required><?= esc_textarea($old['message'] ?? '') ?></textarea>
                        <?php if (!empty($errors['message'])): ?>
                            <p class="error_validation"><?= esc_html($errors['message']); ?></p>
                        <?php endif; ?>

                        <input class="btn_submit" type="submit" value="<?php _e('Envoyer', 'theme-de-test-hepl'); ?>">
                    </section>
                </form>
                <?php endif; ?>

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


<?php
endwhile;
else: ?>
    <p><?php _e('La page est vide.', 'theme-de-test-hepl'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
