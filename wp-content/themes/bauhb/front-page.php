<?php

/**
 * Template pour la page d'accueil
 * Récupération automatique du prochain match à domicile
 *
 * @package BAUHB
 */

get_header();

// Récupération de l'ID de la page d'accueil
$home_page_id = get_option('page_on_front');

/**
 * SECTION 1: BANNIÈRE VIDÉO
 */
// Récupération des champs pour la bannière
$background_type = get_field('hero_background_type', $home_page_id) ?: 'video';
$video_url = get_field('hero_video_url', $home_page_id);
$background_image = get_field('hero_background_image', $home_page_id);
$background_color = get_field('hero_background_color', $home_page_id) ?: '#063970';
$overlay_opacity = get_field('hero_overlay_opacity', $home_page_id) ?: 60;
$height = get_field('hero_height', $home_page_id) ?: 'large';
$subtitle = get_field('hero_subtitle', $home_page_id);
$title = get_field('hero_title', $home_page_id);
$description = get_field('hero_description', $home_page_id);
$primary_button = get_field('hero_primary_button', $home_page_id);
$secondary_button = get_field('hero_secondary_button', $home_page_id);
$content_alignment = get_field('hero_content_alignment', $home_page_id) ?: 'left';
$animation = get_field('hero_animation', $home_page_id) ?: 'fade';

// Configuration de la hauteur
$height_class = 'hero-height-large'; // Valeur par défaut
switch ($height) {
    case 'full':
        $height_class = 'hero-height-full';
        break;
    case 'medium':
        $height_class = 'hero-height-medium';
        break;
    case 'small':
        $height_class = 'hero-height-small';
        break;
}

// Configuration de l'alignement
$alignment_class = 'hero-align-left'; // Valeur par défaut
switch ($content_alignment) {
    case 'center':
        $alignment_class = 'hero-align-center';
        break;
    case 'right':
        $alignment_class = 'hero-align-right';
        break;
}

// Configuration de l'animation
$animation_class = ''; // Valeur par défaut
switch ($animation) {
    case 'fade':
        $animation_class = 'hero-animation-fade';
        break;
    case 'slide':
        $animation_class = 'hero-animation-slide';
        break;
    case 'zoom':
        $animation_class = 'hero-animation-zoom';
        break;
}

// Calcul de l'opacité de l'overlay (convertir de 0-100 à 0-1)
$overlay_opacity_decimal = $overlay_opacity / 100;
?>

<!-- Hero Video Banner -->
<section class="hero <?php echo esc_attr($height_class); ?> <?php echo esc_attr($alignment_class); ?> <?php echo esc_attr($animation_class); ?>" id="home">
    <div class="hero-video-container">
        <?php if ($background_type === 'video' && $video_url) :
            // Extraction de l'ID de la vidéo YouTube
            $video_id = '';
            if (preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $video_url, $matches)) {
                $video_id = $matches[1];
            }

            if ($video_id) : ?>
                <iframe class="hero-video" src="https://www.youtube.com/embed/<?php echo esc_attr($video_id); ?>?autoplay=1&mute=1&loop=1&controls=0&showinfo=0&rel=0&playlist=<?php echo esc_attr($video_id); ?>&cc_load_policy=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php else : ?>
                <video class="hero-video" autoplay muted loop playsinline>
                    <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                </video>
            <?php endif; ?>
        <?php elseif ($background_type === 'image' && $background_image) : ?>
            <div class="hero-background-image" style="background-image: url('<?php echo esc_url($background_image['url']); ?>');"></div>
        <?php else : ?>
            <!-- Fallback background color -->
            <div class="hero-background-color" style="background-color: <?php echo esc_attr($background_color); ?>;"></div>
        <?php endif; ?>

        <?php if ($background_type !== 'color') : ?>
            <div class="hero-overlay" style="background: rgba(0, 0, 0, <?php echo esc_attr($overlay_opacity_decimal); ?>);"></div>
        <?php endif; ?>
    </div>

    <div class="hero-content">
        <?php if ($subtitle) : ?>
            <div class="hero-subtitle"><?php echo esc_html($subtitle); ?></div>
        <?php endif; ?>

        <?php if ($title) : ?>
            <h1 class="hero-title"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>

        <?php if ($description) : ?>
            <p class="hero-description"><?php echo esc_html($description); ?></p>
        <?php endif; ?>

        <?php if (($primary_button && !empty($primary_button['enable'])) ||
            ($secondary_button && !empty($secondary_button['enable']))
        ) : ?>
            <div class="hero-buttons">
                <?php if (
                    $primary_button && !empty($primary_button['enable']) &&
                    !empty($primary_button['text']) && !empty($primary_button['url'])
                ) :
                    $primary_style_class = 'primary';
                    if (!empty($primary_button['style'])) {
                        switch ($primary_button['style']) {
                            case 'secondary':
                                $primary_style_class = 'secondary-style';
                                break;
                            case 'outline':
                                $primary_style_class = 'outline';
                                break;
                        }
                    }
                ?>
                    <a href="<?php echo esc_url($primary_button['url']); ?>" class="hero-button <?php echo esc_attr($primary_style_class); ?>">
                        <?php echo esc_html($primary_button['text']); ?>
                    </a>
                <?php endif; ?>

                <?php if (
                    $secondary_button && !empty($secondary_button['enable']) &&
                    !empty($secondary_button['text']) && !empty($secondary_button['url'])
                ) :
                    $secondary_style_class = 'secondary';
                    if (!empty($secondary_button['style'])) {
                        switch ($secondary_button['style']) {
                            case 'default':
                                $secondary_style_class = 'primary';
                                break;
                            case 'secondary':
                                $secondary_style_class = 'secondary-style';
                                break;
                            case 'outline':
                                $secondary_style_class = 'outline';
                                break;
                        }
                    }
                ?>
                    <a href="<?php echo esc_url($secondary_button['url']); ?>" class="hero-button <?php echo esc_attr($secondary_style_class); ?>">
                        <?php echo esc_html($secondary_button['text']); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
