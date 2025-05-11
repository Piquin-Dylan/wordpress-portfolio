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
                        $image = get_field('image_projet');
                        if ($image): ?>
                            <img title="Vers projet site Cv" class="image_project_1"
                                 src="<?php echo esc_url($image['url']); ?>" width="260"
                                 height="360"
                                 alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>
                        <a href="#"><p title="Vers le projet site  Cv"
                                       class="title_project_1"><?php the_field('project_name'); ?></p></a>
                    </div>
                </article>


                <article>
                    <h3 class="hidden"><?php the_field('title_project_2'); ?></h3>
                    <div class="slide" style="transform: rotateY(120deg) translateZ(300px);">
                        <?php
                        $image = get_field('image_projet');
                        if ($image): ?>
                            <img title="Vers projet site Cv" class="image_project_1"
                                 src="<?php echo esc_url($image['url']); ?>" width="260"
                                 height="360"
                                 alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>
                        <a href="#"><p title="Vers le projet site Client"
                                       class="title_project_1"><?php the_field('title_project_2'); ?></p></a>
                    </div>
                </article>

                <article>
                    <h3 class="hidden"><?php the_field('title_project_3') ?></h3>
                    <div class="slide" style="transform: rotateY(240deg) translateZ(300px);">
                        <?php
                        $image = get_field('image_project');
                        if ($image): ?>
                            <img title="Vers projet site Cv" class="image_project_1"
                                 src="<?php echo esc_url($image['url']); ?>" width="260"
                                 height="360"
                                 alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>
                        <a href="#"><p title="Vers le projet site  Portfolio"
                                       class="title_project_3"><?php the_field('title_project_3'); ?></p></a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <button class="arrow right">▶</button>
</main>
<?php endif; ?>
<footer class="test">
    <h2 class="hidden">Menu de navigation de bas de page</h2>
    <?php get_footer(); ?>

