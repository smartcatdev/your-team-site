<?php
/**
 * Template Name: Team
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
                        
                            <?php if ( get_theme_mod( 'ytre_team_photo_head_blurb', __( 'Learn as much or as little as you want to know about Your Team right here.', 'ytre' ) ) ) : ?>
                                <p class="team-page-blurb">
                                    <?php echo get_theme_mod( 'ytre_team_photo_head_blurb', __( 'Learn as much or as little as you want to know about Your Team right here.', 'ytre' ) ); ?>
                                </p>
                            <?php endif; ?>
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <div class="entry-content">

                                    <div id="ytre-team-photo">
                                        
                                        <div class="inner">

                                            <img src="<?php echo esc_url( get_theme_mod( 'ytre_team_photo', get_template_directory_uri() . '/inc/images/team-photo-new.jpg' ) ); ?>" alt="Your Team" usemap="#hotspot-map">

                                            <map name="hotspot-map">
                                                <area target="" alt="Erin Finn" title="Erin Finn" href="/about/team/erin-finn/" coords="44,591,237,522" shape="rect">
                                                <area target="" alt="Jaunna Lessard" title="Jaunna Lessard" href="/about/team/jaunna-lessard/" coords="195,186,456,259" shape="rect">
                                                <area target="" alt="Jeff Easton" title="Jeff Easton" href="/about/team/jeff-easton/" coords="645,550,853,622" shape="rect">
                                                <area target="" alt="Romeo Ibit" title="Romeo Ibit" href="/about/team/romeo-ibit/" coords="1038,190,1249,260" shape="rect">
                                                <area target="" alt="Lisa Mochan" title="Lisa Mochan" href="/about/team/lisa-mochan/" coords="1225,520,1436,589" shape="rect">
                                            </map>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    <div id="mobile-team-cards">
                                        
                                        <div class="mobile-team-member">                                            
                                            <a href="/about/team/jeff-easton/">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/jeff-easton.jpg' ); ?>" alt="Jeff Easton">
                                            </a>
                                            <h3 class="name">
                                                <a href="/about/team/jeff-easton/">
                                                    Jeff Easton
                                                </a>
                                            </h3>
                                        </div>
                                        
                                        <div class="mobile-team-member">                                            
                                            <a href="/about/team/erin-finn/">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/erin-finn.jpg' ); ?>" alt="Erin Finn">
                                            </a>
                                            <h3 class="name">
                                                <a href="/about/team/erin-finn/">
                                                    Erin Finn
                                                </a>
                                            </h3>
                                        </div>
                                        
                                        <div class="mobile-team-member">                                            
                                            <a href="/about/team/romeo-ibit/">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/romeo-ibit.jpg' ); ?>" alt="Romeo Ibit">
                                            </a>
                                            <h3 class="name">
                                                <a href="/about/team/romeo-ibit/">
                                                    Romeo Ibit
                                                </a>
                                            </h3>
                                        </div>
                                        
                                        <div class="mobile-team-member">                                            
                                            <a href="/about/team/jaunna-lessard/">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/jaunna-lessard.jpg' ); ?>" alt="Jaunna Lessard">
                                            </a>
                                            <h3 class="name">
                                                <a href="/about/team/jaunna-lessard/">
                                                    Jaunna Lessard
                                                </a>
                                            </h3>
                                        </div>
                                        
                                        <div class="mobile-team-member">                                            
                                            <a href="/about/team/lisa-mochan/">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/lisa-mochan.jpg' ); ?>" alt="Lisa Mochan">
                                            </a>
                                            <h3 class="name">
                                                <a href="/about/team/lisa-mochan/">
                                                    Lisa Mochan
                                                </a>
                                            </h3>
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
