<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Your_Team_Real_Estate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result-item' ); ?>>
    
    <header class="entry-header">
        
        <?php the_title( sprintf( '<h3 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php ytre_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
            
    </header><!-- .entry-header -->

    <hr>

    <div class="entry-summary">
        
        <?php the_excerpt(); ?>
        
    </div><!-- .entry-summary -->

    <footer class="entry-footer">
        
        <?php ytre_entry_footer(); ?>
        
    </footer><!-- .entry-footer -->
    
</article><!-- #post-## -->
