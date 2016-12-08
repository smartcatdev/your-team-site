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
                    
                                <?php if ( has_post_thumbnail() ) : ?>

                                    <div id="ytre-member-photo">

                                        <?php echo the_post_thumbnail( 'large' ); ?>

                                        <div id="ytre-team-actions">

                                            <a class="primary-button">Button One</a>
                                            <a class="primary-button">Button Two</a>

                                        </div>

                                    </div>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-8">

                                <div class="ytre-member-details">

                                    <h2 class="name" itemprop="name"><?php echo the_title(); ?></h2>
                                    <h3 class="title" itemprop="jobtitle"><?php echo get_post_meta(get_the_ID(), 'team_member_title', true); ?></h3>

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
