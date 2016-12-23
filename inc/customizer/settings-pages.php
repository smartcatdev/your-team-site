<?php

// ---------------------------------------------
// Pages Panel
// ---------------------------------------------
$wp_customize->add_panel( 'ytre_pages_panel', array (
    'title'                 => __( 'Pages', 'ytre' ),
    'description'           => __( 'Customize the appearance of the custom page templates', 'ytre' ),
    'priority'              => 10
) );
    
// ---------------------------------------------
// Contact Us - Section
// ---------------------------------------------
$wp_customize->add_section( 'ytre_page_contact_us_section', array(
    'title'                 => __( 'Contact Us', 'ytre'),
    'description'           => __( 'Customize the Contact Us page', 'ytre' ),
    'panel'                 => 'ytre_pages_panel'
) );

    // Contact Us Blurb
    $wp_customize->add_setting( 'ytre_contact_us_blurb', array (
        'default'               => __( 'Your Team is always available to work with you.', 'ytre' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_contact_us_blurb', array(
        'type'                  => 'text',
        'section'               => 'ytre_page_contact_us_section',
        'label'                 => __( 'Contact Us Blurb', 'ytre' ),
    ) );
    
// ---------------------------------------------
// Events - Section
// ---------------------------------------------
$wp_customize->add_section( 'ytre_page_events_section', array(
    'title'                 => __( 'Events', 'ytre'),
    'description'           => __( 'Customize the Events page', 'ytre' ),
    'panel'                 => 'ytre_pages_panel'
) );

    // Events Blurb
    $wp_customize->add_setting( 'ytre_events_blurb', array (
        'default'               => __( 'Your Team is actively involved in our community. Here are some upcoming events.', 'ytre' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_events_blurb', array(
        'type'                  => 'text',
        'section'               => 'ytre_page_events_section',
        'label'                 => __( 'Events Blurb', 'ytre' ),
    ) );
    
// ---------------------------------------------
// Team - Section
// ---------------------------------------------
$wp_customize->add_section( 'ytre_page_team_section', array(
    'title'                 => __( 'Team', 'ytre'),
    'description'           => __( 'Customize the Events page', 'ytre' ),
    'panel'                 => 'ytre_pages_panel'
) );

    // Team Photo Blurb
    $wp_customize->add_setting( 'ytre_team_photo_head_blurb', array (
        'default'               => __( 'Learn as much or as little as you want to know about Your Team right here.', 'ytre' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_team_photo_head_blurb', array(
        'type'                  => 'text',
        'section'               => 'ytre_page_team_section',
        'label'                 => __( 'Team Photo Heading Blurb', 'ytre' ),
    ) );
    
    // Team Photo Image
    $wp_customize->add_setting( 'ytre_team_photo', array (
        'default'               => get_template_directory_uri() . '/inc/images/your-team-photo-cropped.jpg',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ytre_team_photo', array (
        'settings'              => 'ytre_team_photo',
        'mime_type'             => 'image',
        'section'               => 'ytre_page_team_section',
        'label' =>              __( 'Team Photo Image', 'ytre' ),
        'description'           => __( 'IMPORTANT: This uses an image map to track member locations. Uploading a new image will require a new image map, to override the one in page-team.php', 'ytre' ),
    ) ) );