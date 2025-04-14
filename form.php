<?php
/**
 * Template Name: Page de contact
 */
get_header();
?>

<div class="container">
    <form action="#" method="post">
        <section class="container_form">
            <h2 class="title_form">Contactez-moi </h2>
            <label for="name">Nom complet</label>
            <input class="input_form" type="text" name="name" id="name" placeholder="Ex: Jean Dupont" required>
            <label for="email">Adresse mail</label>
            <input class="input_form" type="email" name="email" id="email" placeholder=" Ex: jeandupont@example.com"
                   required>
            <label for="tel">Numéros de téléphone</label>
            <input class="input_form" type="tel" name="tel" id="tel" placeholder="+ 32 451 20 67 90 " required>
            <label for="subject">Sujet</label>
            <input class="input_form" type="text" id="subject" name="subject" placeholder="Ex: Sujet du mail" required>
            <label for="area">Votre message</label>
            <textarea name="area" id="area" cols="30" rows="10" placeholder="Ex: Entre votre message"
                      required></textarea>

            <input type="button" value="Envoyer">
        </section>
    </form>
    <aside>
        <h2 class="title_coordonnées">Mes coordonnées</h2>
        <ul class="liste_cord">
            <li>
                Numéros de téléphone
                <a class="item" href="#"><?php the_field('num_tel') ?></a>
            </li>
            <li>Adresse mail
                <a class="item" href="#"><?php the_field('adresse_mail') ?></a>
            </li>
            <li>Adresse Postale
                <a class="item" href="#"><?php the_field('adresse') ?></a>
            </li>
        </ul>
    </aside>
</div>

<?php get_footer(); ?>
