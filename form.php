<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>
    <aside>
        <h2>Contactez-moi</h2>
    </aside>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if (have_posts()): while (have_posts()): the_post(); ?>

    <section class="contact">
        <div class="contact__left"><?= get_the_content(); ?></div>
        <div class="contact__right">
            <?php
            $errors = $_SESSION['contact_form_errors'] ?? [];
            unset($_SESSION['contact_form_errors']);
            $success = $_SESSION['contact_form_success'] ?? false;
            unset($_SESSION['contact_form_success']);

            if ($success): ?>
                <div class="contact__success">
                    <p><?= $success; ?></p>
                </div>
            <?php else: ?>
            <div class="container">

                <form action="<?= admin_url('admin-post.php'); ?>" method="POST" class="form">
                    <section class="container_form">
                        <h2 class="title_form">Contactez-moi </h2>

                        <label for="firstname" class="field__label">Prénom</label>
                        <input type="text" name="firstname" id="firstname" class="field__input">
                        <?php if (isset($errors['firstname'])): ?>
                            <p class="field__error"><?= $errors['firstname']; ?></p>
                        <?php endif; ?>


                        <label for="lastname" class="field__label">Nom</label>
                        <input type="text" name="lastname" id="lastname" class="field__input">
                        <?php if (isset($errors['lastname'])): ?>
                            <p class="field__error"><?= $errors['lastname']; ?></p>
                        <?php endif; ?>


                        <label for="email" class="field__label">Adresse mail</label>
                        <input type="email" name="email" id="email" class="field__input">
                        <?php if (isset($errors['email'])): ?>
                            <p class="field__error"><?= $errors['email']; ?></p>
                        <?php endif; ?>


                        <label for="message" class="field__label">Message</label>
                        <textarea name="message" id="message" class="field__input"></textarea>
                        <?php if (isset($errors['message'])): ?>
                            <p class="field__error"><?= $errors['message']; ?></p>
                        <?php endif; ?>

                        <?php
                        // ce champ "hidden" permet à WP d'identifier la requête et de la transmettre
                        // à notre fonction définie dans functions.php via "add_action('admin_post_[nom-action]')"
                        ?>
                        <input type="hidden" name="action" value="dw_submit_contact_form">
                        <button type="submit" class="btn">Envoyer</button>

                </form>
                <?php endif; ?>
            </div>
    </section>
    <aside>
        <h2 class="title_coordonnées">Mes coordonnées</h2>
        <ul itemscope itemtype="https://schema.org/Person" class="liste_cord">

            <li itemprop="telephone" class="item_name">Numéro de téléphone :
                <a aria-label="Me contacter à se numéros de téléphone&nbsp; : +32 (0)0493 96 60 56"
                   title="Me contacter à se numéros de téléphone&nbsp; : +32 (0)0493 96 60 56" class="item"
                   href="tel:"><?php the_field('num_tel') ?></a>
            </li>

            <li class="item_name">
                Adresse mail :
                <a aria-label="Envoyez un mail à cette adresse&nbsp;: dylan.piquin@student.hepl.be"
                   title="Envoyez un mail à cette adresse&nbsp;: dylan.piquin@student.hepl.be" itemprop="email"
                   class="item" href="mailto:<?php the_field('adresse_mail') ?>">
                    <?php the_field('adresse_mail') ?>
                </a>
            </li>

            <li class="item_name" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                Adresse postale :
                <span itemprop="streetAddress" class="item">
        <?php the_field('adresse') ?>
      </span>
            </li>

        </ul>
    </aside>

<?php
    // On ferme "la boucle" (The Loop):
endwhile;
else: ?>
    <p>La page est vide.</p>
<?php endif; ?>
<?php get_footer(); ?>