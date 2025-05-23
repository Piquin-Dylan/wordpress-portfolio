<?php


// Vérifier si la session est active ("started") ?
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Gutenberg est le nouvel éditeur de contenu propre à Wordpress
// il ne nous intéresse pas pour l'utilisation du thème que nous
// allons créer. On va donc le désactiver :

// Disable Gutenberg on the back end.
add_filter('use_block_editor_for_post', '__return_false');
// Disable Gutenberg for widgets.
add_filter('use_widgets_block_editor', '__return_false');
// Disable default front-end styles.
add_action('wp_enqueue_scripts', function () {
    // Remove CSS on the front end.
    wp_dequeue_style('wp-block-library');
    // Remove Gutenberg theme.
    wp_dequeue_style('wp-block-library-theme');
    // Remove inline global CSS on the front end.
    wp_dequeue_style('global-styles');
}, 20);

//fonction qui permet de supprimer toute les classe des li et de la remplacer par la class qui est dans le tableau
add_filter('nav_menu_css_class', function ($classes, $item, $args) {
    return ['menu_item']; // Remplace toutes les classes par celle-ci
}, 10, 3);

//permet de supprimer les id des li
add_filter('nav_menu_item_id', function ($id, $item, $args) {
    return '';
}, 10, 3);
function mytheme_register_menus()
{
    register_nav_menus(
        array(
            'main-menu' => __('Menu Principal')
        )
    );
}

add_action('after_setup_theme', 'mytheme_register_menus');


function mortal_theme()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/ressources/scss/main.css');
}

/*add_action('wp_enqueue_scripts', 'mortal_theme');*/



register_nav_menus(array(
    'footer' => __('Menu du pied de page', 'ton-theme'),
));


function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'allow_svg_upload');

add_action('init', function () {
    remove_filter('the_content', 'wpautop');
});

/*add_action('init', 'process_contact_form');

function process_contact_form() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {

        include get_template_directory() . '/process.php';
    }
}*/
function mon_theme_load_textdomain() {
    $locale = get_locale(); // Récupère la locale active.

    // Charge le fichier de traduction en fonction de la locale
    load_textdomain('theme-de-test-hepl', get_template_directory() . '/languages/theme-de-test-hepl-' . $locale . '.mo');
}
add_action('after_setup_theme', 'mon_theme_load_textdomain');


// Désactive la barre d’admin pour tous les utilisateurs (même admins)
add_filter('show_admin_bar', '__return_false');
session_write_close();