<?php get_header();

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

$type_projet = get_field('type_projet');
$cta_site = get_field('cta_site');
$cta_github = get_field('cta_github');
$cta_figma = get_field('cta_figma');
$link_url = get_field('link');
$link_figma = get_field('link_figma');
$link_github = get_field('link_github');
?>

<main itemscope itemtype="https://schema.org/CreativeWork">
    <div class="container_max_width">
        <div class="cta">
            <a id="cta" class="btn_header" title="retourner sur la page des projets"
               href="<?php echo get_permalink(get_page_by_path('projet')); ?>"><?php _e('Revenir sur les projets', 'theme-de-test-hepl'); ?></a>

            <?php if ($type_projet === 'Web'): ?>
                <a id="cta" class="btn_header" title="Voir le site"
                   href="<?php echo esc_url($link_url); ?>"><?php echo $cta_site ?></a>
                <a id="cta" class="btn_header" title="Voir le GitHub"
                   href="<?php echo esc_url($link_github); ?>"><?php echo $cta_github ?></a>

            <?php endif; ?>
        </div>

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
                <h2 class="projet_title_single_page"><?php _e('Concept', 'theme-de-test-hepl'); ?></h2>
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
                <h2 class="projet_title_single_page"><?php _e('Réalisation', 'theme-de-test-hepl'); ?></h2>
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
                <h2 class="projet_title_single_page"><?php _e('Difficultés rencontrées', 'theme-de-test-hepl'); ?></h2>
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
                    <a id="cta" class="btn_header" title="Voir le design sur figma"
                       href="<?php echo esc_url($link_figma); ?>"><?php echo $cta_figma ?></a>
                </div>
            </section>
        <?php endif; ?>


        <section class="project_section">
            <h2 class="projet_title_single_page"><?php _e('Autres projets', 'theme-de-test-hepl'); ?></h2>
        </section>
    </div>
    <?php
    afficher_projets(3, get_the_ID());
    ?>


</main>

<?php get_footer(); ?>
