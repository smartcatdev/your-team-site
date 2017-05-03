<?php
/**
 * The template for displaying all single events.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Your_Team_Real_Estate
 */

$api_key = 'AIzaSyAiLu00gvw-hCgqFBllEqQ-QObDIoI_6wU';

get_header(); ?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>
                
            <div id="ytre-event">

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12">

                            <div id="single-event-inner">

                                <div class="row">

                                    <div class="col-sm-8">

                                        <div class="ytre-member-details">

                                            <?php if ( !empty( get_post_meta( get_the_ID(), 'event_is_openhouse', true ) ) && !empty( get_post_meta( get_the_ID(), 'event_openhouse_id', true ) ) ) : ?>
                                                <div class="sold-banner single-event">
                                                    <?php _e( 'OPEN HOUSE', 'ytre' ); ?>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <h2 class="name">
                                                <?php if ( !empty( get_post_meta( get_the_ID(), 'event_is_openhouse', true ) ) && !empty( get_post_meta( get_the_ID(), 'event_openhouse_id', true ) ) ) : ?>
                                                    <?php echo get_the_title( get_post_meta( get_the_ID(), 'event_openhouse_id', true ) ); ?>
                                                <?php else : ?>
                                                    <?php echo get_the_title(); ?>
                                                <?php endif; ?>
                                            </h2>
                                            
                                            <?php if ( !empty( get_post_meta( get_the_ID(), 'event_is_openhouse', true ) ) && !empty( get_post_meta( get_the_ID(), 'event_openhouse_id', true ) ) ) : ?>
                                                <h3 class="title price">
                                                    
                                                    <?php echo '$' . number_format( get_post_meta( get_post_meta( get_the_ID(), 'event_openhouse_id', true ), 'property_price', true ), 0, ".", "," ); ?>
                                                    
                                                    <?php if ( !empty( get_post_meta( get_post_meta( get_the_ID(), 'event_openhouse_id', true ), 'property_bedrooms', true ) ) ) : ?>
                                                        <span>
                                                            <?php _e( '(' . get_post_meta( get_post_meta( get_the_ID(), 'event_openhouse_id', true ), 'property_bedrooms', true ) . ' bedrooms)', 'ytre' ); ?>
                                                        </span>
                                                    <?php endif; ?>
                                                    
                                                </h3>
                                            <?php endif; ?>
                                            
                                            <h3 class="title">
                                                <?php echo date( 'M jS, Y', strtotime( get_post_meta( get_the_ID(), 'event_meta_date', true ) ) ); ?>
                                            </h3>
                                            <h4>
                                                <?php echo date( 'g:i', strtotime( get_post_meta( get_the_ID(), 'event_meta_time_start', true ) ) ); ?>
                                                <?php _e( ' to ', 'ytre' ); ?>
                                                <?php echo date( 'g:i a', strtotime( get_post_meta( get_the_ID(), 'event_meta_time_end', true ) ) ); ?>
                                            </h4>
                                            <h4>
                                                <?php echo get_post_meta( get_the_ID(), 'event_meta_location', true ); ?>
                                            </h4>
                                            <div class="ytre-member-content">  
                                                <?php the_content(); ?>
                                            </div>
                                            
                                            <?php if ( !empty( get_post_meta( get_the_ID(), 'event_is_openhouse', true ) ) && !empty( get_post_meta( get_the_ID(), 'event_openhouse_id', true ) ) ) : ?>
                                            
                                                <?php $property_images = get_post_meta( get_post_meta( get_the_ID(), 'event_openhouse_id', true ), 'bulk_image_set', true ); ?>

                                                <?php if ( empty( $property_images ) || !is_array( $property_images ) ) : ?>

                                                    <?php if ( has_post_thumbnail( get_post_meta( get_the_ID(), 'event_openhouse_id', true ) ) ) : ?>

                                                        <div id="prop-galleria-wrap" class="single">

                                                            <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_post_meta( get_the_ID(), 'event_openhouse_id', true ) ) ); ?>">

                                                        </div>

                                                    <?php endif; ?>

                                                <?php else : ?>

                                                    <div id="prop-galleria-wrap">

                                                        <div id="property-gallery">

                                                            <?php foreach ( $property_images as $image ) : ?>

                                                                <img src="<?php echo esc_url( $image ); ?>">

                                                            <?php endforeach; ?>

                                                        </div>

                                                    </div>

                                                <?php endif; ?>
                                            
                                            <?php endif; ?>
                                            
                                        </div>

                                    </div>
                                    
                                    <div class="col-sm-4">

                                        <div id="ytre-member-photo">

                                            <?php if ( has_post_thumbnail() ) : ?>

                                                <?php echo the_post_thumbnail( 'large' ); ?>

                                            <?php endif; ?>

                                            <?php if ( !empty( get_post_meta( get_the_ID(), 'event_is_openhouse', true ) ) && !empty( get_post_meta( get_the_ID(), 'event_openhouse_id', true ) ) ) : ?>
                                            
                                                <?php $location = get_post_meta( get_post_meta( get_the_ID(), 'event_openhouse_id', true ), 'property_address_coordinates', true ); ?>

                                                <?php if ( !empty( $location ) ) : ?>

                                                    <div class="gmap-wrapper">
                                                        <iframe src="https://www.google.com/maps/embed/v1/search?key=<?php echo esc_attr( $api_key ); ?>&q=<?php echo str_replace( ' ', '+', $location ); ?>&zoom=14"
                                                                width="100%"
                                                                height="250"
                                                                frameborder="0">
                                                        </iframe>
                                                    </div>

                                                <?php endif; ?>

                                            <?php endif; ?>
                                            
                                            <?php if ( function_exists( 'gravity_form' ) ) : ?>
                                            
                                                <div id="ytre-team-actions">

                                                    <h3 class="rsvp-heading"><?php _e( 'RSVP', 'ytre' ); ?></h3>

                                                    <?php gravity_form( 'RSVP', false, false, false, array( 'event_name' => get_the_title() ), false ); ?>

                                                </div>

                                            <?php endif; ?>
                                            
                                        </div>
                                        
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                
            </div>
        
        <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
    
</div><!-- #primary -->

<?php
get_footer();
