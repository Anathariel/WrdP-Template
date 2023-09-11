<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#2E3532 " />
    <meta name="description" content="Template Wordpress pour le blog de la promo 180 chez OnlineFormaPro. Présentaion de la promo">
    <title>Promo 180</title>

    <?php
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('font-css', get_template_directory_uri() . '/asset/css/font.css');
    wp_enqueue_script('script', get_template_directory_uri() . '/asset/js/script.js');
    wp_head();
    ?>
</head>

<body>
    <header>
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/asset/media/logo/Team180-white.svg" alt="Team180 Logo" />
            </a>
        </div>
        <nav class="nav-menu">
            <?php wp_nav_menu(array(
                'theme_location' => 'main_menu'
            )) ?>
        </nav>
        <div class="burger-menu">
            <img src="<?php echo get_template_directory_uri(); ?>/asset/media/icons/menu-burger.svg" alt="Menu Burger" />
        </div>
    </header>