/**
 * SECTION 2: PROCHAIN MATCH
 * Cette section récupère automatiquement le prochain match à domicile
 */

// Vérification si la section est activée
$next_match_enable = get_field('next_match_enable', $home_page_id);

if ($next_match_enable) :
    // Configuration du style
    $style = get_field('next_match_style', $home_page_id);
    $position_class = !empty($style['position']) && $style['position'] === 'below' ? 'next-match-position-below' : 'next-match-position-overlap';
    $border_radius_class = !empty($style['border_radius']) ? 'next-match-rounded' : '';
    $shadows_class = !empty($style['shadows']) ? 'next-match-shadows' : '';

    // Récupération des éléments de personnalisation
    $section_title = get_field('next_match_section_title', $home_page_id);
    $button_text = get_field('next_match_button_text', $home_page_id) ?: 'Réserver des places';
    $ticket_url = get_field('next_match_ticket_url', $home_page_id);
    $no_match_message = get_field('next_match_no_match_message', $home_page_id) ?: 'Aucun match à domicile à venir n\'a été trouvé.';

    // Trouver l'équipe principale du club
    $main_team_args = array(
        'post_type'      => 'team',
        'posts_per_page' => 1,
        'meta_key'       => 'team_main',
        'meta_value'     => 1,
    );

    $main_team_query = new WP_Query($main_team_args);

    if ($main_team_query->have_posts()) :
        $main_team_query->the_post();
        $main_team_id = get_the_ID();

        // Vérifier si un match spécifique a été sélectionné pour cette équipe
        $selected_match_id = get_field('team_next_home_match', $main_team_id);

        // Restauration du post original
        wp_reset_postdata();

        // Si un match a été spécifiquement sélectionné
        if ($selected_match_id) {
            $match_id = $selected_match_id;
            $match_found = true;
        }
        // Sinon, rechercher automatiquement le prochain match à domicile
        else {
            // Date actuelle au format MySQL
            $today = date('Y-m-d H:i:s');

            // Recherche du prochain match à domicile pour l'équipe principale
            $args = array(
                'post_type'      => 'match',
                'posts_per_page' => 1,
                'meta_key'       => 'match_date',
                'orderby'        => 'meta_value',
                'order'          => 'ASC',
                'meta_query'     => array(
                    'relation'   => 'AND',
                    array(
                        'key'     => 'match_date',
                        'value'   => $today,
                        'compare' => '>=',
                        'type'    => 'DATETIME'
                    ),
                    array(
                        'key'     => 'match_location',
                        'value'   => 'home',
                        'compare' => '='
                    ),
                    array(
                        'key'     => 'match_team',
                        'value'   => $main_team_id,
                        'compare' => '='
                    ),
                    array(
                        'key'     => 'match_status',
                        'value'   => 'upcoming',
                        'compare' => '='
                    )
                )
            );

            $matches_query = new WP_Query($args);

            // Si un match est trouvé
            if ($matches_query->have_posts()) {
                $matches_query->the_post();
                $match_id = get_the_ID();
                $match_found = true;
                wp_reset_postdata();
            } else {
                $match_found = false;
            }
        }

        // Si un match a été trouvé (sélectionné manuellement ou trouvé automatiquement)
        if ($match_found) :
            // Récupération des données du match
            $match_date = get_field('match_date', $match_id);
            $match_timestamp = $match_date ? strtotime($match_date) : '';
            $is_match_in_future = $match_timestamp && $match_timestamp > current_time('timestamp');
            $match_team_id = get_field('match_team', $match_id);
            $match_competition = get_field('match_competition', $match_id);
            $match_opponent_type = get_field('match_opponent_type', $match_id);
            $venue = get_field('match_venue', $match_id) ?: 'Le Phare';
            $match_ticket_url = get_field('match_ticket_url', $match_id) ?: $ticket_url;

            // Récupération des détails de l'équipe du club
            $team_data = array(
                'name' => get_the_title($match_team_id),
                'logo' => get_field('team_logo', $match_team_id)
            );

            // Récupération des détails de l'adversaire
            if ($match_opponent_type === 'existing') {
                $opponent_id = get_field('match_opponent', $match_id);
                $opponent_data = array(
                    'name' => get_the_title($opponent_id),
                    'logo' => get_field('opponent_logo', $opponent_id)
                );
            } else {
                $custom_opponent = get_field('match_custom_opponent', $match_id);
                $opponent_data = array(
                    'name' => $custom_opponent['name'],
                    'logo' => $custom_opponent['logo']
                );
            }
