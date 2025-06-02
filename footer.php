<footer class="footer">
    <div class="footer-container">
        <div class="footer-menu">
            <?php
            if (function_exists('pll_current_language')) {
                $lang = pll_current_language();

                if ($lang === 'fr') {
                    wp_nav_menu(array(
                        'menu' => 'footer',
                        'container' => 'nav',
                        'menu_class' => 'footer-columns',
                    ));
                } elseif ($lang === 'en') {
                    wp_nav_menu(array(
                        'menu' => 'footer-En',
                        'container' => 'nav',
                        'menu_class' => 'footer-columns',
                    ));
                }
            }
            ?>
        </div>
    </div>
    <h2 class="hidden">Menus de navigation de bas de page </h2>
</footer>