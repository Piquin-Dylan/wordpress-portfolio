<?php
/**
 * Template Name: Page single page
 */

get_header();

// Récupère le slug du projet depuis l'URL
$project_slug = isset($_GET['project']) ? sanitize_title($_GET['project']) : '';

// Détermine la langue actuelle
$current_lang = pll_current_language();

// Choisit la bonne page en fonction de la langue
$page_slug = ($current_lang === 'fr') ? 'single_page' : 'single_page_english';
$page = get_page_by_path($page_slug);
$page_id = $page ? $page->ID : null;

// Vérifie s'il y a des projets sur la bonne page
if ($project_slug && $page_id && have_rows('single_page', $page_id)) :
    while (have_rows('single_page', $page_id)) : the_row();
        $slug = get_sub_field('project_slug');
        if ($slug === $project_slug) :
            // Récupère tous les champs du projet
            $title = get_sub_field('project_title');
            $description = get_sub_field('description_project');
            $concept = get_sub_field('concept');
            $image1 = get_sub_field('image_concept_1');
            $image2 = get_sub_field('image_concept_2');
            $realisation = get_sub_field('realisation');
            $image3 = get_sub_field('realisation_image_1');
            $image4 = get_sub_field('realisation_image_2');
            $result = get_sub_field('result');
            $resultat_image_1 = get_sub_field('resultat_image_1');
            $resultat_image_2 = get_sub_field('resultat_image_2');
            $image5 = get_sub_field('autre_projet_image_1');
            $image6 = get_sub_field('autre_projet_image_2');
            $image7 = get_sub_field('autre_projet_image_3');
            ?>
            <main itemscope itemtype="https://schema.org/CreativeWork">
                <div class="container_max_width">
                    <a title="Revenir sur la page Projet" class="back"
                       href="<?php echo get_permalink(get_page_by_path('projet')); ?>">Revenir sur les projets</a>
                    <h1 class="project_name_single_page" itemprop="name" aria-level="1" role="heading">
                    Projet <?php echo esc_html($title); ?></h1>
                <section class="project_section">
                    <h2 class="hidden" itemprop="description" aria-level="2" role="heading">Description Projet</h2>
                    <?php echo wp_kses_post($description); ?>
                </section>
                <section class="project_section">
                    <h2 class="projet_title_single_page">Concept</h2>
                    <?php echo wp_kses_post($concept); ?>
                    <?php if ($image1) : ?>
                    <div class="img_concept">
                        <img class="image_concept" src="<?php echo esc_url($image1['url']); ?>" itemprop="image"
                             alt="<?php echo esc_attr($image1['alt']); ?>"/>

                        <?php endif; ?>
                        <?php if ($image2) : ?>

                        <img class="image_concept" src="<?php echo esc_url($image2['url']); ?>" itemprop="image"
                             alt="<?php echo esc_attr($image2['alt']); ?>"/>
                    </div>
                <?php endif; ?>
                </section>
                <section class="project_section">
                    <h2 class="projet_title_single_page">Réalisation</h2>
                    <?php echo wp_kses_post($realisation); ?>
                    <?php if ($image3) : ?>
                    <div class="img_concept">
                        <img class="image_concept" src="<?php echo esc_url($image3['url']); ?>" itemprop="image"
                             alt="<?php esc_attr($image3['alt']) ?>"/>
                        <?php endif;
                        ?>


                        <?php if ($image4) : ?>
                            <img class="image_concept" src="<?php echo esc_url($image4['url']) ?>" itemprop="image"
                                 alt="<?php esc_attr($image5['alt']) ?>"/>
                        <?php endif; ?>
                    </div>
                </section>

                <section class="project_section">
                    <h2 class="projet_title_single_page">Résultat</h2>
                    <?php echo wp_kses_post($result) ?>
                    <?php if ($resultat_image_1): ?>
                    <div class="img_concept">
                        <img class="image_concept" src="<?php echo esc_url($resultat_image_1['url']) ?>"
                             itemprop="image"
                             alt="<?php esc_attr($resultat_image_1['alt']) ?>"/>
                        <?php endif;
                        ?>
                        <?php if ($resultat_image_2) : ?>
                            <img class="image_concept" src="<?php echo esc_url($resultat_image_2['url']) ?>"
                                 itemprop="image"
                                 alt="<?php esc_attr($resultat_image_2['alt']) ?>"/>

                        <?php endif; ?>
                    </div>
                </section>
                </div>


                <section class="other_project" itemprop="knowsAbout" itemscope
                         itemtype="https://schema.org/CreativeWork">
                    <div class="project-title_wrapper">
                    <h2 aria-level="2" role="heading" class="other_project_title">D'autres projets</h2>
                    </div>
                    <div class="container_card">
                        <article class="card">
                            <div class="card_1">
                                <h3 class="title_other_project" itemprop="name">Projet site portfolio</h3>
                                <a href="#" title="Allez sur le site portfolio">
                                    <img src="<?php echo esc_url($image5['url']) ?>" itemprop="image"
                                         alt="<?php echo esc_attr($image5['alt']); ?>"/>
                                </a>
                            </div>
                        </article>
                        <article class="card">
                            <div class="card_2">
                                <h3 class="title_other_project">Projet site Cv</h3>

                                <a title="Allez sur le projet site Cv"
                                   href="http://wordpress-portfolio.test/single_page/?project=site-cv">
                                    <img src="<?php echo esc_url($image6['url']) ?>" itemprop="image"
                                         alt="<?php echo esc_attr($image6['alt']) ?>"/>
                                </a>
                            </div>
                        </article>
                        <article class="card">
                            <div class="card_3">
                                <h3 class="title_other_project">Projet site Client</h3>
                                <a aria-label="Allez sur le site projet client" title="Allez sur le site projet client"
                                   href="http://wordpress-portfolio.test/single_page/?project=site-client">
                                    <img src="<?php echo esc_url($image7['url']) ?>" itemprop="image"
                                         alt="<?php echo esc_attr($image7['alt']) ?>"/>
                                </a>
                            </div>
                        </article>
                    </div>
                </section>
            </main>
            <?php break; ?>
        <?php endif;
    endwhile;
else :
    echo '<p>Projet introuvable.</p>';
endif;

get_footer();