?>

            <!-- Next Match Section -->
            <section class="next-match-section <?php echo esc_attr($position_class); ?>">
                <?php if ($section_title) : ?>
                    <h2 class="next-match-section-title"><?php echo esc_html($section_title); ?></h2>
                <?php endif; ?>

                <div class="container">
                    <div class="next-match-container <?php echo esc_attr($border_radius_class); ?> <?php echo esc_attr($shadows_class); ?>">
                        <div class="next-match-info">
                            <div class="next-match-upcoming">
                                <div class="next-match-label">
                                    <div class="next-match-icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <span>Prochain Match</span>
                                </div>
                                <div class="match-countdown" id="matchCountdown">
                                    <?php
                                    if ($match_timestamp) {
                                        $now = current_time('timestamp');
                                        $diff = $match_timestamp - $now;

                                        if ($diff > 0) {
                                            $days = floor($diff / (60 * 60 * 24));
                                            $hours = floor(($diff - ($days * 60 * 60 * 24)) / (60 * 60));

                                            if ($days > 0) {
                                                echo 'Dans ' . $days . ' jour' . ($days > 1 ? 's' : '');
                                            } elseif ($hours > 0) {
                                                echo 'Dans ' . $hours . ' heure' . ($hours > 1 ? 's' : '');
                                            } else {
                                                echo "Aujourd'hui !";
                                            }
                                        } else {
                                            echo "Match terminé";
                                        }
                                    } else {
                                        echo "À venir";
                                    }
                                    ?>
                                </div>
                                <?php if ($match_competition) : ?>
                                    <div class="match-competition"><?php echo esc_html($match_competition); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="next-match-vs">
                            <div class="next-match-team">
                                <?php if ($team_data) : ?>
                                    <div class="next-match-team-logo">
                                        <?php if (!empty($team_data['logo'])) : ?>
                                            <img src="<?php echo esc_url($team_data['logo']['url']); ?>" alt="<?php echo esc_attr($team_data['name']); ?>">
                                        <?php else : ?>
                                            <div class="next-match-team-logo-placeholder"><?php echo esc_html(substr($team_data['name'], 0, 2)); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="next-match-team-name"><?php echo esc_html($team_data['name']); ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="next-match-details">
                                <?php if ($match_timestamp) : ?>
                                    <div class="next-match-date">
                                        <?php echo date_i18n('D. j F', $match_timestamp); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="next-match-vs-label">VS</div>

                                <?php if ($match_timestamp) : ?>
                                    <div class="next-match-time">
                                        <?php echo date_i18n('H:i', $match_timestamp); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($venue) : ?>
                                    <div class="next-match-venue"><?php echo esc_html($venue); ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="next-match-team">
                                <?php if ($opponent_data) : ?>
                                    <div class="next-match-team-logo">
                                        <?php if (!empty($opponent_data['logo'])) : ?>
                                            <img src="<?php echo esc_url($opponent_data['logo']['url']); ?>" alt="<?php echo esc_attr($opponent_data['name']); ?>">
                                        <?php else : ?>
                                            <div class="next-match-team-logo-placeholder"><?php echo esc_html(substr($opponent_data['name'], 0, 2)); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="next-match-team-name"><?php echo esc_html($opponent_data['name']); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if ($match_ticket_url && $is_match_in_future) : ?>
                            <a href="<?php echo esc_url($match_ticket_url); ?>" class="next-match-cta">
                                <div class="next-match-button">
                                    <i class="fas fa-ticket-alt"></i>
                                    <span><?php echo esc_html($button_text); ?></span>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <!-- Ajout de script JavaScript pour mettre à jour le compte à rebours -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    <?php if ($match_timestamp && $is_match_in_future) : ?>
                        // Compte à rebours mis à jour toutes les minutes
                        let matchTime = <?php echo $match_timestamp * 1000; ?>;

                        function updateCountdown() {
                            const now = new Date().getTime();
                            const diff = matchTime - now;

                            if (diff > 0) {
                                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                                const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));

                                let countdownText = '';

                                if (days > 0) {
                                    countdownText = `Dans ${days} jour${days > 1 ? 's' : ''}`;
                                } else if (hours > 0) {
                                    countdownText = `Dans ${hours} heure${hours > 1 ? 's' : ''}`;
                                } else if (minutes > 0) {
                                    countdownText = `Dans ${minutes} minute${minutes > 1 ? 's' : ''}`;
                                } else {
                                    countdownText = "Match imminent !";
                                }

                                document.getElementById('matchCountdown').textContent = countdownText;
                            } else {
                                document.getElementById('matchCountdown').textContent = "Match en cours";
                                clearInterval(countdown);
                            }
                        }

                        // Mise à jour initiale
                        updateCountdown();

                        // Mise à jour toutes les minutes
                        const countdown = setInterval(updateCountdown, 60000);
                    <?php endif; ?>
                });
            </script>

        <?php else : // Pas de match trouvé 
        ?>
            <section class="next-match-section <?php echo esc_attr($position_class); ?>">
                <div class="container">
                    <div class="next-match-container <?php echo esc_attr($border_radius_class); ?> <?php echo esc_attr($shadows_class); ?>">
                        <div class="next-match-info">
                            <p class="no-match-message"><?php echo esc_html($no_match_message); ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; // Fin de la vérification de match 
        ?>
    <?php else : // Pas d'équipe principale 
    ?>
        <section class="next-match-section <?php echo esc_attr($position_class); ?>">
            <div class="container">
                <div class="next-match-container <?php echo esc_attr($border_radius_class); ?> <?php echo esc_attr($shadows_class); ?>">
                    <div class="next-match-info">
                        <p class="no-match-message">Aucune équipe principale n'a été définie. Veuillez désigner une équipe comme "Équipe principale" dans l'administration.</p>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; // Fin de la vérification d'équipe principale 
    ?>
