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
                                        
                                        <a href="#" id="view-toggle-list" class="view-toggle-button active">
                                            <?php _e( 'List View', 'ytre' ); ?>
                                        </a>
                                        <a href="<?php echo esc_url( home_url( '/listings-map/' . substr( $gets, 0, -1 ) ) ); ?>" id="view-toggle-map" class="view-toggle-button">
                                            <?php _e( 'Map View', 'ytre' ); ?>
                                        </a>
                                        <?php global $post; ?>
                                        <div id="clear-search-filters">
                                            <a href="<?php echo esc_url( home_url( $post->post_name . '/' ) ); ?>" class="view-toggle-button">
                                                <?php _e( 'Show All Listings', 'ytre' ); ?>
                                            </a>
                                        </div>
                                        
                                        <p class="listing-page-blurb">
                                            <?php _e( 'Browse on your own with List View or Map View OR enter some must-haves and let us select the listings you should see.', 'ytre' ); ?>
                                        </p>
                                        
                                    </div>
                                    <div id="view-wrapper">
                                        
                                        <?php
                                        
                                        $args = array(
                                            
                                            'post_type'         => 'property',          // Post Type
                                            'limit'             => '30',                // Number of maximum posts to show
                                            
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
                                        
                                        <div id="list-view-masonry">
                                            
                                            <?php if ( $results->have_posts() ) : ?>
                    
                                                <?php while ( $results->have_posts() ) : $results->the_post(); ?>

                                                    <div class="featured-property-tile">

                                                        <?php if ( has_post_thumbnail() ) : ?>

                                                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                                        
                                                                <div class="prop-image" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>);">

                                                                    <div class="price-banner">

                                                                        <h4 class="listing-price">
                                                                            <?php echo '$' . number_format( get_post_meta( get_the_ID(), 'property_price', true ), 0, ".", "," ); ?>
                                                                        </h4>

                                                                    </div>

                                                                </div>

                                                            </a>

                                                        <?php endif; ?>

                                                        <div class="prop-details">

                                                            <h3 class="prop-heading">
                                                                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                                                    <?php echo get_post_meta( get_the_ID(), 'property_heading', true ); ?>
                                                                </a>
                                                            </h3>

                                                            <div class="prop-meta">

                                                                <div class="bedrooms">
                                                                    <h4 class="prop-label">
                                                                        <span class="fa fa-bed"></span>
                                                                        <?php _e( 'Bedrooms', 'ytre' ); ?>
                                                                        <div class="value">
                                                                            <?php echo intval( get_post_meta( get_the_ID(), 'property_bedrooms', true ) ); ?>    
                                                                        </div>
                                                                    </h4>
                                                                </div>

                                                                <div class="bathrooms">
                                                                    <h4 class="prop-label">
                                                                        <span class="fa fa-bathtub"></span>
                                                                        <?php _e( 'Bathrooms', 'ytre' ); ?>
                                                                        <div class="value">
                                                                            <?php echo intval( get_post_meta( get_the_ID(), 'property_bathrooms', true ) ); ?>    
                                                                        </div>
                                                                    </h4>
                                                                </div>

                                                                <?php $terms = wp_get_post_terms( get_the_ID(), 'location' ); ?>
                                                
                                                                <?php if ( !empty( $terms ) ) : ?>
                                                                    <div class="parking">
                                                                        <h4 class="prop-label">
                                                                            <span class="fa fa-map-o"></span>
                                                                            <?php echo $terms[0]->name;?>
                                                                        </h4>
                                                                    </div>
                                                                <?php endif; ?>

                                                            </div>

                                                        </div>

                                                    </div>

                                                <?php endwhile; ?>

                                                <?php wp_reset_postdata(); ?>

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
