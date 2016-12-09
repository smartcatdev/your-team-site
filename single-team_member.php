<?php
get_header();
$options = get_option('smartcat_team_options');
$plugin = new SmartcatTeamPlugin();
?>

<div id="ytre-team-member">

    <?php while (have_posts()) : the_post(); ?>
    
        <div class="container" itemscope itemtype="http://schema.org/Person">

            <div class="row">
                
                <div class="col-sm-12">
                    
                    <div id="team-member-inner">
                        
                        <div class="row">
                            
                            <div class="col-sm-4">
                    
                                <div id="ytre-member-photo">

                                    <?php if ( has_post_thumbnail() ) : ?>

                                        <?php echo the_post_thumbnail( 'large' ); ?>

                                    <?php endif; ?>

                                    <div id="ytre-team-actions">

                                        <a href="tel:<?php echo get_post_meta( get_the_ID(), 'team_member_phone', true ); ?>" class="primary-button">
                                            <span class="fa fa-mobile"></span>
                                            <?php _e( 'Call', 'ytre' ); ?>
                                        </a>
                                        <a href="mailto:<?php echo get_post_meta( get_the_ID(), 'team_member_email', true ); ?>" class="primary-button">
                                            <span class="fa fa-envelope-o"></span>
                                            <?php _e( 'Email', 'ytre' ); ?>
                                        </a>

                                    </div>
                                    
                                </div>

                            </div>

                            <div class="col-sm-8">

                                <div class="ytre-member-details">

                                    <h2 class="name" itemprop="name"><?php echo the_title(); ?></h2>
                                    <h3 class="title" itemprop="jobtitle"><?php echo get_post_meta( get_the_ID(), 'team_member_title', true ); ?></h3>

                                    <div class="ytre-member-content">  
                                        <?php the_content(); ?>
                                    </div>

                                </div>

                            </div>
                            
                        </div>
                        
                    </div>
                                        
                </dic>
                
            </div>
            
        </div>

    <?php endwhile; ?>
    
</div>
<?php get_footer(); ?>
