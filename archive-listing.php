<?php
/**
 * The Default Template for displaying all Easy Property Listings archive/loop posts with WordPress Themes
 *
 * @package EPL
 * @subpackage Templates/Themes/Default
 * @since 1.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(); ?>
<section id="primary" class="site-content content epl-archive-default <?php echo epl_get_active_theme_name(); ?>">
    
    <div id="content" role="main">
        
        <div id="single-page-container">
        
            <div id="single-title-box">

                <h2 class="entry-title"><?php _e( 'Find Your New Home', 'ytre' ); ?></h2>

            </div>

            <div class="container">
                
                <div class="row">
                  
                    <div class="col-sm-12">
                        
                        <div class="entry-content">
                        
                            <?php if ( have_posts() ) : ?>

                                <div id="view-toggle-buttons">                                  

                                    <a href="#" id="view-toggle-list" class="view-toggle-button active">
                                        <?php _e( 'List View', 'ytre' ); ?>
                                    </a>
                                    <a href="/listings-map/" id="view-toggle-map" class="view-toggle-button">
                                        <?php _e( 'Map View', 'ytre' ); ?>
                                    </a> 
                                    <h3 class="archive-page-subtitle">
                                        <?php echo get_theme_mod( 'ytre_archive_page_results_title', __( 'We Found a Match!', 'ytre' ) ); ?>
                                    </h3>
                                    <p class="listing-page-blurb">
                                        <?php echo get_theme_mod( 'ytre_archive_page_results_blurb', __( 'Here are the listings matching your search criteria.', 'ytre' ) ); ?>
                                    </p>

                                 </div>
                                 <div id="view-wrapper">

                                    <div id="list-view">

                                        <div id="archive-loop-epl" class="loop-content">
                                            <?php do_action( 'epl_property_loop_start' ); ?>
                                            <?php 
                                            while ( have_posts() ) : // The Loop
                                                the_post();
                                                do_action('epl_property_blog');
                                            endwhile; // end of one post
                                            ?>
                                            <?php do_action( 'epl_property_loop_end' ); ?>
                                        </div>

                                        <div class="loop-footer">
                                            <!-- Previous/Next page navigation -->
                                            <div class="loop-utility clearfix">
                                                    <?php do_action('epl_pagination'); ?>
                                            </div>
                                        </div>

                                    </div>

                                 </div>

                            <?php else : ?>

                                <div id="view-toggle-buttons">                                  

                                    <a href="#" id="view-toggle-list" class="view-toggle-button active">
                                        <?php _e( 'List View', 'ytre' ); ?>
                                    </a>
                                    <a href="/listings-map/" id="view-toggle-map" class="view-toggle-button">
                                        <?php _e( 'Map View', 'ytre' ); ?>
                                    </a> 
                                    <h3 class="archive-page-subtitle">
                                        <?php apply_filters( 'epl_property_search_not_found_title' , _e('Listing not Found', 'easy-property-listings') ); ?>
                                    </h3>
                                    <p class="listing-page-blurb">
                                        <?php apply_filters( 'epl_property_search_not_found_message' , _e('Listing not found, expand your search criteria and try again.', 'easy-property-listings') ); ?>
                                    </p>

                                </div>
                            
                            <?php endif; ?>
                        
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</section>
<?php
get_footer();