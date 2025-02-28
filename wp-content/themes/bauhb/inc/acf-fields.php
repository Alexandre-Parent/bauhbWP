<?php

/**
 * Configuration des champs ACF pour le thème BAUHB
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
                'default_value' => ' 2025 BAUHB - Tous droits réservés',
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
     * Options de la page d'accueil - Section Héro
     */
    acf_add_local_field_group(array(
        'key' => 'group_homepage_hero',
        'title' => 'Section Héro',
        'fields' => array(
            array(
                'key' => 'field_hero_video_url',
                'label' => 'URL de la vidéo d\'arrière-plan',
                'name' => 'hero_video_url',
                'type' => 'url',
                'default_value' => 'https://www.youtube.com/embed/5-6CUYShLD4',
                'instructions' => 'URL YouTube de la vidéo d\'arrière-plan',
            ),
            array(
                'key' => 'field_hero_subtitle',
                'label' => 'Sous-titre',
                'name' => 'hero_subtitle',
                'type' => 'text',
                'default_value' => 'Prochain match',
            ),
            array(
                'key' => 'field_hero_title',
                'label' => 'Titre principal',
                'name' => 'hero_title',
                'type' => 'text',
                'default_value' => 'Vivez l\'expérience handball',
            ),
            array(
                'key' => 'field_hero_description',
                'label' => 'Description',
                'name' => 'hero_description',
                'type' => 'textarea',
                'default_value' => 'Rejoignez-nous pour soutenir notre équipe lors du prochain match de championnat ce samedi à 20h00.',
            ),
            array(
                'key' => 'field_hero_primary_button',
                'label' => 'Bouton principal',
                'name' => 'hero_primary_button',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_primary_button_text',
                        'label' => 'Texte',
                        'name' => 'text',
                        'type' => 'text',
                        'default_value' => 'Billetterie',
                    ),
                    array(
                        'key' => 'field_primary_button_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                        'default_value' => '#tickets',
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_secondary_button',
                'label' => 'Bouton secondaire',
                'name' => 'hero_secondary_button',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_secondary_button_text',
                        'label' => 'Texte',
                        'name' => 'text',
                        'type' => 'text',
                        'default_value' => 'Calendrier',
                    ),
                    array(
                        'key' => 'field_secondary_button_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                        'default_value' => '#matches',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-page-daccueil',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    /**
     * Options de la page d'accueil - Section Prochain Match
     */
    acf_add_local_field_group(array(
        'key' => 'group_homepage_next_match',
        'title' => 'Section Prochain Match',
        'fields' => array(
            array(
                'key' => 'field_next_match_date',
                'label' => 'Date du match',
                'name' => 'next_match_date',
                'type' => 'date_time_picker',
                'display_format' => 'd/m/Y H:i',
                'return_format' => 'Y-m-d H:i:s',
                'instructions' => 'Sélectionnez la date et l\'heure du prochain match',
            ),
            array(
                'key' => 'field_next_match_home_team',
                'label' => 'Équipe à domicile',
                'name' => 'next_match_home_team',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_home_team_name',
                        'label' => 'Nom',
                        'name' => 'name',
                        'type' => 'text',
                        'default_value' => 'BAUHB',
                    ),
                    array(
                        'key' => 'field_home_team_logo',
                        'label' => 'Logo',
                        'name' => 'logo',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                    ),
                ),
            ),
            array(
                'key' => 'field_next_match_away_team',
                'label' => 'Équipe adverse',
                'name' => 'next_match_away_team',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_away_team_name',
                        'label' => 'Nom',
                        'name' => 'name',
                        'type' => 'text',
                        'default_value' => 'HB MÉTROPOLE',
                    ),
                    array(
                        'key' => 'field_away_team_logo',
                        'label' => 'Logo',
                        'name' => 'logo',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                    ),
                ),
            ),
            array(
                'key' => 'field_next_match_venue',
                'label' => 'Lieu du match',
                'name' => 'next_match_venue',
                'type' => 'text',
                'default_value' => 'Le Phare',
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
    ));
}
