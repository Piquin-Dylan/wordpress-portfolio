<?php global $categorie_choisie, $page_url;
if (have_rows('projets')) : ?>
    <div class="projects-container">
        <?php while (have_rows('projets')) : the_row();
            $image = get_sub_field('image_projet');
            $title = get_sub_field('project_name');
            $categorie = get_sub_field('categorie');

            if ($categorie_choisie === 'tout' || $categorie_choisie === $categorie) :
                ?>
                <article class="project-card">
                    <a href="<?php echo esc_url($page_url . '?project=' . sanitize_title($title)); ?>">
                        <img
                            src="<?php echo esc_url($image['url']); ?>"
                            alt="<?php echo esc_attr($image['alt']); ?>"
                            class="image_project"
                            title="Aller sur la page du projet <?php echo esc_attr($title); ?>" />
                    </a>
                    <p class="name_project"><?php echo esc_html($title); ?></p>
                </article>

            <?php
            endif;
        endwhile; ?>
    </div>
<?php endif; ?>