<?php endif; // Fin de la section Prochain Match 
?>

<?php
/**
 * SECTION 3: ACTUALITÉS
 */
?>
<section class="news-section" id="news" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Les actualités</h2>
            <p class="section-subtitle">Restez informé des dernières nouvelles du club</p>
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="section-more">
                <span>Toutes les actualités</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="news-grid">
            <?php
            $news_args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish',
            );

            $news_query = new WP_Query($news_args);

            if ($news_query->have_posts()) :
                $delay = 200; // Animation delay
                while ($news_query->have_posts()) : $news_query->the_post();
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? $categories[0]->name : '';
            ?>

                    <article class="news-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
                        <div class="news-card-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/placeholder.jpg" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>

                            <?php if ($category_name) : ?>
                                <div class="news-card-category"><?php echo esc_html($category_name); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="news-card-content">
                            <div class="news-card-date">
                                <i class="far fa-calendar-alt"></i>
                                <span><?php echo get_the_date(); ?></span>
                            </div>
                            <h3 class="news-card-title"><?php the_title(); ?></h3>
                            <p class="news-card-excerpt"><?php echo get_the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="news-card-link">
                                <span>Lire l'article</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                <?php
                    $delay += 200; // Increase delay for each card
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p>Aucune actualité à afficher pour le moment.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
/**
 * SECTION 4: VIDÉOS
 */
