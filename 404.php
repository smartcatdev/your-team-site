<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Your_Team_Real_Estate
 */

get_header(); ?>

<div id="primary" class="content-area">
            
    <main id="main" class="site-main" role="main">
                    
        <div id="single-page-container">

            <section class="error-404 not-found">

                <div id="single-title-box">

                    <h2 class="entry-title">
                        <?php echo get_theme_mod( 'ytre_error_page_heading', __( 'Oops!', 'ytre' ) ); ?>
                    </h2>

                </div>

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="page-content">
                                
                                <h1 class="title-404"><?php esc_html_e( '404', 'ytre' ); ?></h1>
                                
                                <p>
                                    <?php echo get_theme_mod( 'ytre_error_page_subheading', __( 'It looks like nothing was found at this location, please check the address and try again!', 'ytre' ) ); ?>
                                </p>

                                <h3>
                                    <?php echo get_theme_mod( 'ytre_error_page_search_heading', __( 'Search for something new?', 'ytre' ) ); ?>
                                </h3>
                                
                                <?php get_search_form(); ?>

                            </div><!-- .page-content -->

                        </div>

                    </div>

                </div>

            </section>

        </div>            

    </main><!-- #main -->
        
</div><!-- #primary -->

<?php
get_footer();
