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

                                            <img src="<?php echo esc_url( get_theme_mod( 'ytre_team_photo', get_template_directory_uri() . '/inc/images/your-team-photo-cropped.jpg' ) ); ?>" alt="Your Team" usemap="#hotspot-map">

                                            <map name="hotspot-map">
                                                <area target="" alt="Jaunna Lessard" title="Jaunna Lessard" href="/about/team/jaunna-lessard/" coords="2371,1994,2538,1864,2761,1561,2761,1306,2500,1058,2128,1021,1961,1250,1887,1561,1937,1790,2104,1951" shape="poly">
                                                <area target="" alt="Romeo Ibit" title="Romeo Ibit" href="/about/team/romeo-ibit/" coords="1336,1307,1720,1443,1819,1951,1652,2471,1249,2527,945,2316,865,1901,951,1462" shape="poly">
                                                <area target="" alt="Lisa Mochan" title="Lisa Mochan" href="/about/team/lisa-mochan/" coords="2408,2068,2731,1653,3022,1659,3189,1901,3270,2489,3121,2682,2898,2731,2631,2706,2426,2607,2346,2403" shape="poly">
                                                <area target="" alt="Randy Comis" title="Randy Comis" href="/about/team/randy-comis/" coords="3596,476,3931,662,3956,1058,3851,1343,3578,1492,3293,1392,3194,1095,3212,779,3336,532" shape="poly">
                                                <area target="" alt="Jeff Easton" title="Jeff Easton" href="/about/team/jeff-easton/" coords="3847,1375,3568,1523,3481,1821,3499,2254,3723,2514,3995,2564,4225,2440,4361,2248,4392,1883,4349,1610,4156,1381" shape="poly">
                                                <area target="" alt="Erin Finn" title="Erin Finn" href="/about/team/erin-finn/" coords="5166,892,5519,1034,5575,1369,5513,1839,5222,1994,4856,1988,4621,1858,4546,1486,4639,1158,4775,966" shape="poly">
                                            </map>

                                            <h3 id="team-photo-display-name">
                                                <?php echo get_theme_mod( 'ytre_team_photo_hover_blurb', __( 'Hover over members and click to view their profiles!', 'ytre' ) ); ?>
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
