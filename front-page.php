<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Your_Team_Real_Estate
 */
get_header();
$front = get_option( 'show_on_front' ); ?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main" role="main">
       
        <?php if ( $front != 'posts' ) : ?>
            
            <?php do_action( 'ytre_jumbotron' ); ?>

            <?php do_action( 'ytre_featured_listings' ); ?>
        
        <?php endif; ?>
         
        <div id="front-page-content" class="container">

            <div class="row">

                <div id="front-page-blog" class="col-sm-12">

                    <div class="row">

                        <?php if ( have_posts() ) : ?>

                            <?php if ( is_home() && !is_front_page() ) : ?>

                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>

                            <?php endif; ?>
                                
                            <div class="col-sm-12">
                                
                                <?php /* Start the Loop */ ?>
                                <?php while ( have_posts() ) : the_post(); ?>

                                    <?php
                                        if ( $front == 'posts' ) :
                                            get_template_part( 'template-parts/content', 'blog' );
                                        else:
                                            get_template_part( 'template-parts/content', 'page-home' );
                                        endif;
                                    ?>

                                <?php endwhile; ?>
                                
                            </div>
                                
                        <?php else : ?>

                            <?php get_template_part('template-parts/content', 'none'); ?>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>
            
    </main><!-- #main -->
    
</div><!-- #primary -->

<?php get_footer(); ?>      
