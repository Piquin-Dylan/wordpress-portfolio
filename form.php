<?php
/**
 * Template Name: Page de contact
 */

session_start();
get_header();
?>
    <h2>Formulaire de contact</h2>
    <form action="process.php" method="post">
        <label for="name">Nom complet</label>
        <input type="text" name="name"
               value="<?php echo isset($_SESSION['old']['name']) ? htmlspecialchars($_SESSION['old']['name']) : ''; ?>"
               required>
        <?php if (!empty($_SESSION['errors']['name'])): ?>
            <p class="error"><?php echo htmlspecialchars($_SESSION['errors']['name']); ?></p>
        <?php endif; ?>

        <label for="email">Adresse mail</label>
        <input type="email" name="email"
               value="<?php echo isset($_SESSION['old']['email']) ? htmlspecialchars($_SESSION['old']['email']) : ''; ?>"
               required>
        <?php if (!empty($_SESSION['errors']['email'])): ?>
            <p class="error"><?php echo htmlspecialchars($_SESSION['errors']['email']); ?></p>
        <?php endif; ?>

        <label for="phone">Numéro de téléphone</label>
        <input type="tel" name="phone"
               value="<?php echo isset($_SESSION['old']['phone']) ? htmlspecialchars($_SESSION['old']['phone']) : ''; ?>"
               required>
        <?php if (!empty($_SESSION['errors']['phone'])): ?>
            <p class="error"><?php echo htmlspecialchars($_SESSION['errors']['phone']); ?></p>
        <?php endif; ?>

        <label for="subject">Sujet</label>
        <input type="text" name="subject"
               value="<?php echo isset($_SESSION['old']['subject']) ? htmlspecialchars($_SESSION['old']['subject']) : ''; ?>"
               required>
        <?php if (!empty($_SESSION['errors']['subject'])): ?>
            <p class="error"><?php echo htmlspecialchars($_SESSION['errors']['subject']); ?></p>
        <?php endif; ?>

        <label for="area">Message</label>
        <textarea name="area"
                  required><?php echo isset($_SESSION['old']['area']) ? htmlspecialchars($_SESSION['old']['area']) : ''; ?></textarea>
        <?php if (!empty($_SESSION['errors']['area'])): ?>
            <p class="error"><?php echo htmlspecialchars($_SESSION['errors']['area']); ?></p>
        <?php endif; ?>

        <input type="submit" value="Envoyer">
    </form>

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

    </div>
<?php get_footer(); ?>
<?php
$_SESSION['old'] = null;
$_SESSION['errors'] = null;
?>