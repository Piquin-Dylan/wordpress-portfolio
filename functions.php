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
            'main-menu' => __('Menu de navigation principal')
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
function mon_theme_load_textdomain()
{
    $locale = get_locale(); // Récupère la locale active.

    // Charge le fichier de traduction en fonction de la locale
    load_textdomain('theme-de-test-hepl', get_template_directory() . '/languages/theme-de-test-hepl-' . $locale . '.mo');
}

add_action('after_setup_theme', 'mon_theme_load_textdomain');


// Désactive la barre d’admin pour tous les utilisateurs (même admins)
add_filter('show_admin_bar', '__return_false');


//function pour ajouter un cpt projets
function register_post_type_projet()
{
    register_post_type('projet', array(
        'label' => 'Projets',
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'projets'),
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}

function register_taxonomy_categorie_projet()
{
    register_taxonomy('categorie_projet', 'projet', [
        'label' => 'Catégories Projet',
        'hierarchical' => true, // comme les catégories classiques
        'show_ui' => true,
        'show_in_rest' => true, // pour Gutenberg et API REST
        'rewrite' => ['slug' => 'categorie-projet'],
    ]);
}


add_action('init', 'register_post_type_projet');
add_action('init', 'register_taxonomy_categorie_projet');



require_once get_template_directory() . '/template-projet.php';
// Ajouter un post-type custom pour sauvegarder les messages de contact

register_post_type('contact_message', [
    'label' => 'Messages de contact',
    'description' => 'Les envois de formulaire via la page de contact',
    'menu_position' => 10,
    'menu_icon' => 'dashicons-email',
    'public' => false,
    'show_ui' => true,
    'has_archive' => false,
    'supports' => ['title','editor'],
]);

// Ajouter la fonctionnalité "POST" pour un formulaire de contact personnalisé :
add_action('admin_post_dw_submit_contact_form', 'dw_handle_contact_form');
add_action('admin_post_nopriv_dw_submit_contact_form', 'dw_handle_contact_form');

// Chargement de notre class qui va gérer ce formulaire
require_once(__DIR__.'/forms/ContactForm.php');

function dw_handle_contact_form()
{
    $form = (new \DW_Theme\Forms\ContactForm())
        ->rule('firstname', 'required')
        ->rule('lastname', 'required')
        ->rule('email', 'required')
        ->rule('email', 'email')
        ->rule('message', 'required')
        ->rule('message', 'no_test')
        ->sanitize('firstname', 'sanitize_text_field')
        ->sanitize('lastname', 'sanitize_text_field')
        ->sanitize('email', 'sanitize_text_field')
        ->sanitize('message', 'sanitize_textarea_field');

    return $form->handle($_POST);
}