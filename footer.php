  <?php wp_footer();?>

  <footer class="site-footer">
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-info">
            <p class="website-footer-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
            <p><?php echo get_theme_mod('footer_description', 'Footer description goes here'); ?></p>
            </div>
            <div class="footer-navigation">
                <h3>Pages</h3>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu',
                        'container' => 'div',
                        'container_class' => 'footer-menu',
                        'menu_class' => 'footer-menu-items',
                        'fallback_cb' => false
                    ));
                ?>
            </div>
        </div>
    </div>
</footer>

</body>
</html>