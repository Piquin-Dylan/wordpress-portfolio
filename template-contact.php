<?php
/**
 * Template Name: Page de contact
 */
session_start();
get_header();
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>


    <?php
    $errors = $_SESSION['contact_form_errors'] ?? [];
    unset($_SESSION['contact_form_errors']);

    $old = $_SESSION['old'] ?? [];
    unset($_SESSION['old']);

    $success = $_SESSION['contact_form_success'] ?? false;
    unset($_SESSION['contact_form_success']);
    ?>

    <div class="container">
        <?php if ($success): ?>
            <div class="contact__success">
                <p><?= $success; ?></p>
            </div>
        <?php else: ?>
            <form action="<?= admin_url('admin-post.php'); ?>" method="POST" class="form" novalidate>
                <section class="container_form">
                    <h2 class="title_coordonnées"><?php _e('Contactez-moi', 'theme-de-test-hepl'); ?></h2>

                    <label for="firstname"
                           class="field__label"><?php _e('Prénom', 'theme-de-test-hepl'); ?></label>
                    <input type="text" name="firstname" id="firstname" class="input_form"
                           value="<?= esc_attr($old['firstname'] ?? '') ?>"
                           placeholder="<?php _e('Entrer votre prénom ex : Jean', 'theme-de-test-hepl'); ?>">
                    <?php if (isset($errors['firstname'])): ?>
                        <p class="error_validation"><?= $errors['firstname']; ?></p>
                    <?php endif; ?>

                    <label for="lastname" class="field__label"><?php _e('Nom', 'theme-de-test-hepl'); ?></label>
                    <input type="text" name="lastname" id="lastname" class="input_form"
                           value="<?= esc_attr($old['lastname'] ?? '') ?>"
                           placeholder="<?php _e('Entrer votre nom ex : Dupont', 'theme-de-test-hepl'); ?>">
                    <?php if (isset($errors['lastname'])): ?>
                        <p class="error_validation"><?= $errors['lastname']; ?></p>
                    <?php endif; ?>

                    <label for="email"><?php _e('Adresse mail', 'theme-de-test-hepl'); ?></label>
                    <input type="email" name="email" id="email" class="input_form"
                           value="<?= esc_attr($old['email'] ?? '') ?>"
                           placeholder="<?php _e('Entrer votre email ex : jean@gmail.com', 'theme-de-test-hepl'); ?>">
                    <?php if (isset($errors['email'])): ?>
                        <p class="field__error"><?= $errors['email']; ?></p>
                    <?php endif; ?>

                    <label for="message"
                           class="field__label"><?php _e('Message', 'theme-de-test-hepl'); ?></label>
                    <textarea name="message" id="message" class="field__input" cols="40"
                              rows="10"
                              placeholder="<?php _e('Entrer votre message', 'theme-de-test-hepl'); ?>"><?= esc_textarea($old['message'] ?? '') ?>
</textarea>
                    <?php if (isset($errors['message'])): ?>
                        <p class="field__error"><?= $errors['message']; ?></p>
                    <?php endif; ?>

                    <input type="hidden" name="action" value="dw_submit_contact_form">
                    <input class="btn_submit" type="submit"
                           value="<?php _e('Envoyer', 'theme-de-test-hepl'); ?>">
                </section>
            </form>
        <?php endif; ?>

        <aside>
            <h2 class="title_coordonnées"><?php _e('Mes coordonnées', 'theme-de-test-hepl'); ?></h2>
            <ul itemscope itemtype="https://schema.org/Person" class="liste_cord">
                <li itemprop="telephone" class="item_name">
                    <span class="title_coordonnées"><?php _e('Numéro de téléphone', 'theme-de-test-hepl'); ?> : </span>
                    <a aria-label="Me contacter à ce numéro : +32 (0)493 96 60 56"
                       title="Me contacter à ce numéro : +32 (0)493 96 60 56"
                       class="item"
                       href="#"><?php the_field('num_tel') ?></a>
                </li>

                <li class="item_name">
                    <span class="title_coordonnées"> <?php _e('Adresse mail', 'theme-de-test-hepl'); ?> : </span>
                    <a aria-label="Envoyez un mail à cette adresse : dylan.piquin@student.hepl.be"
                       title="Envoyez un mail à cette adresse : dylan.piquin@student.hepl.be"
                       itemprop="email"
                       class="item"
                       href="mailto:<?php the_field('adresse_mail') ?>">
                        <?php the_field('adresse_mail') ?>
                    </a>
                </li>

                <li class="item_name" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <span class="title_coordonnées">  <?php _e('Adresse postale', 'theme-de-test-hepl'); ?> : </span>
                    <span itemprop="streetAddress" class="item">
                                <?php the_field('adresse') ?>
                            </span>
                </li>
            </ul>
        </aside>
    </div>


<?php endwhile; else: ?>
    <p>La page est vide.</p>
<?php endif; ?>

<?php get_footer(); ?>
