<?php
/**
 * Template Name: Page single page
 */

get_header();

// Récupère le slug du projet depuis l'URL
$project_slug = isset($_GET['project']) ? sanitize_title($_GET['project']) : '';

// Récupère la page qui contient les projets
$page = get_page_by_path('single_page');
$page_id = $page ? $page->ID : null;
if ($project_slug && $page_id && have_rows('single_page', $page_id)) :
    while (have_rows('single_page', $page_id)) : the_row();
        $slug = get_sub_field('project_slug');
        if ($slug === $project_slug) :
            $title = get_sub_field('project_title');
            $description = get_sub_field('description_project');
            $concept = get_sub_field('concept');
            $image1 = get_sub_field('image_concept_1');
            $image2 = get_sub_field('image_concept_2');
            $realisation = get_sub_field('realisation');
            $image3 = get_sub_field('realisation_image_1');
            $image4 = get_sub_field('realisation_image_2');
            $image5 = get_sub_field('autre_projet_image_1');
            $image6 = get_sub_field('autre_projet_image_2');
            $image7 = get_sub_field('autre_projet_image_3');
            ?>
            <h1 class="project_name_single_page">Projet <?php echo esc_html($title); ?></h1>
            <section class="project_section">
                <h2 class="hidden">Description Projet</h2>
                <?php echo wp_kses_post($description); ?>
            </section>
            <section class="project_section">
                <h2 class="concept_title">Concept</h2>
                <?php echo wp_kses_post($concept); ?>
                <?php if ($image1) : ?>
                <div class="img_concept">
                    <img class="image_concept" src="<?php echo esc_url($image1['url']); ?>"
                         alt="<?php echo esc_attr($image1['alt']); ?>">

                    <?php endif; ?>
                    <?php if ($image2) : ?>

                    <img class="image_concept" src="<?php echo esc_url($image2['url']); ?>"
                         alt="<?php echo esc_attr($image2['alt']); ?>">
                </div>
            <?php endif; ?>
            </section>
            <section class="project_section">
                <h2 class="realisation_title">Réalisation</h2>
                <?php echo wp_kses_post($realisation) ?>
            </section>

            <section class="project_section">
                <h2 class="result">Résultat</h2>
            </section>


            <section class="project_section">
                <h2 class="other_project">D'autres projets</h2>
                <article>
                    <h3 class="hidden"><?php echo $title ?>></h3>
                    <img src="<?php echo esc_url($image5['url']) ?>" alt="<?php echo esc_attr($image5['alt']); ?>"
                </article>
                <article>
                    <h3 class="hidden">Projet site Cv</h3>
                    <img src="<?php echo esc_url($image6['url']) ?>" alt="<?php echo esc_attr($image6['alt']) ?>"
                </article>
                <article>
                    <h3 class="hidden">Projet site Client</h3>
                    <img src="<?php echo esc_url($image7['url']) ?>" alt="<?php echo esc_attr($image7['alt']) ?>"
                </article>

            </section>
            <?php break; ?>
        <?php endif;
    endwhile;
else :
    echo '<p>Projet introuvable.</p>';
endif;

get_footer();
