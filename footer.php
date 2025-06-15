<footer class="footer">
    <div class="footer-container">
        <div class="footer-menu">
            <nav aria-labelledby="footer-navigation-heading">
                <h2 id="footer-navigation-heading" class="hidden">Navigation de pied de page</h2>
                <?php
                if (function_exists('pll_current_language')) {
                    $lang = pll_current_language();

                    $menu_name = ($lang === 'en') ? 'footer-En' : 'footer';

                    wp_nav_menu(array(
                        'menu' => $menu_name,
                        'container' => false,
                        'menu_class' => 'footer-columns',
                    ));
                }
                ?>
            </nav>
        </div>
    </div>
</footer>
