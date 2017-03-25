<?php
/**
 * Template Name: Contact Us
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Your_Team_Real_Estate
 */

get_header(); ?>

    <div id="primary" class="content-area">
        
        <main id="main" class="site-main" role="main">

            <div id="single-page-container">

                <div id="single-title-box" class="container">
                    
                    <div class="row">

                        <div class="col-sm-12">
                            <h2 class="entry-title"><?php the_title(); ?></h2>
                        </div>

                    </div>

                </div>

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12">
                        
                            <?php if ( get_theme_mod( 'ytre_contact_us_blurb', __( 'Your Team is always available to work with you.', 'ytre' ) ) ) : ?>
                                <p class="team-page-blurb">
                                    <?php echo get_theme_mod( 'ytre_contact_us_blurb', __( 'Your Team is always available to work with you.', 'ytre' ) ); ?>
                                </p>
                            <?php endif; ?>
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <div class="entry-content">

                                    <div class="row">
                                        
                                        <div class="col-sm-6">
                                            
                                            <div class="contact-content-box">
                                                
                                                <?php while ( have_posts() ) : the_post(); ?>

                                                    <div>
                                                        <?php the_content(); ?>                                                    
                                                    </div>

                                                <?php endwhile; ?>
                                                
                                                <div id="jumbotron-buttons">
                                
                                                    <?php if ( get_theme_mod( 'ytre_jumbotron_button_1_label', __( 'Call', 'ytre' ) ) != '' ) : ?>
                                                        <a class="primary-button" 
                                                           href="<?php echo esc_url( get_theme_mod( 'ytre_jumbotron_button_1_url', '#' ) ); ?>"
                                                           <?php echo get_theme_mod( 'ytre_jumbotron_button_1_target', 'same' ) == 'new' ? ' target="_BLANK" ': ''; ?>>
                                                            <span class="fa fa-mobile"></span>
                                                            <?php echo get_theme_mod( 'ytre_jumbotron_button_1_label', __( 'Call', 'ytre' ) ); ?>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if ( get_theme_mod( 'ytre_jumbotron_button_2_label', __( 'Email', 'ytre' ) ) != '' ) : ?>
                                                        <a class="primary-button" 
                                                           href="<?php echo esc_url( get_theme_mod( 'ytre_jumbotron_button_2_url', '#' ) ); ?>"
                                                           <?php echo get_theme_mod( 'ytre_jumbotron_button_2_target', 'same' ) == 'new' ? ' target="_BLANK" ': ''; ?>>
                                                            <span class="fa fa-envelope-o"></span>
                                                            <?php echo get_theme_mod( 'ytre_jumbotron_button_2_label', __( 'Email', 'ytre' ) ); ?>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if ( get_theme_mod( 'ytre_jumbotron_button_3_label', __( 'Live Chat', 'ytre' ) ) != '' ) : ?>
                                                        <a class="primary-button chat-trigger" href="#">
                                                            <span class="fa fa-commenting-o"></span>
                                                            <?php echo get_theme_mod( 'ytre_jumbotron_button_3_label', __( 'Live Chat', 'ytre' ) ); ?>
                                                        </a>
                                                    <?php endif; ?>

                                                </div>
                                                
                                                <div id="ytre-team-social">

                                                    <div class="inner">
                                                        <a class="team-social facebook" href="http://facebook.com/">
                                                            <span class="fa fa-facebook"></span>
                                                        </a>
                                                    </div>

                                                    <div class="inner">
                                                        <a class="team-social twitter" href="http://twitter.com/">
                                                            <span class="fa fa-twitter"></span>
                                                        </a>
                                                    </div>

                                                    <div class="inner">
                                                        <a class="team-social linkedin" href="http://linkedin.com/">
                                                            <span class="fa fa-linkedin"></span>
                                                        </a>
                                                    </div>

                                                    <div class="inner">
                                                        <a class="team-social googleplus" href="http://googleplus.com/">
                                                            <span class="fa fa-google-plus"></span>
                                                        </a>
                                                    </div>

                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-sm-6">
                                        
                                            <div id="contact-us-map-photo">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d45731.114501350865!2d-76.57332600000001!3d44.2442365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sca!4v1481210368890" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                            </div>
                                            
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
