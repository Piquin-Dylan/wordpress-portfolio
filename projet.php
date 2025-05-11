<?php
/**
 * Template Name: Projet
 */
the_post_thumbnail('project-thumb');
get_header();

$categorie_choisie = isset($_GET['categorie']) ? $_GET['categorie'] : 'tout';
?>

<section class="container_project">
    <h2 class="project_title">Mes projets</h2>
    <div class="navigation_project">
        <a href="?categorie=tout" class="<?php echo ($categorie_choisie === 'tout') ? 'active' : ''; ?>">Tout</a>
        <a href="?categorie=Web" class="<?php echo ($categorie_choisie === 'Web') ? 'active' : ''; ?>">Web</a>
        <a href="?categorie=3D" class="<?php echo ($categorie_choisie === '3D') ? 'active' : ''; ?>">3D</a>
        <a href="?categorie=Mobile" class="<?php echo ($categorie_choisie === 'Mobile') ? 'active' : ''; ?>">Mobile</a>
    </div>

    <?php if (have_rows('projets')) : ?>
        <div class="projects-container">
            <?php while (have_rows('projets')) : the_row();
                $image = get_sub_field('image_projet');
                $title = get_sub_field('project_name');
                $link = get_sub_field('project_link');
                $categorie = get_sub_field('categorie');

                // Condition pour afficher en fonction de la catégorie sélectionnée
                if ($categorie_choisie === 'tout' || $categorie_choisie === $categorie) :
                    ?>
                    <article class="project-card">
                        <h3 class="hidden"><?php echo esc_html($title); ?></h3>
                        <?php if ($image) : ?>
                            <div class="image_project_wrapper">
                                <p class="name_project"><?php echo esc_html($title); ?></p>
                                <a href="<?php echo site_url('/single_page/?project=' . sanitize_title($title)); ?>">
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
