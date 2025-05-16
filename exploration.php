<?php
/**
 * Template Name: Page exploration
 */
get_header();
?>
<?php
$presentation = get_field('presentation');
$description = get_field('description');
$image_presentation = get_field('image_presentation');
?>


    <section>
        <div class="container_about">
            <div class="container_content">
            <h2 class="title_exploration"><?php echo $presentation ?></h2>
            <div class="description_exploration"><?= $description ?></div>
            </div>
            <?php if ($image_presentation) : ?>
                <img class="image_presentation" src="<?php echo esc_url($image_presentation['url']) ?>"
                     alt="<?php echo esc_attr($image_presentation['alt']) ?>">
            <?php endif; ?>
        </div>
    </section>

    <section class="section_parcours">
        <?php if (have_rows('parcours')) : ?>
            <h2 class="parcours"><?php echo  get_field('section_parcours') ?></h2>
            <div class="parcours-container">
                <?php while (have_rows('parcours')) : the_row();
                    $year = get_sub_field('year');
                    $description_year = get_sub_field('description_year');
                    ?>
                    <article class="item_description">
                            <h3 class="year"><?php echo esc_html($year); ?></h3>
                            <p class="description_year"><?php echo esc_html(wp_strip_all_tags($description_year)); ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>

    <section class="mes_competences">
        <h2 class="compétences"><?php echo get_field('section_competences') ?></h2>
        <?php if (have_rows('competences')) : ?>
            <div class="container_competences">
                <?php while (have_rows('competences')) : the_row();
                    $name_competence = get_sub_field('name_competence');
                    $description_competence = get_sub_field('description_competence');
                    $image_competence = get_sub_field('image_competence');
                    ?>
                    <article class="item_competence">
                        <div class="top_competence">
                            <?php if ($image_competence) : ?>
                                <img class="img_competences" src="<?php echo esc_url($image_competence['url']) ?>"
                                     alt="<?php echo esc_attr($image_competence['alt']) ?>">
                            <?php endif; ?>
                            <h3 class="title_competence"><?= esc_html($name_competence) ?></h3>
                        </div>
                        <p class="description_competence"><?= $description_competence ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>


<?php
get_footer();
?>