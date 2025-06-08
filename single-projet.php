<?php get_header();



// Récupère les champs ACF du projet courant
$title = get_the_title();
$description = get_field('description_project');
$concept = get_field('concept');
$image1 = get_field('image_concept_1');
$image2 = get_field('image_concept_2');
$realisation = get_field('realisation');
$image3 = get_field('realisation_image_1');
$image4 = get_field('realisation_image_2');
$result = get_field('result');
$resultat_image_1 = get_field('resultat_image_1');
$resultat_image_2 = get_field('resultat_image_2');
$image5 = get_field('autre_projet_image_1');
$image6 = get_field('autre_projet_image_2');
$image7 = get_field('autre_projet_image_3');
?>

<main itemscope itemtype="https://schema.org/CreativeWork">
    <div class="container_max_width">
        <a title="Revenir sur la page Projet" class="back"
        <a href="<?php echo get_permalink( get_page_by_path('projet') ); ?>">Revenir sur la page de projet</a>

        <h1 class="project_name_single_page" itemprop="name" aria-level="1" role="heading">
            Projet <?php echo esc_html($title); ?>
        </h1>

        <?php if ($description): ?>
            <section class="project_section">
                <h2 class="hidden" itemprop="description" aria-level="2" role="heading">Description Projet</h2>
                <?php echo wp_kses_post($description); ?>
            </section>
        <?php endif; ?>

        <?php if ($concept): ?>
            <section class="project_section">
                <h2 class="projet_title_single_page">Concept</h2>
                <?php echo wp_kses_post($concept); ?>
                <div class="img_concept">
                    <?php if ($image1): ?>
                        <img class="image_concept" src="<?php echo esc_url($image1['url']); ?>"
                             alt="<?php echo esc_attr($image1['alt']); ?>">
                    <?php endif; ?>
                    <?php if ($image2): ?>
                        <img class="image_concept" src="<?php echo esc_url($image2['url']); ?>"
                             alt="<?php echo esc_attr($image2['alt']); ?>">
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($realisation): ?>
            <section class="project_section">
                <h2 class="projet_title_single_page">Réalisation</h2>
                <?php echo wp_kses_post($realisation); ?>
                <div class="img_concept">
                    <?php if ($image3): ?>
                        <img class="image_concept" src="<?php echo esc_url($image3['url']); ?>"
                             alt="<?php echo esc_attr($image3['alt']); ?>">
                    <?php endif; ?>
                    <?php if ($image4): ?>
                        <img class="image_concept" src="<?php echo esc_url($image4['url']); ?>"
                             alt="<?php echo esc_attr($image4['alt']); ?>">
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($result): ?>
            <section class="project_section">
                <h2 class="projet_title_single_page">Résultat</h2>
                <?php echo wp_kses_post($result); ?>
                <div class="img_concept">
                    <?php if ($resultat_image_1): ?>
                        <img class="image_concept" src="<?php echo esc_url($resultat_image_1['url']); ?>"
                             alt="<?php echo esc_attr($resultat_image_1['alt']); ?>">
                    <?php endif; ?>
                    <?php if ($resultat_image_2): ?>
                        <img class="image_concept" src="<?php echo esc_url($resultat_image_2['url']); ?>"
                             alt="<?php echo esc_attr($resultat_image_2['alt']); ?>">
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>


    <section class="project_section">
        <h2 class="projet_title_single_page">Autres projets</h2>
    </section>
    </div>
        <?php
        // Appelle de la function pour afficher 3 projet et en excluant celui cliquer
        afficher_projets(3, get_the_ID());
        ?>



</main>

<?php get_footer(); ?>
