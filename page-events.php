<?php
/**
 * Template Name: Events
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

                        <?php if ( get_theme_mod( 'ytre_events_blurb', __( 'Your Team is actively involved in our community. Here are some upcoming events.', 'ytre' ) ) ) : ?>
                            <p class="team-page-blurb">
                                <?php echo get_theme_mod( 'ytre_events_blurb', __( 'Your Team is actively involved in our community. Here are some upcoming events.', 'ytre' ) ); ?>
                            </p>
                        <?php endif; ?>
                        
                        <?php 

                        $args = array (
                            'posts_per_page' => '20',
                            'post_type' => array ( 'event' ),
                            'post_status' => array ( 'publish' ),
                            'order' => 'DESC',
                            'orderby' => 'date',
                            'meta_query' => array (
                                array (
                                    'key' => 'event_meta_date',
                                    'value' => date( 'Y-m-d' ),
                                    'compare' => '>=',
                                    'type' => 'DATE',
                                ),
                            ),
                        );

                        // The Query
                        $events = new WP_Query( $args );

                        // The Loop
                        if ( $events->have_posts() ) : ?>

                            <div id="list-view-masonry">

                                <?php while ( $events->have_posts() ) : $events->the_post(); ?>

                                    <div class="featured-property-tile">

                                        <?php if ( has_post_thumbnail() ) : ?>

                                            <div class="prop-image" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>);">
                                            </div>

                                        <?php endif; ?>

                                        <div class="event-details">

                                            <h3 class="event-title">
                                                <a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>">
                                                    <?php echo get_the_title(); ?>
                                                </a>
                                            </h3>

                                            <div class="date">
                                                <?php echo date( 'M jS, Y', strtotime( get_post_meta( get_the_ID(), 'event_meta_date', true ) ) ); ?>
                                            </div>

                                            <div class="time">
                                                <?php echo date( 'g:i', strtotime( get_post_meta( get_the_ID(), 'event_meta_time_start', true ) ) ); ?>
                                                <?php _e( ' to ', 'ytre' ); ?>
                                                <?php echo date( 'g:i a', strtotime( get_post_meta( get_the_ID(), 'event_meta_time_end', true ) ) ); ?>
                                            </div>

                                            <div class="location">
                                                <?php echo get_post_meta( get_the_ID(), 'event_meta_location', true ); ?>
                                            </div>

                                            <a class="primary-button" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>"><?php _e( 'Learn More', 'ytre') ?></a>
                                            
                                        </div>

                                    </div>

                                <?php endwhile; ?>

                                <?php wp_reset_postdata(); ?>

                            </div>

                        <?php else : ?>

                            <h4>
                                <?php _e( 'There are currently no upcoming events, please check again at a later time.', 'ytre') ?>
                            </h4>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </main><!-- #main -->

</div><!-- #primary -->

<?php
get_footer();
