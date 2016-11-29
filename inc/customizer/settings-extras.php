<?php

// ---------------------------------------------
// General Panel
// ---------------------------------------------
$wp_customize->add_panel( 'ytre_extras_panel', array (
    'title'                 => __( 'Extras', 'ytre' ),
    'description'           => __( 'Customize the extras of your site', 'ytre' ),
    'priority'              => 10
) );

// ---------------------------------------------
// 404 Error Page Section
// ---------------------------------------------
$wp_customize->add_section( 'ytre_error_page_section', array(
    'title'                 => __( '404 Error Page', 'ytre'),
    'description'           => __( 'Customize the 404 error page appearance', 'ytre' ),
    'panel'                 => 'ytre_extras_panel'
) );
 
    // Error Page Primary Heading
    $wp_customize->add_setting( 'ytre_error_page_heading', array (
        'default'               => __( 'Oops!', 'ytre' ),
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_error_page_heading', array(
        'type'                  => 'text',
        'section'               => 'ytre_error_page_section',
        'label'                 => __( 'The primary error page heading', 'ytre' ),
    ) );   

    // Error Page Secondary Heading
    $wp_customize->add_setting( 'ytre_error_page_subheading', array (
        'default'               => __( 'It looks like nothing was found at this location, please check the address and try again!', 'ytre' ),
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_error_page_subheading', array(
        'type'                  => 'text',
        'section'               => 'ytre_error_page_section',
        'label'                 => __( 'The secondary, smaller error page heading', 'ytre' ),
    ) );   

    // Error Page Search Heading
    $wp_customize->add_setting( 'ytre_error_page_search_heading', array (
        'default'               => __( 'Search for something new?', 'ytre' ),
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_error_page_search_heading', array(
        'type'                  => 'text',
        'section'               => 'ytre_error_page_section',
        'label'                 => __( 'The error page heading over the Search Bar', 'ytre' ),
    ) );   
    
    
// ---------------------------------------------
// Google Maps
// ---------------------------------------------
$wp_customize->add_section( 'ytre_google_maps_section', array (
    'title'                 => __( 'Google Maps', 'ytre' ),
    'description'           => __( 'Settings for the Google Maps feature', 'ytre' ),
    'panel'                 => 'ytre_extras_panel',
) );

    // Google Maps API Key
    $wp_customize->add_setting( 'ytre_google_maps_api_key', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_google_maps_api_key', array(
        'type'                  => 'text',
        'section'               => 'ytre_google_maps_section',
        'label'                 => __( 'Google Maps JavaScript API Key', 'ytre' ),
        'description'           => __( 'Visit https://developers.google.com/maps/documentation/javascript/get-api-key#key', 'ytre' ),
    ) );

    // Google Maps Title
    $wp_customize->add_setting( 'ytre_google_maps_title', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_google_maps_title', array(
        'type'                  => 'text',
        'section'               => 'ytre_google_maps_section',
        'label'                 => __( 'Title (for location marker)', 'ytre' ),
    ) );
    
    // Google Maps Address
    $wp_customize->add_setting( 'ytre_google_maps_address', array (
        'default'               => 'Kingston, ON',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_google_maps_address', array(
        'type'                  => 'text',
        'section'               => 'ytre_google_maps_section',
        'label'                 => __( 'Address (for map center)', 'ytre' ),
    ) );
    
    // Footer Map Style
    $wp_customize->add_setting( 'ytre_google_maps_style', array (
        'default'               => '[{"featureType":"all","elementType":"geometry.stroke","stylers":[{"color":"#818a89"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40},{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#7c8382"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#818a89"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#818a89"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#222322"},{"lightness":17},{"weight":"0.46"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#191919"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#818a89"},{"lightness":17}]}]',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_text',
    ) );
    $wp_customize->add_control( 'ytre_google_maps_style', array(
        'type'                  => 'textarea',
        'section'               => 'ytre_google_maps_section',
        'label'                 => __( 'Style Code (visit snazzymaps.com)', 'ytre' ),
    ) );
    
    // Footer Map Icon
    $wp_customize->add_setting( 'ytre_google_maps_icon', array (
        'default'               => get_template_directory_uri() . '/inc/images/map-pointer.png',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ytre_google_maps_icon', array (
        'mime_type'             => 'image',
        'settings'              => 'ytre_google_maps_icon',
        'section'               => 'ytre_google_maps_section',
        'label'                 => __( 'Google Maps - Location Marker Icon', 'ytre' ),
    ) ) );