?>
<section class="videos-section" id="videos" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Les résumés</h2>
            <p class="section-subtitle">Revivez les meilleurs moments de nos matchs</p>
            <a href="<?php echo esc_url(get_post_type_archive_link('video')); ?>" class="section-more">
                <span>Toutes les vidéos</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="videos-grid">
            <?php
            $videos_args = array(
                'post_type' => 'video',
                'posts_per_page' => 4,
                'post_status' => 'publish',
            );

            $videos_query = new WP_Query($videos_args);

            if ($videos_query->have_posts()) :
                $delay = 200; // Animation delay
                while ($videos_query->have_posts()) : $videos_query->the_post();
                    // Récupérer les données de la vidéo
                    $video_url = get_field('video_url');
                    $duration = get_field('video_duration') ?: '3:45';
                    $custom_thumbnail = get_field('video_thumbnail_custom');

                    // Extraction de l'ID YouTube pour créer un lien vers la vidéo
                    $video_id = '';
                    if ($video_url && preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $video_url, $matches)) {
                        $video_id = $matches[1];
                    }

                    // Si on a un ID YouTube, créer un lien modal, sinon utiliser le lien vers la page de détail
                    $video_link = $video_id ? 'javascript:void(0);' : get_permalink();
                    $modal_data = $video_id ? 'data-video-id="' . esc_attr($video_id) . '"' : '';
            ?>

                    <div class="video-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
                        <div class="video-thumbnail">
                            <?php if ($custom_thumbnail) : ?>
                                <img src="<?php echo esc_url($custom_thumbnail['url']); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php elseif (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php elseif ($video_id) : ?>
                                <img src="https://img.youtube.com/vi/<?php echo esc_attr($video_id); ?>/maxresdefault.jpg" alt="<?php the_title_attribute(); ?>">
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/placeholder-video.jpg" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>

                            <a href="<?php echo esc_url($video_link); ?>" class="video-play js-video-trigger" <?php echo $modal_data; ?>>
                                <i class="fas fa-play"></i>
                            </a>
                            <div class="video-duration"><?php echo esc_html($duration); ?></div>
                        </div>
                        <h3 class="video-title"><?php the_title(); ?></h3>
                    </div>

                <?php
                    $delay += 100; // Increase delay for each card
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p>Aucune vidéo à afficher pour le moment.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Modal pour afficher les vidéos YouTube -->
<div class="video-modal" id="videoModal">
    <div class="video-modal-overlay"></div>
    <div class="video-modal-content">
        <button class="video-modal-close">&times;</button>
        <div class="video-modal-container">
            <iframe id="videoIframe" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>

<!-- CSS pour le modal de vidéo -->
<style>
    .video-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
    }

    .video-modal.active {
        display: block;
    }

    .video-modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.85);
    }

    .video-modal-content {
        position: relative;
        width: 90%;
        max-width: 900px;
        margin: 5vh auto;
        z-index: 10000;
    }

    .video-modal-close {
        position: absolute;
        top: -40px;
        right: -10px;
        color: white;
        font-size: 32px;
        cursor: pointer;
        background: transparent;
        border: none;
        z-index: 10001;
    }

    .video-modal-container {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 */
        height: 0;
        overflow: hidden;
    }

    .video-modal-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .video-thumbnail {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        cursor: pointer;
    }

    .video-thumbnail img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease;
    }

    .video-thumbnail:hover img {
        transform: scale(1.05);
    }

    .video-play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        background-color: rgba(215, 32, 41, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        transition: all 0.3s ease;
        z-index: 2;
    }

    .video-play:hover {
        background-color: #d72029;
        width: 65px;
        height: 65px;
    }

    .video-duration {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
    }

    .video-title {
        margin-top: 12px;
        font-size: 18px;
        font-weight: 600;
        line-height: 1.3;
    }
