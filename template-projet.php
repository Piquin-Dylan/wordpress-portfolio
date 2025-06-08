<?php

function afficher_projets($nombre = 3, $exclude_id = null, $categorie = 'tout') {
    $args = [
        'post_type' => 'projet',
        'posts_per_page' => $nombre,
        'post__not_in' => $exclude_id ? [$exclude_id] : [],
    ];

    if ($categorie && $categorie !== 'tout') {
        $args['tax_query'] = [
            [
                'taxonomy' => 'categorie_projet',
                'field'    => 'slug',
                'terms'    => $categorie,
            ]
        ];
    }

    $query = new WP_Query($args);

    ?>

    <?php

    if ($query->have_posts()) {
        echo '<div class="projects-container">';
        while ($query->have_posts()) {
            $query->the_post();

            $image = get_field('image_projet');
            $title = get_the_title();
            ?>

                    <article class="project-card">
                        <H3 class="hidden"><?php echo $title ?></H3>
                <a href="<?php the_permalink(); ?>">
                    <?php if ($image): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                             class="image_project" title="Aller sur la page du projet <?php echo esc_attr($title); ?>"/>
                    <?php endif; ?>
                </a>
                <p class="name_project"><?php echo esc_html($title); ?></p>
            </article>
            <?php
        }
        echo '</div>';

        wp_reset_postdata();
    } else {
        echo '<p>Aucun projet trouvé.</p>';
    }
}
