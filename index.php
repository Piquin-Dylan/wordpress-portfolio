<?php
/**
 * Template Name: index
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
            <div class="scene">
                <div class="carousel" id="carousel">


                    <article>
                        <h3 class="hidden"><?php the_field('title_project'); ?></h3>
                        <div class="slide" style="transform: rotateY(0deg) translateZ(300px);">
                            <?php
                            $image = get_field('image_projet_1');
                            if ($image):
                                $slug = get_field('slug_1'); // assure-toi que cette variable existe
                                $link = site_url('/single_page/?project=' . sanitize_title($slug));
                                ?>
                                <a href="<?php echo esc_url($link); ?>" title="Vers la page de projet site cv">
                                    <img id="image_project_1"
                                         title="Vers la page du projet site cv"
                                         src="<?php echo esc_url($image['url']); ?>"
                                         width="260" height="360"
                                         alt="<?php echo esc_attr($image['alt']); ?>">
                                    <p class="title_project_1"><?php the_field('project_name'); ?></p>
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>


                    <article>
                        <h3 class="hidden"><?php the_field('title_project_2'); ?></h3>
                        <div class="slide" style="transform: rotateY(120deg) translateZ(300px);">
                            <?php
                            $image = get_field('image_projet_2');
                            if ($image):
                            $slug_2 = get_field('slug_2'); // assure-toi que cette variable existe
                            $link_2 = site_url('/single_page/?project=' . sanitize_title($slug_2));
                            ?>
                            <a href="<?php echo esc_url($link_2); ?>" title="Vers la page du projet site client">
                                <img title="Vers la page du projet site client" id="image_project_2"
                                     src="<?php echo esc_url($image['url']); ?>" width="260"
                                     height="360"
                                     alt="<?php echo esc_attr($image['alt']); ?>">
                                <?php endif; ?>
                                <p title="Vers le projet site Client"
                                   class="title_project_1"><?php the_field('title_project_2'); ?></p>
                            </a>
                        </div>
                    </article>

                    <article>
                        <h3 class="hidden"><?php the_field('title_project_3') ?></h3>
                        <div class="slide" style="transform: rotateY(240deg) translateZ(300px);">
                            <?php
                            $image = get_field('image_projet_3');
                            if ($image):
                            $slug_3 = get_field('slug_3'); // assure-toi que cette variable existe
                            $link_3 = site_url('/single_page/?project=' . sanitize_title($slug_3));
                            ?>
                            <a href="<?php echo esc_url($link_3); ?>" title="Vers la page du projet site client">
                                <img title="Vers la page du projet site client" id="image_project_3"
                                     src="<?php echo esc_url($image['url']); ?>" width="260"
                                     height="360"
                                     alt="<?php echo esc_attr($image['alt']); ?>">
                                <?php endif; ?>
                                <p title="Vers le projet site  Portfolio"
                                   class="title_project_3"><?php the_field('title_project_3'); ?></p></a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <button class="arrow right">▶</button>
    </main>
<?php endif; ?>
<?php get_footer(); ?>