</style>

<!-- JavaScript pour gérer le modal des vidéos -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('videoModal');
        const iframe = document.getElementById('videoIframe');
        const videoTriggers = document.querySelectorAll('.js-video-trigger');
        const closeBtn = modal.querySelector('.video-modal-close');
        const overlay = modal.querySelector('.video-modal-overlay');

        // Ouvrir le modal au clic sur un bouton de lecture
        videoTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                const videoId = this.getAttribute('data-video-id');

                if (videoId) {
                    e.preventDefault();
                    iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden'; // Empêcher le défilement
                }
            });
        });

        // Fermer le modal
        function closeModal() {
            iframe.src = '';
            modal.classList.remove('active');
            document.body.style.overflow = ''; // Réactiver le défilement
        }

        closeBtn.addEventListener('click', closeModal);
        overlay.addEventListener('click', closeModal);

        // Fermer avec la touche Echap
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });
    });
</script>

<?php
/**
 * SECTION 5: BOUTIQUE
 */
?>
<section class="shop-section" id="shop" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">La boutique</h2>
            <p class="section-subtitle">Portez fièrement nos couleurs</p>
            <a href="<?php echo esc_url(get_post_type_archive_link('bauhb_product')); ?>" class="section-more">
                <span>Toute la collection</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Shop Categories -->
        <div class="shop-categories" data-aos="fade-up" data-aos-delay="200">
            <?php
            $product_categories = get_terms(array(
                'taxonomy' => 'product_category',
                'hide_empty' => false,
            ));

            if (!empty($product_categories) && !is_wp_error($product_categories)) :
            ?>
                <div class="shop-category active">
                    <span>Tous les produits</span>
                </div>

                <?php foreach ($product_categories as $category) : ?>
                    <div class="shop-category" data-category="<?php echo esc_attr($category->slug); ?>">
                        <span><?php echo esc_html($category->name); ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="products-grid">
            <?php
            $products_args = array(
                'post_type' => 'bauhb_product',
                'posts_per_page' => 4,
                'post_status' => 'publish',
            );

            $products_query = new WP_Query($products_args);

            if ($products_query->have_posts()) :
                $delay = 300; // Animation delay
                while ($products_query->have_posts()) : $products_query->the_post();
                    // Récupérer les informations du produit depuis les champs ACF
                    $price = get_field('product_price') ?: '89.99';
                    $old_price = get_field('product_old_price');
                    $badge = get_field('product_badge');
                    $badge_type = get_field('product_badge_type') ?: '';
                    $category = get_the_terms(get_the_ID(), 'product_category');
                    $category_name = !empty($category) ? $category[0]->name : 'Produit';
                    $rating = get_field('product_rating') ?: 4.5;
                    $review_count = get_field('product_review_count') ?: rand(5, 30);
            ?>

                    <div class="product-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
                        <div class="product-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/placeholder-product.jpg" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>

                            <?php if ($badge) : ?>
                                <div class="product-badge <?php echo esc_attr($badge_type); ?>"><?php echo esc_html($badge); ?></div>
                            <?php endif; ?>

                            <div class="product-actions">
                                <button class="product-action">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="product-action favorite">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="product-category"><?php echo esc_html($category_name); ?></div>
                            <h3 class="product-title"><?php the_title(); ?></h3>
                            <div class="product-rating">
                                <?php
                                // Affichage des étoiles de notation
                                $full_stars = floor($rating);
                                $half_star = ($rating - $full_stars) >= 0.5;

                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $full_stars) {
                                        echo '<i class="fas fa-star"></i>';
                                    } elseif ($i == $full_stars + 1 && $half_star) {
                                        echo '<i class="fas fa-star-half-alt"></i>';
                                    } else {
                                        echo '<i class="far fa-star"></i>';
                                    }
                                }
                                ?>
                                <span>(<?php echo esc_html($review_count); ?>)</span>
                            </div>
                            <div class="product-price">
                                <?php if ($old_price) : ?>
                                    <span class="old-price"><?php echo esc_html($old_price); ?> €</span>
                                <?php endif; ?>
                                <span class="current-price"><?php echo esc_html($price); ?> €</span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="product-button">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Ajouter au panier</span>
                            </a>
                        </div>
                    </div>

                <?php
                    $delay += 100; // Increase delay for each card
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p>Aucun produit à afficher pour le moment.</p>
            <?php endif; ?>
        </div>

        <div class="shop-footer" data-aos="fade-up">
            <a href="<?php echo esc_url(get_post_type_archive_link('bauhb_product')); ?>" class="view-all-button">
                <span>Voir tous les produits</span>
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </div>
</section>

