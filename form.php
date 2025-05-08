<?php
/**
 * Template Name: Page de contact
 */

session_start();
get_header();
?>
    <h2>spannn</h2>
    <div class="container">
        <form action="<?php echo get_template_directory_uri(); ?>/process.php" method="post" novalidate>
            <section class="container_form">
                <h2 class="title_form">Contactez-moi </h2>
                <label for="name">Nom complet</label>
                <input class="input_form"
                       type="text"
                       name="name"
                       id="name"
                       value="<?php echo $_SESSION['old']['name'] ?? '' ?>"
                       placeholder="Ex: Jean Dupont"
                       required>
                <?php if (!empty($_SESSION['errors']['name'])) : ?>
                    <p class="error_validation"><?php echo $_SESSION['errors']['name']; ?></p>
                <?php endif; ?>


                <label for="email">Adresse mail</label>
                <input class="input_form"
                       type="email"
                       name="email"
                       id="email"
                       value="<?php echo $_SESSION['old']['email'] ?? ''; ?>"
                       placeholder="Ex: jeandupont@example.com"
                       required>
                <?php if (!empty($_SESSION['errors']['email'])) : ?>
                    <p class="error_validation"><?php echo $_SESSION['errors']['email']; ?></p>
                <?php endif; ?>
                <label for="phone">Numéros de téléphone</label>
                <input class="input_form"
                       type="tel"
                       name="phone"
                       id="phone"
                       value="<?php echo $_SESSION['old']['phone'] ?? ''; ?>"
                       placeholder="+ 32 451 20 67 90 "
                       required>
                <?php if (!empty($_SESSION['errors']['phone'])) : ?>
                    <p class="errors_validation"><?php echo $_SESSION['errors']['phone']; ?></p>
                <?php endif; ?>

                <label for="subject">Sujet</label>
                <input class="input_form"
                       type="text" id="subject"
                       name="subject"
                       value="<?php echo $_SESSION['old']['subject'] ?? '' ?>"
                       placeholder="Ex: Sujet du mail"
                       required>
                <?php if (!empty($_SESSION['errors']['subject']))  : ?>
                    <p class="errors_validation"><?php echo $_SESSION['errors']['subject']; ?></p>
                <?php endif; ?>
                <label for="area">Votre message</label>
                <textarea name="area"
                          id="area"
                          cols="40"
                          rows="10"
                          placeholder="Ex: Entrez votre message"
                          required><?php echo $_SESSION['old']['area'] ?? ''; ?></textarea>
                <?php if (!empty($_SESSION['errors']['area'])) : ?>
                    <p class="error_validation"><?php echo $_SESSION['errors']['area']; ?></p>
                <?php endif; ?>


                <input class="btn_submit" type="submit" value="Envoyer">
            </section>
        </form>
        <aside>
            <h2 class="title_coordonnées">Mes coordonnées</h2>
            <ul itemscope itemtype="https://schema.org/Person" class="liste_cord">

                <li itemprop="telephone" class="item_name">Numéro de téléphone :
                    <a aria-label="Me contacter à se numéros de téléphone&nbsp; : +32 (0)0493 96 60 56" title="Me contacter à se numéros de téléphone&nbsp; : +32 (0)0493 96 60 56" class="item" href="tel:"><?php the_field('num_tel') ?></a>
                </li>

                <li class="item_name">
                    Adresse mail :
                    <a aria-label="Envoyez un mail à cette adresse&nbsp;: dylan.piquin@student.hepl.be" title="Envoyez un mail à cette adresse&nbsp;: dylan.piquin@student.hepl.be" itemprop="email" class="item" href="mailto:<?php the_field('adresse_mail') ?>">
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

    </div>
<?php get_footer(); ?>
<?php
$_SESSION['old'] = null;
$_SESSION['errors'] = null;
?>