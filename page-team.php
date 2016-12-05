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
                        
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <div class="entry-content">

                                    <div id="ytre-team-photo">
                                        
                                        <div class="inner">

                                            <img src="<?php echo esc_url( get_theme_mod( 'ytre_team_photo', get_template_directory_uri() . '/inc/images/your-team-photo-cropped.jpg' ) ); ?>" alt="Your Team" usemap="#hotspot-map">

                                            <map name="hotspot-map">
                                                <area target="" alt="Jaunna Lessard" title="Jaunna Lessard" href="/team/jaunna-lessard/" coords="2371,1994,2538,1864,2761,1561,2761,1306,2500,1058,2128,1021,1961,1250,1887,1561,1937,1790,2104,1951" shape="poly">
                                                <area target="" alt="Romeo Ibit" title="Romeo Ibit" href="/team/romeo-ibit/" coords="1336,1307,1720,1443,1819,1951,1652,2471,1249,2527,945,2316,865,1901,951,1462" shape="poly">
                                                <area target="" alt="Lisa Mochan" title="Lisa Mochan" href="/team/lisa-mochan/" coords="2408,2068,2731,1653,3022,1659,3189,1901,3270,2489,3121,2682,2898,2731,2631,2706,2426,2607,2346,2403" shape="poly">
                                                <area target="" alt="Randy Comis" title="Randy Comis" href="/team/randy-comis/" coords="3596,476,3931,662,3956,1058,3851,1343,3578,1492,3293,1392,3194,1095,3212,779,3336,532" shape="poly">
                                                <area target="" alt="Jeff Easton" title="Jeff Easton" href="/team/jeff-easton/" coords="3847,1375,3568,1523,3481,1821,3499,2254,3723,2514,3995,2564,4225,2440,4361,2248,4392,1883,4349,1610,4156,1381" shape="poly">
                                                <area target="" alt="Erin Finn" title="Erin Finn" href="/team/erin-finn/" coords="5166,892,5519,1034,5575,1369,5513,1839,5222,1994,4856,1988,4621,1858,4546,1486,4639,1158,4775,966" shape="poly">
                                            </map>

                                            <h3 id="team-photo-display-name">
                                                <?php echo get_theme_mod( 'ytre_team_photo_hover_blurb', __( 'Hover over members and click to view their profiles!', 'ytre' ) ); ?>
                                            </h3>
                                        
                                        </div>
                                        
                                    </div>
                                    
                                    <div id="sc_our_team" class="grid2 sc-col3 masonry">
    
                                        <div class="grid-sizer"></div>
                                        <div class="gutter-sizer"></div>
                                        
                                        <?php
                                            $args = array(
                                                'post_type' => 'team_member',
                                                'meta_key' => 'sc_member_order',
                                                'orderby' => 'meta_value_num',
                                                'order' => 'ASC',
                                                'posts_per_page' => -1,
                                            );
                                            $members = new WP_Query( $args );
                                        ?>
    
                                        <?php if ( $members->have_posts() ) : ?>
                                        
                                            <?php while ( $members->have_posts() ) : $members->the_post(); ?>
                                        
                                                <div itemscope itemtype="http://schema.org/Person" class="sc_team_member">
                                                    
                                                    <div class="sc_team_member_inner">

                                                        <?php $image_src = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : get_template_directory_uri() . '/inc/images/ytre-logo.png'; ?>
                                                        
                                                        <div class="image-container wp-post-image" style="background-image: url(<?php echo esc_url( $image_src ); ?>);" data-url="<?php echo esc_url( $image_src ); ?>">

                                                            <div class="image-corner" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/inc/images/our-team-triangle.png' ); ?>);">
                                                            </div>

                                                            <a href="<?php esc_url( get_the_permalink() ); ?>" rel="bookmark" class="<?php // echo $this->check_clicker( $single_template ); ?>">
                                                                <i class="fa fa-external-link icon"></i>
                                                            </a>

                                                        </div>

                                                        <div itemprop="name" class="sc_team_member_name">
                                                            <a href="<?php esc_url( get_the_permalink() ); ?>" rel="bookmark">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </div>

                                                        <?php if ( get_post_meta( get_the_ID(), 'team_member_title', true ) ) : ?>
                                                            <div itemprop="jobtitle" class="sc_team_member_jobtitle">
                                                                <?php echo get_post_meta( get_the_ID(), 'team_member_title', true ); ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if ( get_post_meta( get_the_ID(), 'team_member_qoute', true ) ) : ?>
                                                            <div class="sc_personal_quote hidden">                                                                
                                                                <span class="sc_team_icon-quote-left"></span>
                                                                <span class="sc_personal_quote_content"><?php echo get_post_meta(get_the_ID(), 'team_member_qoute', true ); ?></span>
                                                            </div>  
                                                        <?php endif; ?>

                                                        <div class="sc_team_content">
                                                            <?php echo wp_trim_words( get_the_content(), 100 ); ?>
                                                        </div>

                                                        <div class='icons hidden'>

                                                            <?php // $this->set_social( get_the_ID() ); ?>

                                                        </div>

                                                    </div>

                                                </div>
                                        
                                            <?php endwhile; ?>
                                            
                                            <?php wp_reset_postdata(); ?>
                                            
                                        <?php else : ?>
                                            
                                            <?php _e( 'There are no team members to display', 'ytre' ); ?>
                                            
                                        <?php endif; ?>
                                        
                                        <div class="clear"></div>
                                        
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
