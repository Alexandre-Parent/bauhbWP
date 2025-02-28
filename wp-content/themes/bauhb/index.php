<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
    ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php
        endwhile;

        the_posts_navigation();
    else :
        ?>
        <p><?php esc_html_e('Aucun contenu à afficher.', 'bauhb'); ?></p>
    <?php
    endif;
    ?>
</main>

<?php get_footer(); ?>