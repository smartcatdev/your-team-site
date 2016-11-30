<?php
/**
 * Template Name: Listings
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Your_Team_Real_Estate
 */

get_header(); ?>

    <div id="primary" class="content-area">
        
        <main id="main" class="site-main" role="main">

            <div id="single-page-container" class="container">

                <div class="row">

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <div class="col-sm-12">

                            <div id="single-title-box">

                                <h2 class="entry-title"><?php the_title(); ?></h2>

                            </div>

                        </div>

                        <div class="col-sm-12">

                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="entry-content">
                                        
                                        <div id="view-toggle-buttons">
                                            
                                            <div id="view-toggle-list" class="view-toggle-button active">
                                                <?php _e( 'List View', 'ytre' ); ?>
                                            </div>
                                            
                                            <div id="view-toggle-map" class="view-toggle-button">
                                                <?php _e( 'Map View', 'ytre' ); ?>
                                            </div>
                                            
                                        </div>

                                        <div id="view-wrapper">
                                            
                                            <div id="list-view">
                                                <?php echo do_shortcode('[listing]'); ?>
                                            </div>

                                            <div id="map-view">
                                                <?php echo do_shortcode('[advanced_map coords="44.2951665,-76.654035" zoom="13" height="750"]'); ?>
                                            </div>
                                            
                                        </div>
                                        
                                    </div><!-- .entry-content -->

                                </div>

                            </div>

                        </div>

                    </article>

                </div>

            </div>

        </main><!-- #main -->
            
    </div><!-- #primary -->

<?php
get_footer();
