<?php
/**
 * Template Name: Listings List
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Your_Team_Real_Estate
 */

get_header(); ?>

    <div id="primary" class="content-area">
        
        <main id="main" class="site-main" role="main">

            <div id="single-page-container">

                <div id="single-title-box">

                    <h2 class="entry-title"><?php the_title(); ?></h2>

                </div>

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12">
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <div class="entry-content">

                                    <div id="view-toggle-buttons">                                  
                                        
                                        <?php 
                                        
                                        // TODO: Build a string of $_GET parameter to juggle back and forth between List and Map view, if present
                                        
                                        if ( isset( $_GET ) ) :
                                            
                                            $gets = '?';
                                            if ( isset( $_GET['property_location'] ) ) :
                                                $gets .= 'property_location=' . $_GET['property_location'];
                                            endif;
                                            
                                        else :
                                        
                                            $gets = '';
                                            
                                        endif;
                                        
                                        ?>
                                        
                                        <a href="#" id="view-toggle-list" class="view-toggle-button active">
                                            List View 
                                        </a>
                                        <a href="<?php echo esc_url( home_url( '/listings-map/' . $gets ) ); ?>" id="view-toggle-map" class="view-toggle-button">
                                            Map View
                                        </a>
                                        
                                        <?php // TODO: Add a "Clear Filters" button that reloads current page minus any $_GET params that would be used to filter ?>
                                        
                                        <p class="listing-page-blurb">
                                            Browse our listings on your own below or enter some must-haves and let us select the listings you should see.
                                        </p>
                                        
                                    </div>
                                    <div id="view-wrapper">
                                        
                                        <div id="list-view">
                                            
                                            <?php // TODO: Output the List View using the filter query ?>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div><!-- .entry-content -->

                            </article>

                        </div>
                        
                    </div>

                </div>
                
            </div>

        </main><!-- #main -->
            
    </div><!-- #primary -->

<?php
get_footer();
