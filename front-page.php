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
       
        <?php do_action( 'ytre_jumbotron' ); ?>

        <?php do_action( 'ytre_featured_listings' ); ?>
        
    </main><!-- #main -->
    
</div><!-- #primary -->

<?php get_footer(); ?>      
