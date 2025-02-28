<?php

/**
 * Fonctions d'aide pour le thème BAUHB
 */

/**
 * Convertit une couleur hexadécimale en format RGB
 *
 * @param string $hex Couleur hexadécimale (#RRGGBB)
 * @return string Format RGB (r, g, b)
 */
function hex2rgb($hex)
{
    $hex = str_replace('#', '', $hex);

    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }

    return $r . ', ' . $g . ', ' . $b;
}

/**
 * Ajuste la luminosité d'une couleur hexadécimale
 *
 * @param string $hex Couleur hexadécimale (#RRGGBB)
 * @param int $steps Nombre d'étapes pour ajuster la luminosité (positif pour éclaircir, négatif pour assombrir)
 * @return string Couleur hexadécimale ajustée
 */
function adjustBrightness($hex, $steps)
{
    $hex = str_replace('#', '', $hex);

    // Convertir hexadécimal en RGB
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    // Ajuster la luminosité
    $r = max(0, min(255, $r + $steps));
    $g = max(0, min(255, $g + $steps));
    $b = max(0, min(255, $b + $steps));

    // Convertir RGB en hexadécimal
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}

/**
 * Obtient l'URL d'une image de remplacement si aucune image n'est disponible
 *
 * @param string $type Type d'image (hero, news, video, product, sponsor)
 * @return string URL de l'image de remplacement
 */
function get_placeholder_image($type = 'default')
{
    $placeholders = array(
        'hero' => 'hero-placeholder.jpg',
        'news' => 'news-placeholder.jpg',
        'video' => 'video-placeholder.jpg',
        'product' => 'product-placeholder.jpg',
        'sponsor' => 'sponsor-placeholder.jpg',
        'default' => 'placeholder.jpg',
    );

    $image = isset($placeholders[$type]) ? $placeholders[$type] : $placeholders['default'];

    return get_template_directory_uri() . '/assets/img/' . $image;
}

/**
 * Renvoie le type de média YouTube à partir d'une URL
 *
 * @param string $url URL de la vidéo YouTube
 * @return string|false ID de la vidéo YouTube ou false si non valide
 */
function get_youtube_id_from_url($url)
{
    $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

    if (preg_match($pattern, $url, $matches)) {
        return $matches[1];
    }

    return false;
}

/**
 * Formate une date au format français
 *
 * @param string $date Date au format Y-m-d
 * @return string Date formatée (ex: "Sam. 29 Février")
 */
function format_french_date($date)
{
    $timestamp = strtotime($date);
    return date_i18n('D. j F', $timestamp);
}

/**
 * Formate un prix avec le symbole euro
 *
 * @param float $price Prix
 * @param bool $show_decimals Afficher les décimales
 * @return string Prix formaté (ex: "89,99 €")
 */
function format_price($price, $show_decimals = true)
{
    if ($show_decimals) {
        return number_format($price, 2, ',', ' ') . ' €';
    } else {
        return number_format($price, 0, ',', ' ') . ' €';
    }
}

/**
 * Génère un extrait personnalisé
 *
 * @param int $post_id ID de l'article
 * @param int $length Longueur de l'extrait en mots
 * @return string Extrait
 */
function custom_excerpt($post_id, $length = 20)
{
    $post = get_post($post_id);
    $excerpt = $post->post_excerpt;

    if (empty($excerpt)) {
        $excerpt = $post->post_content;
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = excerpt_remove_blocks($excerpt);
        $excerpt = wp_strip_all_tags($excerpt);
        $words = explode(' ', $excerpt, $length + 1);

        if (count($words) > $length) {
            array_pop($words);
            $excerpt = implode(' ', $words) . '...';
        } else {
            $excerpt = implode(' ', $words);
        }
    }

    return $excerpt;
}
