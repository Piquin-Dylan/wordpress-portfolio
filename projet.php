<?php
/**
 * Template Name: Projet
 */
the_post_thumbnail('project-thumb');
get_header();

$categorie_choisie = isset($_GET['categorie']) ? $_GET['categorie'] : 'tout';

// Obtenir la langue actuelle
$current_lang = pll_current_language();


if ($current_lang === 'fr') {
    $page_slug = 'single_page';
} else {
    $page_slug = 'single_page_english';
}

$page_obj = get_page_by_path($page_slug);
$page_url = $page_obj ? get_permalink($page_obj->ID) : '#';
?>

<section class="container_project">
    <h2 class="project_title"><?php echo pll__('Mes projets'); ?></h2>
    <div class="navigation_project">
        <a href="?categorie=tout" class="<?php echo ($categorie_choisie === 'tout') ? 'active' : ''; ?>"><?php echo pll__('Tout'); ?></a>
        <a href="?categorie=Web" class="<?php echo ($categorie_choisie === 'Web') ? 'active' : ''; ?>"><?php echo pll__('Web'); ?></a>
        <a href="?categorie=3D" class="<?php echo ($categorie_choisie === '3D') ? 'active' : ''; ?>"><?php echo pll__('3D'); ?></a>
        <a href="?categorie=Mobile" class="<?php echo ($categorie_choisie === 'Mobile') ? 'active' : ''; ?>"><?php echo pll__('Mobile'); ?></a>
    </div>

    <?php if (have_rows('projets')) : ?>
        <div class="projects-container">
            <?php while (have_rows('projets')) : the_row();
                $image = get_sub_field('image_projet');
                $title = get_sub_field('project_name');
                $categorie = get_sub_field('categorie');

                if ($categorie_choisie === 'tout' || $categorie_choisie === $categorie) :
                    ?>
                    <article class="project-card">
                        <h3 class="hidden"><?php echo esc_html($title); ?></h3>
                        <?php if ($image) : ?>
                            <div class="image_project_wrapper">
                                <p class="name_project"><?php echo esc_html($title); ?></p>
                                <a href="<?php echo esc_url($page_url . '?project=' . sanitize_title($title)); ?>">
                                    <img
                                            src="<?php echo esc_url($image['url']); ?>"
                                            alt="<?php echo esc_attr($image['alt']); ?>"
                                            class="image_project"
                                            title="<?php echo esc_attr($title); ?>"/>
                                </a>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php
                endif;
            endwhile; ?>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>

