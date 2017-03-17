<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Your_Team_Real_Estate
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    
    <div class="grid-sizer"></div>
    <div class="gutter-sizer"></div>
    
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ytre' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
            
        <div class="site-branding container-fluid">
            
            <div class="row">
                        
                <div id="branding-content" class="col-sm-12">

                    <div class="inner">
                
                        <div class="logo-container">

                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/our-team-trans.png' ); ?>" />    
                            </a>

                        </div>
                        
                        <div class="align-wrap">
                            
                            <nav id="site-navigation" class="main-navigation" role="navigation">
                                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ytre' ); ?></button>
                                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                            </nav><!-- #site-navigation -->
                        
                        </div>
                
                        <div id="header-actual-form">
                            <?php get_search_form(); ?> 
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
                        
        </div><!-- .site-branding -->
        
        <div id="header-search">
            <!-- SlickNav Appends Here -->
        </div>
        
    </header><!-- #masthead -->

    <?php if ( !isset( $_GET['homepage-search-arrival'] ) ) : ?>
    
        <div id="floating-filter-search">

            <div class="edge-block">
            </div>

            <?php echo do_shortcode('[listing_search'
                . ' title="Let Us Help You Search!"'
                . ' post_type="property"'
                . ' style="default"'
                . ' property_status="current"'
                . ' submit_label="Go!"'
            . ']'); ?>

        </div>
    
    <?php endif; ?>
    
    <div id="floating-contact-cta">
        
        <div class="edge-block">
        </div>
        
        <div class="inner">
            <?php _e( 'Ready to list your home with us? Talk to one of our agents today.', 'ytre' ); ?>
            <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="primary-button">
                <?php _e( 'Contact Us', 'ytre' ); ?>
            </a>
        </div>
        
    </div>
    
    <div id="content" class="site-content">

            
