<?php
/**
 * Template Name: Page exploration
 */
get_header();
?>

<?php if (have_rows('parcours')) : ?>

    <?php while (have_rows('parcours')) : the_row();
        $year = get_sub_field('year');
        $description = get_sub_field('description_year');
        var_dump($year);
        ?>
                <div>
                </div>
    <?php endwhile; ?>

<?php endif; ?>
<?php
get_footer();
?>