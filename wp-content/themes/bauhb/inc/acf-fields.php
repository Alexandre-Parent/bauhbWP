<?php
/**
 * Configuration complète des champs ACF pour le thème BAUHB
 * Ce fichier regroupe tous les champs nécessaires pour les différentes sections
 */

if (function_exists('acf_add_local_field_group')) {

    /**
     * Options générales du thème
     */
    acf_add_local_field_group(array(
        'key' => 'group_theme_options',
        'title' => 'Options générales',
        'fields' => array(
            array(
                'key' => 'field_theme_logo',
                'label' => 'Logo du site',
                'name' => 'theme_logo',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'instructions' => 'Téléchargez le logo principal du site.',
            ),
            array(
                'key' => 'field_cta_button_text',
                'label' => 'Texte du bouton d\'appel à l\'action',
                'name' => 'cta_button_text',
                'type' => 'text',
                'default_value' => 'Billetterie',
            ),
            array(
                'key' => 'field_cta_button_url',
                'label' => 'URL du bouton d\'appel à l\'action',
                'name' => 'cta_button_url',
                'type' => 'url',
                'default_value' => '#tickets',
            ),
            array(
                'key' => 'field_primary_color',
                'label' => 'Couleur principale',
                'name' => 'primary_color',
                'type' => 'color_picker',
                'default_value' => '#d72029',
            ),
            array(
                'key' => 'field_secondary_color',
                'label' => 'Couleur secondaire',
                'name' => 'secondary_color',
                'type' => 'color_picker',
                'default_value' => '#063970',
            ),
            array(
                'key' => 'field_highlight_color',
                'label' => 'Couleur d\'accent',
                'name' => 'highlight_color',
                'type' => 'color_picker',
                'default_value' => '#ffcc00',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-options',
                ),
            ),
        ),
    ));

    /**
     * Options du header
     */
    acf_add_local_field_group(array(
        'key' => 'group_header_options',
        'title' => 'Options du header',
        'fields' => array(
            // Options du menu principal si besoin de personnalisation supplémentaire
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-header',
                ),
            ),
        ),
    ));

    /**
     * Options du footer
     */
    acf_add_local_field_group(array(
        'key' => 'group_footer_options',
        'title' => 'Options du footer',
        'fields' => array(
            array(
                'key' => 'field_footer_newsletter_title',
                'label' => 'Titre de la newsletter',
                'name' => 'footer_newsletter_title',
                'type' => 'text',
                'default_value' => 'Restez connecté avec BAUHB',
            ),
            array(
                'key' => 'field_footer_newsletter_text',
                'label' => 'Texte de la newsletter',
                'name' => 'footer_newsletter_text',
                'type' => 'textarea',
                'default_value' => 'Inscrivez-vous à notre newsletter pour recevoir toutes nos actualités et offres exclusives',
            ),
            array(
                'key' => 'field_footer_about_text',
                'label' => 'Texte de présentation',
                'name' => 'footer_about_text',
                'type' => 'textarea',
                'default_value' => 'Depuis 1968, le BAUHB s\'engage à faire vivre le handball au plus haut niveau et à former les champions de demain. Une équipe, une passion, une famille.',
            ),
            array(
                'key' => 'field_footer_social_links',
                'label' => 'Liens sociaux',
                'name' => 'footer_social_links',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Ajouter un réseau social',
                'sub_fields' => array(
                    array(
                        'key' => 'field_social_icon',
                        'label' => 'Icône',
                        'name' => 'icon',
                        'type' => 'text',
                        'instructions' => 'Classe Font Awesome, ex: fa-facebook-f',
                    ),
                    array(
                        'key' => 'field_social_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ),
                ),
            ),
            array(
                'key' => 'field_footer_contact_info',
                'label' => 'Informations de contact',
                'name' => 'footer_contact_info',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_contact_address',
                        'label' => 'Adresse',
                        'name' => 'address',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_contact_phone',
                        'label' => 'Téléphone',
                        'name' => 'phone',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_contact_email',
                        'label' => 'Email',
                        'name' => 'email',
                        'type' => 'email',
                    ),
                    array(
                        'key' => 'field_contact_hours',
                        'label' => 'Horaires',
                        'name' => 'hours',
                        'type' => 'textarea',
                    ),
                ),
            ),
            array(
                'key' => 'field_footer_copyright',
                'label' => 'Texte de copyright',
                'name' => 'footer_copyright',
                'type' => 'text',
                'default_value' => '© 2025 BAUHB - Tous droits réservés',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-footer',
                ),
            ),
        ),
    ));

    /**
     * SECTIONS DE LA PAGE D'ACCUEIL
     * Ces champs sont directement attachés à la page définie comme page d'accueil
     */

    /**
     * Section Bannière Vidéo pour la page d'accueil
     */
    acf_add_local_field_group(array(
        'key' => 'group_homepage_hero',
        'title' => 'Section Bannière Vidéo',
        'fields' => array(
            // Type de fond (vidéo ou image)
            array(
                'key' => 'field_hero_background_type',
                'label' => 'Type de fond',
                'name' => 'hero_background_type',
                'type' => 'radio',
                'instructions' => 'Choisissez entre une vidéo ou une image de fond',
                'required' => 1,
                'choices' => array(
                    'video' => 'Vidéo',
                    'image' => 'Image',
                    'color' => 'Couleur unie',
                ),
                'default_value' => 'video',
                'layout' => 'horizontal',
                'return_format' => 'value',
            ),
            
            // Vidéo d'arrière-plan
            array(
                'key' => 'field_hero_video_url',
                'label' => 'URL de la vidéo d\'arrière-plan',
                'name' => 'hero_video_url',
                'type' => 'url',
                'instructions' => 'URL YouTube de la vidéo d\'arrière-plan (ex: https://www.youtube.com/watch?v=XXXX)',
                'default_value' => 'https://www.youtube.com/watch?v=5-6CUYShLD4',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_background_type',
                            'operator' => '==',
                            'value' => 'video',
                        ),
                    ),
                ),
            ),
            
            // Image d'arrière-plan alternative
            array(
                'key' => 'field_hero_background_image',
                'label' => 'Image d\'arrière-plan',
                'name' => 'hero_background_image',
                'type' => 'image',
                'instructions' => 'Téléchargez une image d\'arrière-plan (recommandé: 1920×1080px minimum)',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_background_type',
                            'operator' => '==',
                            'value' => 'image',
                        ),
                    ),
                ),
            ),
            
        
            
            // Sous-titre
            array(
                'key' => 'field_hero_subtitle',
                'label' => 'Sous-titre',
                'name' => 'hero_subtitle',
                'type' => 'text',
                'instructions' => 'Texte court affiché au-dessus du titre principal',
                'default_value' => 'Prochain match',
                'placeholder' => 'Entrez un sous-titre',
            ),
            
            // Titre principal
            array(
                'key' => 'field_hero_title',
                'label' => 'Titre principal',
                'name' => 'hero_title',
                'type' => 'text',
                'instructions' => 'Titre principal de la bannière',
                'required' => 1,
                'default_value' => 'Vivez l\'expérience handball',
                'placeholder' => 'Titre principal',
            ),
            
            // Description
            array(
                'key' => 'field_hero_description',
                'label' => 'Description',
                'name' => 'hero_description',
                'type' => 'textarea',
                'instructions' => 'Texte descriptif (2-3 lignes maximum)',
                'default_value' => 'Rejoignez-nous pour soutenir notre équipe lors du prochain match de championnat ce samedi à 20h00.',
                'placeholder' => 'Description brève',
                'rows' => 3,
            ),
            
            // Bouton principal - Groupe
            array(
                'key' => 'field_hero_primary_button',
                'label' => 'Bouton principal',
                'name' => 'hero_primary_button',
                'type' => 'group',
                'instructions' => 'Configurez le bouton principal d\'action',
                'layout' => 'block',
                'sub_fields' => array(
                    // Activer/désactiver
                    array(
                        'key' => 'field_primary_button_enable',
                        'label' => 'Afficher le bouton',
                        'name' => 'enable',
                        'type' => 'true_false',
                        'default_value' => 1,
                        'ui' => 1,
                    ),
                    // Texte
                    array(
                        'key' => 'field_primary_button_text',
                        'label' => 'Texte',
                        'name' => 'text',
                        'type' => 'text',
                        'default_value' => 'Billetterie',
                        'placeholder' => 'Texte du bouton',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_primary_button_enable',
                                    'operator' => '==',
                                    'value' => 1,
                                ),
                            ),
                        ),
                    ),
                    // URL
                    array(
                        'key' => 'field_primary_button_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                        'default_value' => '#tickets',
                        'placeholder' => 'https://...',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_primary_button_enable',
                                    'operator' => '==',
                                    'value' => 1,
                                ),
                            ),
                        ),
                    ),
                    // Style
                    array(
                        'key' => 'field_primary_button_style',
                        'label' => 'Style',
                        'name' => 'style',
                        'type' => 'select',
                        'choices' => array(
                            'default' => 'Style par défaut (rouge)',
                            'secondary' => 'Style secondaire (bleu)',
                            'outline' => 'Style contour (blanc)',
                        ),
                        'default_value' => 'default',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_primary_button_enable',
                                    'operator' => '==',
                                    'value' => 1,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            
            // Bouton secondaire - Groupe
            array(
                'key' => 'field_hero_secondary_button',
                'label' => 'Bouton secondaire',
                'name' => 'hero_secondary_button',
                'type' => 'group',
                'instructions' => 'Configurez le bouton secondaire d\'action',
                'layout' => 'block',
                'sub_fields' => array(
                    // Activer/désactiver
                    array(
                        'key' => 'field_secondary_button_enable',
                        'label' => 'Afficher le bouton',
                        'name' => 'enable',
                        'type' => 'true_false',
                        'default_value' => 1,
                        'ui' => 1,
                    ),
                    // Texte
                    array(
                        'key' => 'field_secondary_button_text',
                        'label' => 'Texte',
                        'name' => 'text',
                        'type' => 'text',
                        'default_value' => 'Calendrier',
                        'placeholder' => 'Texte du bouton',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_secondary_button_enable',
                                    'operator' => '==',
                                    'value' => 1,
                                ),
                            ),
                        ),
                    ),
                    // URL
                    array(
                        'key' => 'field_secondary_button_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                        'default_value' => '#matches',
                        'placeholder' => 'https://...',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_secondary_button_enable',
                                    'operator' => '==',
                                    'value' => 1,
                                ),
                            ),
                        ),
                    ),
                    // Style
                    array(
                        'key' => 'field_secondary_button_style',
                        'label' => 'Style',
                        'name' => 'style',
                        'type' => 'select',
                        'choices' => array(
                            'default' => 'Style par défaut (rouge)',
                            'secondary' => 'Style secondaire (bleu)',
                            'outline' => 'Style contour (blanc)',
                        ),
                        'default_value' => 'outline',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_secondary_button_enable',
                                    'operator' => '==',
                                    'value' => 1,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            
            // Alignement du contenu
            array(
                'key' => 'field_hero_content_alignment',
                'label' => 'Alignement du contenu',
                'name' => 'hero_content_alignment',
                'type' => 'select',
                'instructions' => 'Choisissez l\'alignement du texte et des boutons',
                'choices' => array(
                    'left' => 'Gauche',
                    'center' => 'Centre',
                    'right' => 'Droite',
                ),
                'default_value' => 'left',
            ),
            
            // Animation d'entrée
            array(
                'key' => 'field_hero_animation',
                'label' => 'Animation d\'entrée',
                'name' => 'hero_animation',
                'type' => 'select',
                'instructions' => 'Choisissez une animation pour l\'entrée du contenu',
                'choices' => array(
                    'none' => 'Aucune animation',
                    'fade' => 'Fondu',
                    'slide' => 'Glissement',
                    'zoom' => 'Zoom',
                ),
                'default_value' => 'fade',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ));
    
    /**
     * Détails du match
     */
    acf_add_local_field_group(array(
        'key' => 'group_match_details',
        'title' => 'Détails du match',
        'fields' => array(
            array(
                'key' => 'field_match_date_time',
                'label' => 'Date et heure du match',
                'name' => 'match_date',
                'type' => 'date_time_picker',
                'instructions' => 'Sélectionnez la date et l\'heure du match',
                'required' => 1,
                'display_format' => 'd/m/Y H:i',
                'return_format' => 'Y-m-d H:i:s',
            ),
            array(
                'key' => 'field_match_location_type',
                'label' => 'Lieu du match',
                'name' => 'match_location',
                'type' => 'radio',
                'instructions' => 'S\'agit-il d\'un match à domicile ou à l\'extérieur ?',
                'required' => 1,
                'choices' => array(
                    'home' => 'À domicile',
                    'away' => 'À l\'extérieur',
                ),
                'default_value' => 'home',
                'layout' => 'horizontal',
                'return_format' => 'value',
            ),
            array(
                'key' => 'field_match_competition_type',
                'label' => 'Compétition',
                'name' => 'match_competition',
                'type' => 'select',
                'instructions' => 'Sélectionnez la compétition',
                'required' => 1,
                'choices' => array(
                    'Championnat' => 'Championnat',
                    'Coupe de France' => 'Coupe de France',
                    'Coupe de la Ligue' => 'Coupe de la Ligue',
                    'Coupe d\'Europe' => 'Coupe d\'Europe',
                    'Trophée des Champions' => 'Trophée des Champions',
                    'Amical' => 'Match amical',
                    'Tournoi' => 'Tournoi',
                    'Autre' => 'Autre compétition',
                ),
                'default_value' => 'Championnat',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'return_format' => 'value',
            ),
            
            // ÉQUIPE DU CLUB
            array(
                'key' => 'field_match_team_selection',
                'label' => 'Équipe du club',
                'name' => 'match_team',
                'type' => 'post_object',
                'instructions' => 'Sélectionnez l\'équipe du club qui joue ce match',
                'required' => 1,
                'post_type' => array(
                    0 => 'team',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'id',
                'ui' => 1,
            ),
            
            // ADVERSAIRE - CHOIX DU TYPE
            array(
                'key' => 'field_match_opponent_type_selection',
                'label' => 'Type d\'adversaire',
                'name' => 'match_opponent_type',
                'type' => 'radio',
                'instructions' => 'Choisir un adversaire existant ou créer un adversaire personnalisé',
                'required' => 1,
                'choices' => array(
                    'existing' => 'Adversaire existant',
                    'custom' => 'Adversaire personnalisé',
                ),
                'default_value' => 'existing',
                'layout' => 'horizontal',
                'return_format' => 'value',
            ),
            
            // ADVERSAIRE EXISTANT
            array(
                'key' => 'field_match_opponent_selection',
                'label' => 'Équipe adverse',
                'name' => 'match_opponent',
                'type' => 'post_object',
                'instructions' => 'Sélectionnez l\'équipe adverse',
                'post_type' => array(
                    0 => 'opponent',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'id',
                'ui' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_match_opponent_type_selection',
                            'operator' => '==',
                            'value' => 'existing',
                        ),
                    ),
                ),
            ),
            
            // ADVERSAIRE PERSONNALISÉ
            array(
                'key' => 'field_match_custom_opponent_group',
                'label' => 'Adversaire personnalisé',
                'name' => 'match_custom_opponent',
                'type' => 'group',
                'instructions' => 'Entrez les informations de l\'adversaire',
                'layout' => 'block',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_match_opponent_type_selection',
                            'operator' => '==',
                            'value' => 'custom',
                        ),
                    ),
                ),
                'sub_fields' => array(
                    array(
                        'key' => 'field_custom_opponent_name_text',
                        'label' => 'Nom de l\'équipe',
                        'name' => 'name',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_custom_opponent_logo_img',
                        'label' => 'Logo',
                        'name' => 'logo',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                    ),
                    array(
                        'key' => 'field_custom_opponent_division_text',
                        'label' => 'Division',
                        'name' => 'division',
                        'type' => 'text',
                    ),
                ),
            ),
            
            // LIEU DU MATCH
            array(
                'key' => 'field_match_venue_name',
                'label' => 'Nom du stade/salle',
                'name' => 'match_venue',
                'type' => 'text',
                'instructions' => 'Nom du stade ou de la salle où se déroule le match',
                'required' => 1,
                'default_value' => 'Le Phare',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_match_location_type',
                            'operator' => '==',
                            'value' => 'home',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_match_away_venue_name',
                'label' => 'Nom du stade/salle adverse',
                'name' => 'match_away_venue',
                'type' => 'text',
                'instructions' => 'Nom du stade ou de la salle où se déroule le match',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_match_location_type',
                            'operator' => '==',
                            'value' => 'away',
                        ),
                    ),
                ),
            ),
            
            // BILLETTERIE
            array(
                'key' => 'field_match_ticket_url_link',
                'label' => 'URL billetterie',
                'name' => 'match_ticket_url',
                'type' => 'url',
                'instructions' => 'URL de la page de réservation des billets pour ce match',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_match_location_type',
                            'operator' => '==',
                            'value' => 'home',
                        ),
                    ),
                ),
            ),
            
            // INFORMATIONS COMPLÉMENTAIRES
            array(
                'key' => 'field_match_details_group',
                'label' => 'Informations complémentaires',
                'name' => 'match_details',
                'type' => 'group',
                'instructions' => 'Informations supplémentaires sur le match',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_match_tv_text',
                        'label' => 'Diffusion TV',
                        'name' => 'tv',
                        'type' => 'text',
                        'instructions' => 'Chaîne TV ou plateforme de diffusion',
                    ),
                    array(
                        'key' => 'field_match_special_event_text',
                        'label' => 'Événement spécial',
                        'name' => 'special_event',
                        'type' => 'text',
                        'instructions' => 'Animation particulière pour ce match (ex: Jour de fête, Pink Day...)',
                    ),
                    array(
                        'key' => 'field_match_notes_text',
                        'label' => 'Notes internes',
                        'name' => 'notes',
                        'type' => 'textarea',
                        'instructions' => 'Notes internes (non affichées sur le site)',
                    ),
                ),
            ),
            
            // STATUT DU MATCH
            array(
                'key' => 'field_match_status_select',
                'label' => 'Statut du match',
                'name' => 'match_status',
                'type' => 'select',
                'instructions' => 'Statut actuel du match',
                'required' => 1,
                'choices' => array(
                    'upcoming' => 'À venir',
                    'live' => 'En cours',
                    'completed' => 'Terminé',
                    'postponed' => 'Reporté',
                    'canceled' => 'Annulé',
                ),
                'default_value' => 'upcoming',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'return_format' => 'value',
            ),
            
            // RÉSULTATS (si match terminé)
            array(
                'key' => 'field_match_result_group',
                'label' => 'Résultat du match',
                'name' => 'match_result',
                'type' => 'group',
                'instructions' => 'Score et statistiques du match',
                'layout' => 'block',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_match_status_select',
                            'operator' => '==',
                            'value' => 'completed',
                        ),
                    ),
                    array(
                        array(
                            'field' => 'field_match_status_select',
                            'operator' => '==',
                            'value' => 'live',
                        ),
                    ),
                ),
                'sub_fields' => array(
                    array(
                        'key' => 'field_match_home_score_num',
                        'label' => 'Score BAUHB',
                        'name' => 'home_score',
                        'type' => 'number',
                        'required' => 1,
                        'default_value' => 0,
                        'min' => 0,
                    ),
                    array(
                        'key' => 'field_match_away_score_num',
                        'label' => 'Score adversaire',
                        'name' => 'away_score',
                        'type' => 'number',
                        'required' => 1,
                        'default_value' => 0,
                        'min' => 0,
                    ),
                    array(
                        'key' => 'field_match_half_time_score_text',
                        'label' => 'Score à la mi-temps',
                        'name' => 'half_time_score',
                        'type' => 'text',
                        'instructions' => 'Format: 15-12',
                    ),
                    array(
                        'key' => 'field_match_summary_wysiwyg',
                        'label' => 'Résumé du match',
                        'name' => 'summary',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                    ),
                ),
            ),
            
            // MÉDIAS (si match terminé)
            array(
                'key' => 'field_match_media_group',
                'label' => 'Médias',
                'name' => 'match_media',
                'type' => 'group',
                'instructions' => 'Photos et vidéos du match',
                'layout' => 'block',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_match_status_select',
                            'operator' => '==',
                            'value' => 'completed',
                        ),
                    ),
                ),
                'sub_fields' => array(
                    array(
                        'key' => 'field_match_gallery_imgs',
                        'label' => 'Galerie photos',
                        'name' => 'gallery',
                        'type' => 'gallery',
                        'instructions' => 'Photos du match',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                    ),
                    array(
                        'key' => 'field_match_highlight_video_url',
                        'label' => 'Vidéo résumé',
                        'name' => 'highlight_video',
                        'type' => 'url',
                        'instructions' => 'URL YouTube de la vidéo de résumé du match',
                    ),
                    array(
                        'key' => 'field_match_press_repeater',
                        'label' => 'Articles de presse',
                        'name' => 'press',
                        'type' => 'repeater',
                        'button_label' => 'Ajouter un article',
                        'layout' => 'table',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_press_title_text',
                                'label' => 'Titre',
                                'name' => 'title',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_press_url_link',
                                'label' => 'URL',
                                'name' => 'url',
                                'type' => 'url',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_press_source_text',
                                'label' => 'Source',
                                'name' => 'source',
                                'type' => 'text',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'match',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'the_content',
        ),
    ));

    /**
     * Champs pour les équipes adverses
     */
    acf_add_local_field_group(array(
        'key' => 'group_opponent_details',
        'title' => 'Informations de l\'équipe adverse',
        'fields' => array(
            array(
                'key' => 'field_opponent_official_name',
                'label' => 'Nom officiel',
                'name' => 'opponent_official_name',
                'type' => 'text',
                'instructions' => 'Nom officiel complet du club',
                'required' => 1,
            ),
            array(
                'key' => 'field_opponent_short_name',
                'label' => 'Nom court',
                'name' => 'opponent_short_name',
                'type' => 'text',
                'instructions' => 'Version courte ou abréviation du nom (à afficher dans les scores)',
                'required' => 1,
            ),
            array(
                'key' => 'field_opponent_logo',
                'label' => 'Logo du club',
                'name' => 'opponent_logo',
                'type' => 'image',
                'instructions' => 'Logo du club adverse',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_opponent_division',
                'label' => 'Division',
                'name' => 'opponent_division',
                'type' => 'select',
                'instructions' => 'Division dans laquelle évolue l\'équipe',
                'required' => 1,
                'choices' => array(
                    'D1M' => 'Division 1 Masculine (Starligue)',
                    'D2M' => 'Division 2 Masculine (Proligue)',
                    'NM1' => 'Nationale 1 Masculine',
                    'NM2' => 'Nationale 2 Masculine',
                    'NM3' => 'Nationale 3 Masculine',
                    'PREM' => 'Pré-Nationale Masculine',
                    'D1F' => 'Division 1 Féminine',
                    'D2F' => 'Division 2 Féminine',
                    'NF1' => 'Nationale 1 Féminine',
                    'NF2' => 'Nationale 2 Féminine',
                    'NF3' => 'Nationale 3 Féminine',
                    'PREF' => 'Pré-Nationale Féminine',
                    'DEP' => 'Départementale',
                    'U18M' => '-18 ans Masculin',
                    'U18F' => '-18 ans Féminin',
                    'U15M' => '-15 ans Masculin',
                    'U15F' => '-15 ans Féminin',
                    'U13M' => '-13 ans Masculin',
                    'U13F' => '-13 ans Féminin',
                    'U11M' => '-11 ans Masculin',
                    'U11F' => '-11 ans Féminin',
                    'U9' => '-9 ans Mixte',
                    'OTHER' => 'Autre',
                ),
                'default_value' => 'NM1',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'value',
            ),
            array(
                'key' => 'field_opponent_city',
                'label' => 'Ville',
                'name' => 'opponent_city',
                'type' => 'text',
                'instructions' => 'Ville du club',
            ),
            array(
                'key' => 'field_opponent_website',
                'label' => 'Site Web',
                'name' => 'opponent_website',
                'type' => 'url',
                'instructions' => 'URL du site web du club',
            ),
            array(
                'key' => 'field_opponent_venue',
                'label' => 'Salle',
                'name' => 'opponent_venue',
                'type' => 'text',
                'instructions' => 'Nom de la salle où joue l\'équipe adverse',
            ),
            array(
                'key' => 'field_opponent_venue_address',
                'label' => 'Adresse de la salle',
                'name' => 'opponent_venue_address',
                'type' => 'textarea',
                'instructions' => 'Adresse complète de la salle',
                'rows' => 3,
            ),
            array(
                'key' => 'field_opponent_history',
                'label' => 'Historique des confrontations',
                'name' => 'opponent_history',
                'type' => 'repeater',
                'instructions' => 'Historique des rencontres avec ce club',
                'layout' => 'table',
                'button_label' => 'Ajouter une rencontre',
                'sub_fields' => array(
                    array(
                        'key' => 'field_history_match_date',
                        'label' => 'Date',
                        'name' => 'date',
                        'type' => 'date_picker',
                        'required' => 1,
                        'display_format' => 'd/m/Y',
                        'return_format' => 'Y-m-d',
                    ),
                    array(
                        'key' => 'field_history_match_competition',
                        'label' => 'Compétition',
                        'name' => 'competition',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_history_match_home',
                        'label' => 'À domicile',
                        'name' => 'home',
                        'type' => 'true_false',
                        'ui' => 1,
                    ),
                    array(
                        'key' => 'field_history_match_score_home',
                        'label' => 'Score BAUHB',
                        'name' => 'score_home',
                        'type' => 'number',
                    ),
                    array(
                        'key' => 'field_history_match_score_away',
                        'label' => 'Score Adversaire',
                        'name' => 'score_away',
                        'type' => 'number',
                    ),
                ),
            ),
            array(
                'key' => 'field_opponent_notes',
                'label' => 'Notes',
                'name' => 'opponent_notes',
                'type' => 'textarea',
                'instructions' => 'Notes particulières sur cette équipe',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'opponent',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));
}