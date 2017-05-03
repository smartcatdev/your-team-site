<?php
/**
 * Your Team Real Estate functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Your_Team_Real_Estate
 */

if ( ! function_exists( 'ytre_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ytre_setup() {
    
        if( !defined( 'YTRE_VERSION' ) ) :
            define( 'YTRE_VERSION', '1.0.0' );
        endif;
    
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Your Team Real Estate, use a find and replace
	 * to change 'ytre' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ytre', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'ytre' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif;
add_action( 'after_setup_theme', 'ytre_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ytre_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ytre_content_width', 1170 );
}
add_action( 'after_setup_theme', 'ytre_content_width', 0 );

// Disable scrolling down to Confirmation Messages on all Gravity Forms
add_filter( 'gform_confirmation_anchor', '__return_false' ); 

function ytre_custom_excerpt_length( $length ) {
    return 500;
}
add_filter( 'excerpt_length', 'ytre_custom_excerpt_length', 999 );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load main theme file.
 */
require get_template_directory() . '/inc/ytre/ytre.php';

/**
 * Load main theme extras file.
 */
require get_template_directory() . '/inc/ytre/more.php';

/**
 * Add ChatX Capabilities to Author Role
 */
function ytre_add_chatx_caps() {
    
    // Get the Author role
    $author = get_role( 'author' );

    if ( !$author->has_cap('scx_answer_visitor') ) :
        $author->add_cap( 'scx_answer_visitor' ); 
    endif;

    if ( !$author->has_cap('scx_see_logs') ) :
        $author->add_cap( 'scx_see_logs' ); 
    endif;

    // Get the Editor role
    $editor = get_role( 'editor' );

    if ( !$editor->has_cap('scx_answer_visitor') ) :
        $editor->add_cap( 'scx_answer_visitor' ); 
    endif;

    if ( !$editor->has_cap('scx_see_logs') ) :
        $editor->add_cap( 'scx_see_logs' ); 
    endif;
    
}
add_action( 'admin_init', 'ytre_add_chatx_caps');