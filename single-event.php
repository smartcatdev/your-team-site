<?php
/**
 * The template for displaying all single events.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Your_Team_Real_Estate
 */

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

                                            <h2 class="name"><?php echo the_title(); ?></h2>
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

                                        </div>

                                    </div>
                                    
                                    <div class="col-sm-4">

                                        <div id="ytre-member-photo">

                                            <?php if ( has_post_thumbnail() ) : ?>

                                                <?php echo the_post_thumbnail( 'large' ); ?>

                                            <?php endif; ?>

                                            <div id="ytre-team-actions">

                                                <h3 class="rsvp-heading"><?php _e( 'RSVP', 'ytre' ); ?></h3>
                                                
                                                <?php if (function_exists('gravity_form') ) : ?>
                                                
                                                    <?php gravity_form( 'RSVP', false, false, false, array( 'event_name' => get_the_title() ), false ); ?>
                                                
                                                <?php endif; ?>
                                                
                                            </div>

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
