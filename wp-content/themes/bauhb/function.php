<?php

/**
 * BAUHB functions and definitions
 */

// Définir les constantes du thème
define('BAUHB_VERSION', '1.0.0');
define('BAUHB_THEME_DIR', get_template_directory());
define('BAUHB_THEME_URI', get_template_directory_uri());

/**
 * Enregistrer les scripts et styles du thème
 */
function bauhb_scripts()
{
    // Styles
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0');
    wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), '2.3.4');
    wp_enqueue_style('bauhb-main', BAUHB_THEME_URI . '/assets/css/main.css', array(), BAUHB_VERSION);

    // Scripts
    wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), '2.3.4', true);
    wp_enqueue_script('bauhb-main', BAUHB_THEME_URI . '/assets/js/main.js', array('jquery'), BAUHB_VERSION, true);
}
add_action('wp_enqueue_scripts', 'bauhb_scripts');

/**
 * Fonctionnalités du thème
 */
function bauhb_setup()
{
    // Support pour les images mises en avant
    add_theme_support('post-thumbnails');

    // Support pour le titre du site
    add_theme_support('title-tag');

    // Support pour les menus
    register_nav_menus(array(
        'primary' => __('Menu principal', 'bauhb'),
        'footer'  => __('Menu pied de page', 'bauhb'),
    ));

    // Support pour HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
}
add_action('after_setup_theme', 'bauhb_setup');

/**
 * Inclure les fichiers d'aide
 */
include_once(BAUHB_THEME_DIR . '/inc/helpers.php');

/**
 * Inclure les fichiers ACF
 */
include_once(BAUHB_THEME_DIR . '/inc/acf-fields.php');

/**
 * Fonctions d'aide pour le thème
 */
function bauhb_asset_url($path)
{
    return BAUHB_THEME_URI . '/assets/' . $path;
}

/**
 * Enregistrer les emplacements de widgets
 */
function bauhb_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Sidebar', 'bauhb'),
        'id'            => 'sidebar-1',
        'description'   => __('Ajoutez des widgets ici.', 'bauhb'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 1', 'bauhb'),
        'id'            => 'footer-1',
        'description'   => __('Premier widget du pied de page.', 'bauhb'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'bauhb'),
        'id'            => 'footer-2',
        'description'   => __('Deuxième widget du pied de page.', 'bauhb'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 3', 'bauhb'),
        'id'            => 'footer-3',
        'description'   => __('Troisième widget du pied de page.', 'bauhb'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'bauhb_widgets_init');

/**
 * Types de contenu personnalisés
 */
function bauhb_register_post_types()
{
    // Type de contenu Match
    register_post_type('match', array(
        'labels' => array(
            'name' => __('Matchs', 'bauhb'),
            'singular_name' => __('Match', 'bauhb'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'matchs'),
    ));

    // Type de contenu Équipe
    register_post_type('team', array(
        'labels' => array(
            'name' => __('Équipes', 'bauhb'),
            'singular_name' => __('Équipe', 'bauhb'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'equipes'),
    ));

    // Type de contenu Produit (si on n'utilise pas WooCommerce)
    register_post_type('bauhb_product', array(
        'labels' => array(
            'name' => __('Produits', 'bauhb'),
            'singular_name' => __('Produit', 'bauhb'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-cart',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'boutique/produits'),
    ));

    // Type de contenu Partenaire
    register_post_type('sponsor', array(
        'labels' => array(
            'name' => __('Partenaires', 'bauhb'),
            'singular_name' => __('Partenaire', 'bauhb'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'partenaires'),
    ));

    // Type de contenu Vidéo
    register_post_type('video', array(
        'labels' => array(
            'name' => __('Vidéos', 'bauhb'),
            'singular_name' => __('Vidéo', 'bauhb'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'videos'),
    ));
}
add_action('init', 'bauhb_register_post_types');

/**
 * Taxonomies personnalisées
 */
function bauhb_register_taxonomies()
{
    // Taxonomie Catégorie de produit
    register_taxonomy('product_category', 'bauhb_product', array(
        'labels' => array(
            'name' => __('Catégories de produit', 'bauhb'),
            'singular_name' => __('Catégorie de produit', 'bauhb'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'boutique/categorie'),
    ));

    // Taxonomie Type de sponsor
    register_taxonomy('sponsor_type', 'sponsor', array(
        'labels' => array(
            'name' => __('Types de partenaire', 'bauhb'),
            'singular_name' => __('Type de partenaire', 'bauhb'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'partenaires/type'),
    ));

    // Taxonomie Catégorie d'équipe
    register_taxonomy('team_category', 'team', array(
        'labels' => array(
            'name' => __('Catégories d\'équipe', 'bauhb'),
            'singular_name' => __('Catégorie d\'équipe', 'bauhb'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'equipes/categorie'),
    ));
}
add_action('init', 'bauhb_register_taxonomies');

/**
 * Options du thème avec ACF
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Options du thème',
        'menu_title' => 'Options du thème',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Options de la page d\'accueil',
        'menu_title' => 'Page d\'accueil',
        'parent_slug' => 'theme-options',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Options du header',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-options',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Options du footer',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-options',
    ));
}

/**
 * Personnalisation de l'extrait
 */
function bauhb_custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'bauhb_custom_excerpt_length', 999);

function bauhb_custom_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'bauhb_custom_excerpt_more');

/**
 * Ajoute des classes pour les items de menu actifs
 */
function bauhb_menu_item_classes($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'bauhb_menu_item_classes', 10, 2);
