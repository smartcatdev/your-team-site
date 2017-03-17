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

                <div class="container">
                    
                    <div class="row">
                        
                        <div class="col-sm-12">
                            
                            <div id="single-title-box">

                                <!-- <h2 class="entry-title"><?php // the_title(); ?></h2> -->

                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12">
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <div class="entry-content">
                                    
                                    <div id="view-toggle-buttons">                               
                                        
                                        <h2 class="entry-title"><?php _e( 'Find Your New Home', 'ytre'); ?></h2>
                                        
                                        <?php 
                                        
                                        if ( isset( $_GET ) && !empty( $_GET ) ) :
                                            
                                            $gets = '?';
                                            $existing = array();
                                        
                                            if ( isset( $_GET['homepage-search-arrival'] ) ) :
                                                $existing[] = 'homepage-search-arrival=true';
                                            endif;
                                            
                                            if ( isset( $_GET['property_location'] ) ) :
                                                $existing[] = 'property_location=' . $_GET['property_location'];
                                            endif;

                                            if ( isset( $_GET['property_price_from'] ) ) :
                                                $existing[] = 'property_price_from=' . $_GET['property_price_from'];
                                            endif;
                                            
                                            if ( isset( $_GET['property_price_to'] ) ) :
                                                $existing[] = 'property_price_to=' . $_GET['property_price_to'];
                                            endif;
                                            
                                            if ( isset( $_GET['property_bedrooms_min'] ) ) :
                                                $existing[] = 'property_bedrooms_min=' . $_GET['property_bedrooms_min'];
                                            endif;
                                            
                                            if ( isset( $_GET['property_bathrooms'] ) ) :
                                                $existing[] = 'property_bathrooms=' . $_GET['property_bathrooms'];
                                            endif;
                                            
                                            foreach ( $existing as $param ) :
                                                
                                                $gets .= $param . '&';
                                                
                                            endforeach;
                                            
                                        else :
                                        
                                            $gets = '';
                                            
                                        endif;
                                        
                                        ?>
                                        
                                        <a href="<?php echo esc_url( home_url( '/listings-list/' . substr( $gets, 0, -1 ) ) ); ?>" id="view-toggle-list" class="view-toggle-button">
                                            <?php _e( 'List View', 'ytre' ); ?>
                                        </a>
                                        <a href="#" id="view-toggle-map" class="view-toggle-button active">
                                            <?php _e( 'Map View', 'ytre' ); ?>
                                        </a>
                                        <?php global $post; ?>
                                        <div id="clear-search-filters">
                                            <a href="<?php echo esc_url( home_url( $post->post_name . '/' ) ); ?>" class="view-toggle-button">
                                                <?php _e( 'Clear Filters', 'ytre' ); ?>
                                            </a>
                                        </div>
                                        
                                        <p class="listing-page-blurb">
                                            <?php _e( 'Browse on your own with List View or Map View OR enter some must-haves and let us select the listings you should see.', 'ytre' ); ?>
                                        </p>
                                        
                                    </div>
                                    <div id="map-wrapper">
                                        
                                        <?php
                                        
                                        global $property;
                                        
                                        $coords = '44.2445245,-76.5189882';
                                        $cluster = false;
                                        $zoom = '13';
                                        $height = '750';
                                        $display = 'simple';

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
                                            'meta_query'	=> array(
                                                array(
                                                    'key'       => 'property_address_coordinates',
                                                    'value'	=> '',
                                                    'compare'	=> '!=',                // As long as the coordinates are not blank
                                                ),
                                            ),
                                            
                                        );

                                        // Add a tax query for Suburb Location if that parameter is passed
                                        if ( !empty( $_GET['property_location'] ) ) :
                                        
                                            $args['tax_query'][] = array(
                                                'taxonomy'  => 'location',
                                                'field'     => 'term_id',
                                                'terms'     => $_GET['property_location']
                                            );

                                        endif;
                                        
                                        // Add a meta query for Min / Max Price Range if Present
                                        if ( !empty( $_GET['property_price_from'] ) || !empty( $_GET['property_price_to'] ) ) :
                                        
                                            if ( !empty( $_GET['property_price_from'] ) && !empty( $_GET['property_price_to'] ) ) :
                                            
                                                $args['meta_query'][] = array(
                                                    array(
                                                        'key'       => 'property_price',
                                                        'value'     => array( $_GET['property_price_from'], $_GET['property_price_to'] ),
                                                        'type'      => 'numeric',
                                                        'compare'   => 'BETWEEN',
                                                    ),
                                                );

                                            elseif ( !empty( $_GET['property_price_from'] ) ) :
                                            
                                                $args['meta_query'][] = array(
                                                    array(
                                                        'key'       => 'property_price',
                                                        'value'     => array( $_GET['property_price_from'], 10000000 ),
                                                        'type'      => 'numeric',
                                                        'compare'   => 'BETWEEN',
                                                    ),
                                                );
                                                
                                            else :
                                                
                                                $args['meta_query'][] = array(
                                                    array(
                                                        'key'       => 'property_price',
                                                        'value'     => array( 50000, $_GET['property_price_to'] ),
                                                        'type'      => 'numeric',
                                                        'compare'   => 'BETWEEN',
                                                    ),
                                                );
                                                
                                            endif;

                                        endif;
                                        
                                        // Add a meta query for Minimum Bedrooms if that parameter is passed
                                        if ( !empty( $_GET['property_bedrooms_min'] ) ) :
                                        
                                            $args['meta_query'][] = array(
                                                'key'       => 'property_bedrooms',
                                                'value'     => $_GET['property_bedrooms_min'],
                                                'type'      => 'numeric',
                                                'compare'   => '>='
                                            );

                                        endif;
                                        
                                        // Add a meta query for Minimum Bathrooms if that parameter is passed
                                        if ( !empty( $_GET['property_bathrooms'] ) ) :
                                        
                                            $args['meta_query'][] = array(
                                                'key'       => 'property_bathrooms',
                                                'value'     => $_GET['property_bathrooms'],
                                                'type'      => 'numeric',
                                                'compare'   => '>='
                                            );

                                        endif;
                                        
                                        $results = new WP_Query( $args );

                                        ?>
                                        
                                        <div id="map-view">
                                    
                                            <div id="epl-advanced-map" class="epl-am-infobox-square">

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
