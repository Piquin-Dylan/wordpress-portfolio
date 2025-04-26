<?php
/**
 * Template Name: Projet
 */
get_header();
?>

<section class="container_project">
    <h2 class="project_title">Mes projets</h2>
    <div class="navigation_project">
        <a href="#" title="Voir tous les projets">Tout</a>
        <a href="#" title="Voir les projets Web">Web</a>
        <a href="#" title="Voir les projets 3D">3D</a>
        <a href="#" title="Voir les projets Mobile">Mobile</a>
    </div>

    <?php if (have_rows('projets')) : ?>
        <div class="projects-container">
            <?php while (have_rows('projets')) : the_row();
                $image = get_sub_field('image_projet');
                $title = get_sub_field('project_name');
                $link = get_sub_field('project_link');
                ?>
                <article class="project-card">
                    <h3 class="hidden"><?php echo esc_html($title); ?></h3>
                    <?php if ($image) : ?>
                        <p class="name_project"><?php echo esc_html($title); ?></p>
                        <a href="<?php echo site_url('/single_page/?project=' . sanitize_title($title)); ?>">
                            <div class="image_project_wrapper">
                                <img
                                        src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>"
                                        width="260" height="360"
                                        class="image_project"
                                        title="<?php echo esc_attr($title); ?>">
                            </div>
                        </a>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
