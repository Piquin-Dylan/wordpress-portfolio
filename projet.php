<?php
/**
 * Template Name: Projet
 */
get_header();

$categorie_choisie = isset($_GET['categorie']) ? sanitize_text_field($_GET['categorie']) : 'tout';

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
        <a href="?categorie=tout"
           class="<?php echo ($categorie_choisie === 'tout') ? 'active' : ''; ?>"><?php _e('Tout', 'theme-de-test-hepl'); ?></a>
        <a href="?categorie=web"
           class="<?php echo ($categorie_choisie === 'web') ? 'active' : ''; ?>"><?php _e('Web', 'theme-de-test-hepl'); ?></a>
        <a href="?categorie=3d"
           class="<?php echo ($categorie_choisie === '3d') ? 'active' : ''; ?>"><?php _e('3D', 'theme-de-test-hepl'); ?></a>
        <a href="?categorie=mobile"
           class="<?php echo ($categorie_choisie === 'mobile') ? 'active' : ''; ?>"><?php _e('Mobile', 'theme-de-test-hepl'); ?></a>
    </div>
    <?php
    afficher_projets(-1); // -1 = tous les projets
?>
</section>

<?php get_footer(); ?>
