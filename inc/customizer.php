<?php
/**
 * Your Team Real Estate Theme Customizer.
 *
 * @package Your_Team_Real_Estate
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ytre_customize_register( $wp_customize ) {
    
    // Front Page
    require_once('customizer/settings-front-page.php');

    // Site Header & Footer
    // require_once('customizer/settings-header-footer.php');
    
    // Site Appearance
    require_once('customizer/settings-appearance.php');

    // Extras
    // require_once('customizer/settings-extras.php');    
    
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'ytre_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ytre_customize_preview_js() {
	wp_enqueue_script( 'ytre_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ytre_customize_preview_js' );

/**
 * Sanitization Functions
 */
function ytre_sanitize_text( $input ) {
    
    return sanitize_text_field( $input );
    
}

function ytre_sanitize_color( $input ) {
    
    return sanitize_hex_color( $input );
    
}

function ytre_sanitize_integer( $input ) {
    
    return is_numeric( $input ) ? intval( $input ) : '';
    
}

function ytre_sanitize_overlay_decimal( $input ) {
    
    return is_numeric( $input ) && $input <= 1.0 && $input >= 0.0 ? $input : '';
    
}

function ytre_sanitize_post( $input ) {
    
    $valid_keys = ytre_all_posts_array( true );
    
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function ytre_sanitize_font( $input ) {
    
    $valid_keys = ytre_fonts();
    
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function ytre_sanitize_link_target( $input ) {
    
    $valid_keys = array(
        'same'      => __( 'Same Window', 'ytre' ),
        'new'       => __( 'New Window', 'ytre' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function ytre_sanitize_show_hide( $input ) {
    
    $valid_keys = array(
        'show'      => __( 'Show', 'ytre' ),
        'hide'      => __( 'Hide', 'ytre' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}