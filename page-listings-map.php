<?php
/**
 * Template Name: Listings Map
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
                                        <a href="/listings-list/" id="view-toggle-list" class="view-toggle-button">
                                            List View 
                                         </a>
                                         <a href="#" id="view-toggle-map" class="view-toggle-button active">
                                            Map View
                                         </a>
                                        <p class="listing-page-blurb">
                                            Browse our listings on your own below or enter some must-haves and let us select the listings you should see.
                                        </p>
                                    </div>
                                    <div id="map-wrapper">
                                        
                                        <?php
                                        
                                        global $property;
                                        
                                        $coords = '44.2445245,-76.5189882';
                                        $cluster = false;
                                        $zoom = '15';
                                        $height = '750';
                                        $display = 'card';

                                        $args = array(
                                            
                                            'post_type'         => 'property',          // Post Type
                                            'limit'             => '30',                // Number of maximum posts to show
                                            'coords'		=> '',             // First property in center by default
                                            'display'		=> $display,              // card, slider, simple or popup
                                            'zoom'              => $zoom,                // For setting map zoom level
                                            'height'		=> $height,                  // For set map height level, pass integer value
                                            'cluster'		=> $cluster,              // Icon grouping on Map
                                            'property_status'	=> '',
                                            'home_open'		=> false,              // False and true
                                            'location'		=> '',
                                            'posts_per_page'	=> '10',
                                            'paged'             => '1',
                                            'epl_nopaging'	=> 'true',
                                            'meta_query'	=> array(
                                                array(
                                                    'key'       => 'property_address_coordinates',
                                                    'value'	=> '',
                                                    'compare'	=> '!=',                // As long as the coordinates are not blank
                                                ),
                                            ),
                                            
                                        );

                                        // Add a tax query for Suburb Location if that parameter is passed
                                        if ( isset( $_GET['property_location'] ) ) :
                                        
                                            $args['tax_query'][] = array(
                                                'taxonomy'  => 'location',
                                                'field'     => 'term_id',
                                                'terms'     => $_GET['property_location']
                                            );

                                        endif;
                                        
                                        $results = new WP_Query( $args );

                                        ?>
                                        
                                        <div id="list-view">
                                    
                                            <div id="epl-advanced-map" class="epl-am-infobox-rounded">

                                                <input type="hidden" name="slider[zoom]" value="<?php echo esc_attr( $zoom ); ?>" />
                                                <input type="hidden" name="slider[height]" value="<?php echo esc_attr( $height ); ?>" />
                                                <input type="hidden" name="slider[cluster]" value="<?php echo $cluster ? esc_attr( 'true' ) : esc_attr( 'false' ); ?>" />
                                                <input type="hidden" name="slider[display]" value="<?php echo esc_attr( $display ); ?>" />

                                                <div class="slider-map"></div>
                                                <div class="slider-map-zoom-in"></div>
                                                <div class="slider-map-zoom-out"></div>

                                            </div>
                                            
                                            <script type="text/javascript">

                                                jQuery(document).ready(function() {

                                                    <?php if( $results->have_posts() ) : ?>

                                                        <?php $post_counter = 1; ?>

                                                        <?php while( $results->have_posts()) : $results->the_post(); ?>
                                                            
                                                            <?php 

                                                            $property_address_coordinates = $property->get_property_meta('property_address_coordinates');
                                                            $property_address_coordinates = explode(',', $property_address_coordinates);

                                                            $epl_am_lat     = trim($property_address_coordinates[0]);
                                                            $epl_am_long    = trim($property_address_coordinates[1]);

                                                            if( $post_counter == 1 ) :
                                                                $center_lat = $epl_am_lat;
                                                                $center_long = $epl_am_long;
                                                            endif;

                                                            if( has_post_thumbnail() ) :
                                                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                                                $epl_am_prop_image = $image[0];
                                                            else :
                                                                $epl_am_prop_image = get_template_directory_uri() . '/inc/images/no-image.jpg';
                                                            endif;

                                                            $image_pin = epl_am_get_property_image( $property );     // Find what this is grabbing and replicate it or see if it has scope

                                                            $content = epl_get_property_icons();                   // Find what this is grabbing and replicate it or see if it has scope

                                                            $price_content = '';
                                                            
                                                            $price_content .= '
                                                                <div class="slider-price">
                                                                    <span class="page-price">';
                                                                        $price_content .= '<span class="price_class">' . epl_get_property_price() . '</span>';
                                                                        $price_content .= '
                                                                    </span>
                                                                </div>';

                                                            $content = '
                                                                <div class="property-info">
                                                                    <span class="property_address_suburb">'
                                                                    .epl_property_get_the_full_address().
                                                                    '</span>'.
                                                                    $price_content.
                                                                    '<div class="epl-adv-popup-meta">'.
                                                                    $content.'
                                                                    </div>
                                                                </div>';

                                                            $content = preg_replace('~[\r\n]+~', '', $content); 
                                                            
                                                            ?>

                                                            myGmap.addFeaturedMarker('<?php echo esc_js( get_the_ID() ); ?>', '<?php echo esc_js( addslashes( epl_property_get_the_full_address() ) ); ?>', '<?php echo esc_js( $epl_am_lat ); ?>', '<?php echo esc_js( $epl_am_long ); ?>', '<?php echo $image_pin; ?>', '<?php echo esc_js( get_the_permalink() ); ?>', '<?php echo $epl_am_prop_image; ?>', '<?php echo esc_js( addslashes( get_the_title() ) ); ?>', '<?php echo addslashes( $content ); ?>');
                                                                    
                                                            <?php $post_counter++ ; ?>

                                                        <?php endwhile; ?>

                                                    <?php endif; ?>

                                                    <?php wp_reset_postdata(); ?>

                                                    <?php 
                                    
                                                    if( $coords != '' ) :
                                                        $center_coordinates     = explode(',', $coords);
                                                        $center_lat 		= trim($center_coordinates[0]);
                                                        $center_long 		= trim($center_coordinates[1]);
                                                    else :
                                                        if( !is_null($property) ) :
                                                            $center_coordinates = $property->get_property_meta('property_address_coordinates');
                                                            $center_coordinates = explode(',',$center_coordinates);
                                                            $center_lat 	= trim($center_coordinates[0]);
                                                            $center_long 	= trim($center_coordinates[1]);
                                                        endif;
                                                    endif;
                                                    
                                                    ?>
                                                    
                                                    set_markers( '<?php echo esc_url( home_url( '/wp-content/plugins/epl-advanced-mapping/images/' ) ); ?>' );
                                                    var latlng = new google.maps.LatLng('<?php echo trim( $center_lat ); ?>', '<?php echo trim( $center_long ); ?>');
                                                    myGmap.gmap3("get").setCenter(latlng);

                                                });
                                                
                                            </script>
                                            
                                            <?php 
                                            
                                            if( $results->have_posts() ) :

                                                $post_counter = 1;

                                                while( $results->have_posts()) : $results->the_post(); ?>
                                            
                                                    <img src="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : ''; ?>">
                                                    
                                                <?php endwhile; ?>
                                            
                                            <?php endif; ?>
                                            
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