<?php
/**
 * SECTION 6: PARTENAIRES
 */
?>
<section class="sponsors-section" id="sponsors" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Nos partenaires</h2>
            <p class="section-subtitle">Ils nous font confiance et nous soutiennent</p>
        </div>

        <?php
        // Récupérer les partenaires majeurs
        $main_sponsors_args = array(
            'post_type' => 'sponsor',
            'posts_per_page' => 3,
            'tax_query' => array(
                array(
                    'taxonomy' => 'sponsor_type',
                    'field' => 'slug',
                    'terms' => 'majeur',
                ),
            ),
        );

        $main_sponsors_query = new WP_Query($main_sponsors_args);

        if ($main_sponsors_query->have_posts()) : ?>
            <div class="sponsors-main" data-aos="fade-up" data-aos-delay="200">
                <h3 class="sponsors-category">Partenaires majeurs</h3>
                <div class="sponsors-grid main-sponsors">
                    <?php while ($main_sponsors_query->have_posts()) : $main_sponsors_query->the_post(); ?>
                        <div class="sponsor-item main-sponsor">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="sponsor-logo">
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/placeholder-sponsor.jpg" alt="<?php the_title_attribute(); ?>" class="sponsor-logo">
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php
        // Récupérer les partenaires officiels
        $official_sponsors_args = array(
            'post_type' => 'sponsor',
            'posts_per_page' => 5,
            'tax_query' => array(
                array(
                    'taxonomy' => 'sponsor_type',
                    'field' => 'slug',
                    'terms' => 'officiel',
                ),
            ),
        );

        $official_sponsors_query = new WP_Query($official_sponsors_args);

        if ($official_sponsors_query->have_posts()) : ?>
            <div class="sponsors-official" data-aos="fade-up" data-aos-delay="300">
                <h3 class="sponsors-category">Partenaires officiels</h3>
                <div class="sponsors-grid">
                    <?php while ($official_sponsors_query->have_posts()) : $official_sponsors_query->the_post(); ?>
                        <div class="sponsor-item">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="sponsor-logo">
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/placeholder-sponsor.jpg" alt="<?php the_title_attribute(); ?>" class="sponsor-logo">
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php
        // Récupérer les partenaires techniques
        $technical_sponsors_args = array(
            'post_type' => 'sponsor',
            'posts_per_page' => 6,
            'tax_query' => array(
                array(
                    'taxonomy' => 'sponsor_type',
                    'field' => 'slug',
                    'terms' => 'technique',
                ),
            ),
        );

        $technical_sponsors_query = new WP_Query($technical_sponsors_args);

        if ($technical_sponsors_query->have_posts()) : ?>
            <div class="sponsors-technical" data-aos="fade-up" data-aos-delay="400">
                <h3 class="sponsors-category">Partenaires techniques</h3>
                <div class="sponsors-grid">
                    <?php while ($technical_sponsors_query->have_posts()) : $technical_sponsors_query->the_post(); ?>
                        <div class="sponsor-item">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="sponsor-logo">
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/placeholder-sponsor.jpg" alt="<?php the_title_attribute(); ?>" class="sponsor-logo">
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="sponsors-cta" data-aos="fade-up" data-aos-delay="500">
            <div class="sponsors-cta-content">
                <h3 class="sponsors-cta-title">Devenez partenaire du club</h3>
                <p class="sponsors-cta-text">Rejoignez l'aventure BAUHB et bénéficiez d'une visibilité exceptionnelle auprès de notre communauté passionnée.</p>
                <a href="<?php echo esc_url(get_field('sponsor_cta_link', 'option') ?: '#'); ?>" class="sponsors-cta-button">
                    <span>Découvrir nos offres</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>