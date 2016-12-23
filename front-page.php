<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Your_Team_Real_Estate
 */
get_header(); ?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main" role="main">
       
        <?php if ( get_theme_mod( 'ytre_jumbotron_visibility_toggle', 'show' ) == 'show' ) { do_action( 'ytre_jumbotron' ); } ?>
        
        <?php if ( get_theme_mod( 'ytre_featured_listings_visibility_toggle', 'show' ) == 'show' ) { do_action( 'ytre_featured_listings' ); } ?>
        
    </main><!-- #main -->
    
</div><!-- #primary -->

<?php get_footer(); ?>      
