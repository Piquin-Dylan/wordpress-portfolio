<?php
/**
 * Template Name: Accueil
 */
?>
<?php get_header() ?>


    <section class="header">
<?php if (is_front_page()) : ?>
    <h2 class="hidden">Présentation</h2>
    <div class="Présentation__Projet">
        <div class="container_max_width_presentation">
            <span class="name"><?php the_field('first_name'); ?></span>
            <span class="job"><?php the_field('Job'); ?></span>
            <span class="presentation"><?php the_field('presentation'); ?></span>
            <a href="/exploration" class="btn_header">Exploration</a>
        </div>

    </div>

    </section>
    <main class="content">
        <div class="stars"></div>
        <button class="arrow left">◀</button>

        <section>
            <h2 class="title_project">Mes derniers Projets</h2>
            <?php afficher_slider_projets(3); ?>
        </section>

        <button class="arrow right">▶</button>
    </main>

<?php endif; ?>
<?php get_footer(); ?>

