<?php

// ---------------------------------------------
// Site Appearance Panel
// ---------------------------------------------
$wp_customize->add_panel( 'ytre_appearance_panel', array (
    'title'                 => __( 'Appearance', 'ytre' ),
    'description'           => __( 'Customize your site colors, fonts and other appearance settings', 'ytre' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Colors
// ---------------------------------------------
$wp_customize->add_section( 'ytre_colors_section', array(
    'title'                 => __( 'Colors', 'ytre'),
    'description'           => __( 'Customize the colors in use on your site', 'ytre' ),
    'panel'                 => 'ytre_appearance_panel'
) );

    // Primary Skin Color
    $wp_customize->add_setting( 'ytre_theme_color_primary', array (
        'default'               => '#3492c6',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_color',
    ) );
    $wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'ytre_theme_color_primary', array(
            'label'      => __( 'Theme Color: Primary', 'ytre' ),
            'section'    => 'ytre_colors_section',
            'settings'   => 'ytre_theme_color_primary',
	) ) 
    );     

    // Secondary Skin Color
    $wp_customize->add_setting( 'ytre_theme_color_secondary', array (
        'default'               => '#ef5858',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_color',
    ) );
    $wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'ytre_theme_color_secondary', array(
            'label'      => __( 'Theme Color: Secondary', 'ytre' ),
            'section'    => 'ytre_colors_section',
            'settings'   => 'ytre_theme_color_secondary',
	) ) 
    );     

    // Secondary Accent Skin Color
    $wp_customize->add_setting( 'ytre_theme_color_secondary_accent', array (
        'default'               => '#b52c2c',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_color',
    ) );
    $wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'ytre_theme_color_secondary_accent', array(
            'label'         => __( 'Theme Color: Secondary Accent', 'ytre' ),
            'description'   => __( 'This should be a darker variant of the Secondary color', 'ytre' ),
            'section'       => 'ytre_colors_section',
            'settings'      => 'ytre_theme_color_secondary_accent',
	) ) 
    );     
    
    // Dark Skin Color
    $wp_customize->add_setting( 'ytre_theme_color_dark', array (
        'default'               => '#050e1a',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_color',
    ) );
    $wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'ytre_theme_color_dark', array(
            'label'      => __( 'Theme Color: Dark', 'ytre' ),
            'section'    => 'ytre_colors_section',
            'settings'   => 'ytre_theme_color_dark',
	) ) 
    );     

// ---------------------------------------------
// Fonts
// ---------------------------------------------
$wp_customize->add_section( 'ytre_fonts_section', array(
    'title'                 => __( 'Fonts', 'ytre'),
    'description'           => __( 'Customize the fonts in use on your site', 'ytre' ),
    'panel'                 => 'ytre_appearance_panel'
) );

    // Primary Font Family
    $wp_customize->add_setting( 'ytre_font_primary', array (
        'default'               => 'Montserrat, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_font'
    ) );
    $wp_customize->add_control( 'ytre_font_primary', array(
        'type'                  => 'select',
        'section'               => 'ytre_fonts_section',
        'label'                 => __( 'Primary Font', 'ytre' ),
        'description'           => __( 'Select the primary font of the theme', 'ytre' ),
        'choices'               => ytre_fonts(),
    ) );

    // Body Font Family
    $wp_customize->add_setting( 'ytre_font_body', array (
        'default'               => 'Lato, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_font'
    ) );
    $wp_customize->add_control( 'ytre_font_body', array(
        'type'                  => 'select',
        'section'               => 'ytre_fonts_section',
        'label'                 => __( 'Body Font', 'ytre' ),
        'description'           => __( 'Set the font family for the body content of the site', 'ytre' ),
        'choices'               => ytre_fonts(),
    ) );

    // Font Size for Navigation Menu
    $wp_customize->add_setting( 'ytre_nav_menu_font_size', array (
        'default'               => 11,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'ytre_sanitize_integer',
    ) );
    $wp_customize->add_control( 'ytre_nav_menu_font_size', array(
        'type'                  => 'number',
        'section'               => 'ytre_fonts_section',
        'label'                 => __( 'Navigation Menu Font Size', 'ytre' ),
        'description'           => __( 'Adjust the font size of the navigation menu items in pixels', 'ytre' ),
        'input_attrs'           => array(
            'min' => 8,
            'max' => 22,
            'step' => 2,
    ) ) );
    