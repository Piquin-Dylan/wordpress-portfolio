<?php
/*wp_nav_menu(array(
    'menu' => 'footer', // Nom du menu tel qu’il apparaît dans le tableau de bord
    'container' => 'nav',
    'menu_class' => 'mon-menu',
));
*/ ?>


<footer>
    <?php
    wp_nav_menu(array(
    'menu' => 'footer', // Le nom exact du menu (pas l'emplacement)
    'container' => 'nav',
    'menu_class' => 'footer-menu',
    ));?>

</footer>
</body>
</html>