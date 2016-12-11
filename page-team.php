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
                                                <area target="" alt="Romeo Ibit" title="Romeo Ibit" href="/about/team/romeo-ibit/" coords="271,252,307,291,321,368,298,440,230,465,176,429,158,347,172,278,222,250" shape="poly">
                                                <area target="" alt="Jaunna Lessard" title="Jaunna Lessard" href="/about/team/jaunna-lessard/" coords="504,291,472,317,451,353,429,381,380,360,342,319,343,241,379,198,460,192,497,239" shape="poly">
                                                <area target="" alt="Lisa Mochan" title="Lisa Mochan" href="/about/team/lisa-mochan/" coords="496,303,466,338,439,396,438,458,468,507,527,510,569,492,596,448,591,369,574,314,529,295" shape="poly">
                                                <area target="" alt="Jeff Easton" title="Jeff Easton" href="/about/team/jeff-easton/" coords="727,252,680,259,638,293,630,332,632,397,642,439,669,473,731,485,774,467,798,435,813,364,801,300,767,266" shape="poly">
                                                <area target="" alt="Randy Comis" title="Randy Comis" href="/about/team/randy-comis/" coords="712,241,664,258,630,273,589,245,572,184,578,120,607,89,673,80,698,100,730,133,733,192" shape="poly">
                                                <area target="" alt="Erin Finn" title="Erin Finn" href="/about/team/erin-finn/" coords="931,156,890,169,852,216,841,267,837,314,870,354,915,369,973,361,1014,330,1020,272,1013,209,978,171" shape="poly">
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
