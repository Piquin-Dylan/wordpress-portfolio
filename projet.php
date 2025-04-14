<?php
/**
 * Template Name: Projet
 */
get_header();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet</title>
</head>
<body>
<h1>Page Projet</h1>

<div class="Présentation">
    <span class="name"><?php the_field('first_name'); ?></span>
</div>

<?php get_footer(); ?>
</body>
</html>
