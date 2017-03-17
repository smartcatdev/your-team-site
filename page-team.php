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
                                                <area  alt="Erin Finn" title="Erin Finn" href="/about/team/erin-finn/" shape="rect" coords="246,234,432,303" style="outline:none;" target="_self"     />
                                                <area  alt="Liz White" title="Liz White" href="/about/team/liz-white/" shape="rect" coords="40,475,214,539" style="outline:none;" target="_self"     />
                                                <area  alt="Jaunna Lessard" title="Jaunna Lessard" href="/about/team/jaunna-lessard/" shape="rect" coords="259,614,517,683" style="outline:none;" target="_self"     />
                                                <area  alt="Jeff Easton" title="Jeff Easton" href="/about/team/jeff-easton/" shape="rect" coords="810,501,1042,566" style="outline:none;" target="_self"     />
                                                <area  alt="Romeo Ibit" title="Romeo Ibit" href="/about/team/romeo-ibit/" shape="rect" coords="1152,423,1350,489" style="outline:none;" target="_self"     />
                                                <area  alt="Lisa Mochan" title="Lisa Mochan" href="/about/team/lisa-mochan/" shape="rect" coords="544,190,774,254" style="outline:none;" target="_self"     />
                                                <area  alt="Crystal Charette" title="Crystal Charette" href="/about/team/crystal-charette/" shape="rect" coords="890,155,1159,218" style="outline:none;" target="_self"     />
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
                                        
                                        <div class="mobile-team-member">                                            
                                            <a href="/about/team/liz-white/">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/liz-white.jpg' ); ?>" alt="Liz White">
                                            </a>
                                            <h3 class="name">
                                                <a href="/about/team/liz-white/">
                                                    Liz White
                                                </a>
                                            </h3>
                                        </div>
                                        
                                        <div class="mobile-team-member">                                            
                                            <a href="/about/team/crystal-charette/">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/crystal-charette.jpg' ); ?>" alt="Crystal Charette">
                                            </a>
                                            <h3 class="name">
                                                <a href="/about/team/crystal-charette/">
                                                    Crystal Charette
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
