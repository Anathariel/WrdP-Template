<footer>
    <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/asset/media/logo/Team180-white.svg" alt="Team180 Logo" />
        </a>
    </div>

    <div class="footer-span">
        <?php dynamic_sidebar('footer1'); ?>
    </div>

    <nav class="nav-menu">
        <?php wp_nav_menu(array(
            'theme_location' => 'main_menu'
        )) ?>
    </nav>
</footer>
<?php wp_footer(); ?>
</body>

</html>