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
    <h2 class="project_title"><?php _e('Mes projets', 'theme-de-test-hepl'); ?></h2>
    <div class="navigation_project">
        <a href="?categorie=tout" class="<?php echo ($categorie_choisie === 'tout') ? 'active' : ''; ?>"><?php echo _e('Tout', 'theme-de-test-hepl'); ?></a>
        <a href="?categorie=Web" class="<?php echo ($categorie_choisie === 'Web') ? 'active' : ''; ?>"><?php echo _e('Web'); ?></a>
        <a href="?categorie=3D" class="<?php echo ($categorie_choisie === '3D') ? 'active' : ''; ?>"><?php echo _e('3D'); ?></a>
        <a href="?categorie=Mobile" class="<?php echo ($categorie_choisie === 'Mobile') ? 'active' : ''; ?>"><?php echo _e('Mobile'); ?></a>
    </div>
    <?php
    include(locate_template('project_loop.php'));
    ?>

</section>

<?php get_footer(); ?>

