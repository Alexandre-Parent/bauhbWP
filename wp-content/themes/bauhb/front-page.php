<?php get_header(); ?>

<!-- Hero Video Banner -->
<section class="hero" id="home">
    <div class="hero-video-container">
        <?php
        $video_url = get_field('hero_video_url', 'option');
        if ($video_url) :
            // Extraction de l'ID de la vidéo YouTube si c'est une URL YouTube
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
        <?php else : ?>
            <!-- Fallback background image si pas de vidéo -->
            <div class="hero-video" style="background-color: var(--secondary-dark);"></div>
        <?php endif; ?>
        <div class="hero-overlay"></div>
    </div>

    <div class="hero-content">
        <?php if ($subtitle = get_field('hero_subtitle', 'option')) : ?>
            <div class="hero-subtitle"><?php echo esc_html($subtitle); ?></div>
        <?php endif; ?>

        <?php if ($title = get_field('hero_title', 'option')) : ?>
            <h1 class="hero-title"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>

        <?php if ($description = get_field('hero_description', 'option')) : ?>
            <p class="hero-description"><?php echo esc_html($description); ?></p>
        <?php endif; ?>

        <div class="hero-buttons">
            <?php
            $primary_button = get_field('hero_primary_button', 'option');
            $secondary_button = get_field('hero_secondary_button', 'option');

            if ($primary_button && !empty($primary_button['text']) && !empty($primary_button['url'])) : ?>
                <a href="<?php echo esc_url($primary_button['url']); ?>" class="hero-button primary"><?php echo esc_html($primary_button['text']); ?></a>
            <?php endif; ?>

            <?php if ($secondary_button && !empty($secondary_button['text']) && !empty($secondary_button['url'])) : ?>
                <a href="<?php echo esc_url($secondary_button['url']); ?>" class="hero-button secondary"><?php echo esc_html($secondary_button['text']); ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Next Match Section -->
<section class="next-match-section">
    <div class="container">
        <div class="next-match-container">
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
                        $match_date = get_field('next_match_date', 'option');
                        if ($match_date) {
                            $match_timestamp = strtotime($match_date);
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
                </div>
            </div>

            <div class="next-match-vs">
                <div class="next-match-team">
                    <?php
                    $home_team = get_field('next_match_home_team', 'option');
                    if ($home_team) : ?>
                        <div class="next-match-team-logo">
                            <?php if (!empty($home_team['logo'])) : ?>
                                <img src="<?php echo esc_url($home_team['logo']['url']); ?>" alt="<?php echo esc_attr($home_team['name']); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="next-match-team-name"><?php echo esc_html($home_team['name']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="next-match-details">
                    <?php if ($match_date) : ?>
                        <div class="next-match-date">
                            <?php echo date_i18n('D. j F', $match_timestamp); ?>
                        </div>
                    <?php endif; ?>

                    <div class="next-match-vs-label">VS</div>

                    <?php if ($match_date) : ?>
                        <div class="next-match-time">
                            <?php echo date_i18n('H:i', $match_timestamp); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($venue = get_field('next_match_venue', 'option')) : ?>
                        <div class="next-match-venue"><?php echo esc_html($venue); ?></div>
                    <?php endif; ?>
                </div>

                <div class="next-match-team">
                    <?php
                    $away_team = get_field('next_match_away_team', 'option');
                    if ($away_team) : ?>
                        <div class="next-match-team-logo">
                            <?php if (!empty($away_team['logo'])) : ?>
                                <img src="<?php echo esc_url($away_team['logo']['url']); ?>" alt="<?php echo esc_attr($away_team['name']); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="next-match-team-name"><?php echo esc_html($away_team['name']); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <a href="<?php echo esc_url(get_field('next_match_ticket_url', 'option') ?: '#tickets'); ?>" class="next-match-cta">
                <div class="next-match-button">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Réserver des places</span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Latest News -->
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

<!-- Videos Section -->
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
                    // Récupérer la durée de la vidéo depuis les champs ACF
                    $duration = get_field('video_duration') ?: '3:45';
            ?>

                    <div class="video-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
                        <div class="video-thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/placeholder-video.jpg" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="video-play">
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

<!-- Shop Section -->
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

<!-- Sponsors Section -->
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