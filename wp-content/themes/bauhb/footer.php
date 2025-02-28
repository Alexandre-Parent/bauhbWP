<!-- Footer -->
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-newsletter" data-aos="fade-up">
                <div class="newsletter-content">
                    <div class="newsletter-icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="newsletter-text">
                        <h3><?php echo esc_html(get_field('footer_newsletter_title', 'option')); ?></h3>
                        <p><?php echo esc_html(get_field('footer_newsletter_text', 'option')); ?></p>
                    </div>
                </div>

                <?php
                // Vous pouvez intégrer ici un formulaire de newsletter (Contact Form 7 ou MailChimp)
                ?>
                <form class="newsletter-form">
                    <div class="form-group">
                        <input type="email" placeholder="Votre adresse email" required class="newsletter-input">
                        <button type="submit" class="newsletter-submit">S'inscrire</button>
                    </div>
                    <div class="newsletter-privacy">
                        <label class="newsletter-checkbox-container">
                            <input type="checkbox" required>
                            <span class="checkmark"></span>
                            <span class="privacy-text">J'accepte de recevoir des emails de <?php echo get_bloginfo('name'); ?></span>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer-widgets">
        <div class="container">
            <div class="footer-widgets-grid">
                <div class="footer-widget about-widget">
                    <div class="widget-logo">
                        <?php
                        $logo = get_field('theme_logo', 'option');
                        if ($logo) : ?>
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?: get_bloginfo('name')); ?>" class="footer-logo">
                        <?php else : ?>
                            <h2><?php bloginfo('name'); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="widget-content">
                        <p><?php echo esc_html(get_field('footer_about_text', 'option')); ?></p>

                        <?php if (have_rows('footer_social_links', 'option')) : ?>
                            <div class="social-links">
                                <?php while (have_rows('footer_social_links', 'option')) : the_row(); ?>
                                    <a href="<?php echo esc_url(get_sub_field('url')); ?>" class="social-link" aria-label="Social Media">
                                        <i class="fab <?php echo esc_attr(get_sub_field('icon')); ?>"></i>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="footer-widget links-widget">
                    <h3 class="widget-title">Liens rapides</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'widget-links',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </div>

                <div class="footer-widget">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>

                <div class="footer-widget contact-widget">
                    <h3 class="widget-title">Contact</h3>
                    <?php
                    $contact_info = get_field('footer_contact_info', 'option');
                    if ($contact_info) : ?>
                        <ul class="widget-contact">
                            <?php if (!empty($contact_info['address'])) : ?>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div>
                                        <strong>Adresse</strong>
                                        <p><?php echo nl2br(esc_html($contact_info['address'])); ?></p>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($contact_info['phone'])) : ?>
                                <li>
                                    <i class="fas fa-phone-alt"></i>
                                    <div>
                                        <strong>Téléphone</strong>
                                        <p><?php echo esc_html($contact_info['phone']); ?></p>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($contact_info['email'])) : ?>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <div>
                                        <strong>Email</strong>
                                        <p><?php echo esc_html($contact_info['email']); ?></p>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($contact_info['hours'])) : ?>
                                <li>
                                    <i class="fas fa-clock"></i>
                                    <div>
                                        <strong>Horaires</strong>
                                        <p><?php echo nl2br(esc_html($contact_info['hours'])); ?></p>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-flex">
                <div class="footer-copyright">
                    <?php echo esc_html(get_field('footer_copyright', 'option')); ?>
                </div>
                <div class="footer-payments">
                    <span>Paiements sécurisés</span>
                    <div class="payment-icons">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-paypal"></i>
                        <i class="fab fa-cc-apple-pay"></i>
                    </div>
                </div>
                <div class="footer-back-to-top">
                    <a href="#top" id="scrollTop">
                        <span>Haut de page</span>
                        <i class="fas fa-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>