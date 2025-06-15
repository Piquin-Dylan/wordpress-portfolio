<!doctype html>
<html lang="<?php echo esc_attr(pll_current_language('locale') ?: 'fr'); ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="author" content="Dylan Piquin">
    <meta name="title" content="Dylan Piquin">
    <meta name="keywords"
          content="Portfolio,Dylan Piquin, Front-end, Back-end, Développeur web, étudiant à l'HEPL, Wordpress">
    <meta name="description"
          content="Portfolio de Dylan Piquin, étudiant à la hepl lors du cours de design web je dois réaliser mon portfolio">
    <meta property="og:description"
          content="Portfolio de Dylan Piquin, étudiant en infographie à la Hepl. Découvrez mes projets que j'ai réalisé durant mon cursus.">
    <meta property="og:locale" content="<?php echo esc_attr(pll_current_language('locale') ?: 'fr_BE'); ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="Dylan Piquin - Etudiant en Web à la Hepl"/>
    <meta property="og:url" content="<?php echo esc_url(home_url()); ?>"/>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/ressources/reset.css'); ?>">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/ressources/scss/main.css'); ?>">
    <script type="module" src="<?php echo esc_url(get_template_directory_uri() . '/ressources/js/src/main.js'); ?>"></script>
    <title><?php echo wp_title('·', false, 'right') . get_bloginfo('name'); ?></title>
</head>

<body>

<canvas id="my-canvas"></canvas>

<header>
    <div class="container_test">
        <h1 class="hidden"><?php echo wp_title('·', false, 'right') . get_bloginfo('name'); ?></h1>

        <nav class="main-navigation-wrapper" aria-label="Menu principal">
            <input type="checkbox" id="burger-toggle" class="burger-toggle" hidden>
            <label for="burger-toggle" class="burger" aria-label="Ouvrir/fermer le menu">
                <span></span>
                <span></span>
                <span></span>
            </label>

            <div class="main-navigation">
                <a class="logo" title="Retourner sur la page d'accueil" href="<?php echo esc_url(pll_home_url()); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>" alt="Logo de notre srg">
                </a>

                <h2 class="hidden">Navigation principale</h2>
                <?php
                wp_nav_menu([
                    'theme_location' => 'navigation',
                    'container' => false,
                    'menu_class' => 'main-menu ',
                ]);
                ?>
            </div>
        </nav>
    </div>
</header>
