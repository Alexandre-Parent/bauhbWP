<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        :root {
            --primary: <?php echo get_field('primary_color', 'option') ?: '#d72029'; ?>;
            --primary-dark: <?php echo adjustBrightness(get_field('primary_color', 'option') ?: '#d72029', -30); ?>;
            --primary-light: <?php echo adjustBrightness(get_field('primary_color', 'option') ?: '#d72029', 30); ?>;
            --primary-rgb: <?php echo hex2rgb(get_field('primary_color', 'option') ?: '#d72029'); ?>;
            --secondary: <?php echo get_field('secondary_color', 'option') ?: '#063970'; ?>;
            --secondary-dark: <?php echo adjustBrightness(get_field('secondary_color', 'option') ?: '#063970', -30); ?>;
            --secondary-light: <?php echo adjustBrightness(get_field('secondary_color', 'option') ?: '#063970', 30); ?>;
            --highlight: <?php echo get_field('highlight_color', 'option') ?: '#ffcc00'; ?>;
            --light: #f7f7f7;
            --dark: #121212;
            --gray: #7a7a7a;
            --white: #ffffff;
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Header Main -->
    <header class="header-main" id="headerMain">
        <div class="container">
            <div class="header-content">
                <div class="logo-container">
                    <?php
                    $logo = get_field('theme_logo', 'option');
                    if ($logo) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?: get_bloginfo('name')); ?>" class="logo">
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                            <?php bloginfo('name'); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <button class="nav-toggle" id="navToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <nav class="main-nav" id="mainNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => '',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </nav>

                <?php
                $cta_text = get_field('cta_button_text', 'option');
                $cta_url = get_field('cta_button_url', 'option');
                if ($cta_text && $cta_url) : ?>
                    <a href="<?php echo esc_url($cta_url); ?>" class="cta-button"><?php echo esc_html($cta_text); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </header>