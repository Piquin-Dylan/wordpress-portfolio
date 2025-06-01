<?php

add_action('init', function () {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
});

function dw_handle_contact_form() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['errors'] = [];
    $_SESSION['old'] = $_POST;

    $email   = trim($_POST['email'] ?? '');
    $name    = trim($_POST['name'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $area    = trim($_POST['area'] ?? '');

    // Validation
    if (empty($name)) {
        $_SESSION['errors']['name'] = 'Le champ nom est requis';
    }

    if (empty($email)) {
        $_SESSION['errors']['email'] = 'Le champ email est requis';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']['email'] = 'L’email doit être valide';
    }

    $sanitized_phone = str_replace(['+', '(', ')', ' '], '', $phone);
    if (empty($phone)) {
        $_SESSION['errors']['phone'] = 'Le champ téléphone est requis';
    } elseif (strlen($sanitized_phone) < 9 || !is_numeric($sanitized_phone)) {
        $_SESSION['errors']['phone'] = 'Le format du téléphone est invalide';
    }

    if (empty($subject)) {
        $_SESSION['errors']['subject'] = 'Le champ sujet est requis';
    }

    if (empty($area)) {
        $_SESSION['errors']['area'] = 'Le champ message est requis';
    }

    // Redirection en cas d'erreurs
    if (!empty($_SESSION['errors'])) {
        wp_redirect(wp_get_referer());
        exit;
    }

    // Traitement ici si pas d'erreurs (envoi email, etc.)
    $_SESSION['success'] = 'Votre message a bien été envoyé.';
    wp_redirect(wp_get_referer());
    exit;
}
add_action('admin_post_nopriv_dw_submit_contact_form', 'dw_handle_contact_form');
add_action('admin_post_dw_submit_contact_form', 'dw_handle_contact_form');



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
function register_taxonomy_categorie_projet() {
    register_taxonomy('categorie_projet', 'projet', [
        'label' => 'Catégories Projet',
        'hierarchical' => true, // comme les catégories classiques
        'show_ui' => true,
        'show_in_rest' => true, // pour Gutenberg et API REST
        'rewrite' => ['slug' => 'categorie-projet'],
    ]);
}
add_action('init', 'register_taxonomy_categorie_projet');

add_action('init', 'register_post_type_projet');


require_once get_template_directory() . '/template-projet.php';


session_write_close();