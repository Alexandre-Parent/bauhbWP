/**
 * JavaScript principal pour le thème BAUHB
 */
(function($) {
    'use strict';

    // Initialisation lors du chargement de la page
    $(document).ready(function() {
        // Initialisation de AOS (Animation On Scroll)
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }

        // Navigation mobile
        const navToggle = $('#navToggle');
        const mainNav = $('#mainNav');
        
        navToggle.on('click', function() {
            mainNav.toggleClass('active');
            // Change l'icône du menu
            $(this).find('i').toggleClass('fa-bars fa-times');
        });

        // Header sticky et transparent au scroll
        const headerMain = $('#headerMain');
        
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 100) {
                headerMain.addClass('scrolled');
            } else {
                headerMain.removeClass('scrolled');
            }
        });

        // Initialisation du bouton Retour en haut
        const scrollTop = $('#scrollTop');
        
        scrollTop.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 800);
        });

        // Filtrage des produits par catégorie
        $('.shop-category').on('click', function() {
            const category = $(this).data('category');
            
            $('.shop-category').removeClass('active');
            $(this).addClass('active');
            
            // Si un système de filtrage est implémenté, ajouter ici
        });

        // Animation de survol des équipes dans la section match
        $('.next-match-team').hover(
            function() {
                $(this).find('.next-match-team-logo').css('opacity', '1');
            },
            function() {
                $(this).find('.next-match-team-logo').css('opacity', '0.9');
            }
        );

        // Gestion des vidéos (ouvre une modal ou redirection)
        $('.video-play').on('click', function(e) {
            // Selon l'implémentation souhaitée, vous pouvez ajouter ici
            // Par exemple, ouvrir une fenêtre modale avec la vidéo
        });

        // Gestion des boutons d'action produit
        $('.product-action').on('click', function(e) {
            e.preventDefault();
            // Selon l'action (recherche, favori, etc.)
        });
    });

})(jQuery);