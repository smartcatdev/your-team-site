<?php

// ---------------------------------------------
// Frontpage Content Panel
// ---------------------------------------------
$wp_customize->add_panel( 'ytre_front_page_panel', array (
    'title'                 => __( 'Frontpage Content', 'ytre' ),
    'description'           => __( 'Customize the appearance of your front page', 'ytre' ),
    'priority'              => 10
) );
    
// ---------------------------------------------
// Jumbotron Settings
// ---------------------------------------------
$wp_customize->add_section( 'ytre_jumbotron_general_section', array(
    'title'                 => __( 'Jumbotron Settings', 'ytre'),
    'description'           => __( 'Customize the front page Jumbotron', 'ytre' ),
    'panel'                 => 'ytre_front_page_panel'
) );

    // Jumbotron Visibility Toggle
    $wp_customize->add_setting( 'ytre_jumbotron_visibility_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_visibility_toggle', array(
        'type'                  => 'radio',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Show the Jumbotron section?', 'ytre' ),
        'choices'               => array(
            'show'      => __( 'Show', 'ytre' ),
            'hide'      => __( 'Hide', 'ytre' ),
    ) ) );

    // Jumbotron Video - YouTube ID
    $wp_customize->add_setting( 'ytre_jumbo_video_id', array (
        'default'               => 'AK-MUzWdpjU',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_jumbo_video_id', array(
        'type'                  => 'text',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'YouTube Video - ID Code', 'ytre' ),
        'description'           => __( 'This code can be found in the URL of a YouTube video, like the XXXXXXXX in https://www.youtube.com/watch?v=XXXXXXXX', 'ytre' ),
    ) );
    
    // Jumbotron Height
    $wp_customize->add_setting( 'ytre_jumbotron_height', array (
        'default'               => 400,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_integer',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_height', array(
        'type'                  => 'number',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Jumbotron Height', 'ytre' ),
        'description'           => __( 'The default of 400 is recommended for the best responsiveness, but this can be used to make adjuistments.', 'ytre' ),
        'input_attrs'           => array(
            'min' => 300,
            'max' => 600,
            'step' => 50,
    ) ) );

    // Dark Tint Overlay
    $wp_customize->add_setting( 'ytre_jumbotron_dark_tint', array (
        'default'               => .5,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_overlay_decimal',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_dark_tint', array(
        'type'                  => 'number',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Dark Tinted Overlay', 'ytre' ),
        'description'           => __( 'Adjust the amount of dark tint to apply to slider images, from 0.0 for no tint to 1.0 for solid black, or anything in between', 'ytre' ),
        'input_attrs'           => array(
            'min' => .0,
            'max' => 1.0,
            'step' => .05,
    ) ) );
    
    // Jumbotron Title - Size
    $wp_customize->add_setting( 'ytre_jumbotron_title_size', array (
        'default'               => 30,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_integer',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_title_size', array(
        'type'                  => 'range',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Title - Font Size', 'ytre' ),
        'input_attrs'           => array(
            'min' => 10,
            'max' => 64,
            'step' => 2,
    ) ) );
    
    // Jumbotron Button 1 - Label
    $wp_customize->add_setting( 'ytre_jumbotron_button_1_label', array (
        'default'               => __( 'Call', 'ytre' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_button_1_label', array(
        'type'                  => 'text',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Button 1 - Label', 'ytre' ),
    ) );

    // Jumbotron Button 1 - URL
    $wp_customize->add_setting( 'ytre_jumbotron_button_1_url', array (
        'default'               => '#',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_button_1_url', array(
        'type'                  => 'text',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Button 1 - URL', 'ytre' ),
    ) );

    // Jumbotron Button 1 - Target
    $wp_customize->add_setting( 'ytre_jumbotron_button_1_target', array (
        'default'               => 'same',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_link_target',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_button_1_target', array(
        'type'                  => 'radio',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Button 1 - Open in New Window?', 'ytre' ),
        'choices'               => array(
            'same'      => __( 'Same Window', 'ytre' ),
            'new'       => __( 'New Window', 'ytre' ),
    ) ) );
    
    // Jumbotron Button 2 - Label
    $wp_customize->add_setting( 'ytre_jumbotron_button_2_label', array (
        'default'               => __( 'Email', 'ytre' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_button_2_label', array(
        'type'                  => 'text',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Button 2 - Label', 'ytre' ),
    ) );

    // Jumbotron Button 2 - URL
    $wp_customize->add_setting( 'ytre_jumbotron_button_2_url', array (
        'default'               => '#',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_button_2_url', array(
        'type'                  => 'text',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Button 2 - URL', 'ytre' ),
    ) );

    // Jumbotron Button 2 - Target
    $wp_customize->add_setting( 'ytre_jumbotron_button_2_target', array (
        'default'               => 'same',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_link_target',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_button_2_target', array(
        'type'                  => 'radio',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Button 2 - Open in New Window?', 'ytre' ),
        'choices'               => array(
            'same'      => __( 'Same Window', 'ytre' ),
            'new'       => __( 'New Window', 'ytre' ),
    ) ) );
    
    // Jumbotron Button 3 - Label
    $wp_customize->add_setting( 'ytre_jumbotron_button_3_label', array (
        'default'               => __( 'Live Chat', 'ytre' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_button_3_label', array(
        'type'                  => 'text',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Button 3 - Label', 'ytre' ),
    ) );

    // Jumbotron Button 3 - URL
    $wp_customize->add_setting( 'ytre_jumbotron_button_3_url', array (
        'default'               => '#',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_button_3_url', array(
        'type'                  => 'text',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Button 3 - URL', 'ytre' ),
    ) );

    // Jumbotron Button 3 - Target
    $wp_customize->add_setting( 'ytre_jumbotron_button_3_target', array (
        'default'               => 'same',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_link_target',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_button_3_target', array(
        'type'                  => 'radio',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Button 3 - Open in New Window?', 'ytre' ),
        'choices'               => array(
            'same'      => __( 'Same Window', 'ytre' ),
            'new'       => __( 'New Window', 'ytre' ),
    ) ) );

    // Jumbotron Tagline Section
    $wp_customize->add_setting( 'ytre_jumbotron_tagline', array (
        'default'               => __( 'Your Team... Making Dreams a Reality', 'ytre' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_jumbotron_tagline', array(
        'type'                  => 'text',
        'section'               => 'ytre_jumbotron_general_section',
        'label'                 => __( 'Tagline Banner - Text', 'ytre' ),
    ) );
    
// ---------------------------------------------
// Featured Listings Section
// ---------------------------------------------
$wp_customize->add_section( 'ytre_featured_listings_section', array(
    'title'                 => __( 'Featured Listings Section', 'ytre'),
    'description'           => __( 'Customize the front page "Featured Listings" section', 'ytre' ),
    'panel'                 => 'ytre_front_page_panel'
) );

    // Featured Listings Section Visibility Toggle
    $wp_customize->add_setting( 'ytre_featured_listings_visibility_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'ytre_featured_listings_visibility_toggle', array(
        'type'                  => 'radio',
        'section'               => 'ytre_featured_listings_section',
        'label'                 => __( 'Show the "Featured Listings" section?', 'ytre' ),
        'choices'               => array(
            'show'      => __( 'Show', 'ytre' ),
            'hide'      => __( 'Hide', 'ytre' ),
    ) ) );

//    // Featured Listings Heading Text
//    $wp_customize->add_setting( 'ytre_featured_listing_heading_text', array (
//        'default'               => __( 'Featured Listings', 'ytre' ),
//        'transport'             => 'refresh',
//        'sanitize_callback'     => 'ytre_sanitize_text',
//    ) );
//    $wp_customize->add_control( 'ytre_featured_listing_heading_text', array(
//        'type'                  => 'text',
//        'section'               => 'ytre_featured_listings_section',
//        'label'                 => __( 'Section Heading Text', 'ytre' ),
//    ) );
//    
//    // Featured Listing - Content Trim Words
//    $wp_customize->add_setting( 'ytre_featured_listings_trim', array (
//        'default'               => 50,
//        'transport'             => 'refresh',
//        'sanitize_callback'     => 'ytre_sanitize_integer',
//    ) );
//    $wp_customize->add_control( 'ytre_featured_listings_trim', array(
//        'type'                  => 'number',
//        'section'               => 'ytre_featured_listings_section',
//        'label'                 => __( 'Trim Listing Excerpt', 'ytre' ),
//        'description'           => __( 'Number of words output will be limited to this value.', 'ytre' ),
//        'input_attrs'           => array(
//            'min' => 0,
//            'max' => 500,
//            'step' => 5,
//    ) ) );