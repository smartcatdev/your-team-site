<?php get_header(); ?>

<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<div id="ytre-team-member">
    
    <div class="container" itemscope itemtype="http://schema.org/Person">

        <div class="row">

            <div class="col-sm-12">

                <div id="team-member-inner">

                    <div class="row">

                        <div class="col-sm-4">

                            <div id="ytre-member-photo">
                                
                                <?php if ( get_user_meta( $curauth->ID, 'cupp_upload_meta', true ) ) : ?>

                                        <img src="<?php echo esc_url( get_user_meta( $curauth->ID, 'cupp_upload_meta', true ) ); ?>" alt="<?php echo esc_attr( $curauth->display_name ); ?>">

                                <?php endif; ?>

                                <div id="ytre-team-actions">

                                    <a href="tel:<?php echo get_user_meta( $curauth->ID, 'mobile', true ); ?>" class="primary-button">
                                        <span class="fa fa-mobile"></span>
                                        <?php _e( 'Call', 'ytre' ); ?>
                                    </a>
                                    <a href="mailto:<?php echo $curauth->user_email; ?>" class="primary-button">
                                        <span class="fa fa-envelope-o"></span>
                                        <?php _e( 'Email', 'ytre' ); ?>
                                    </a>
                                    <a id="back-to-your-team" href="<?php echo esc_url(home_url('/about/')); ?>" class="primary-button">
                                        <span class="fa fa-undo"></span>
                                        <?php _e( 'Back to Your Team', 'ytre' ); ?>
                                    </a>
                                    
                                    <div id="ytre-team-social">
                                        
                                        <?php if ( get_the_author_meta( 'facebook', $curauth->ID ) ) : ?>
                                            <div class="inner">
                                                <a class="team-social facebook" href="<?php echo esc_url( get_the_author_meta( 'facebook', $curauth->ID ) ); ?>">
                                                    <span class="fa fa-facebook"></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ( get_the_author_meta( 'twitter', $curauth->ID ) ) : ?>
                                            <div class="inner">
                                                <a class="team-social twitter" href="<?php echo esc_url( get_the_author_meta( 'twitter', $curauth->ID ) ); ?>">
                                                    <span class="fa fa-twitter"></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ( get_the_author_meta( 'linkedin', $curauth->ID ) ) : ?>
                                            <div class="inner">
                                                <a class="team-social linkedin" href="<?php echo esc_url( get_the_author_meta( 'linkedin', $curauth->ID ) ); ?>">
                                                    <span class="fa fa-linkedin"></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ( get_the_author_meta( 'google', $curauth->ID ) ) : ?>
                                            <div class="inner">
                                                <a class="team-social googleplus" href="<?php echo esc_url( get_the_author_meta( 'google', $curauth->ID ) ); ?>">
                                                    <span class="fa fa-google-plus"></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                    </div>

                                </div>
                                
                            </div>
                            
                        </div>
                        
                        <div class="col-sm-8">

                            <div class="ytre-member-details">

                                <h2 class="name" itemprop="name"><?php echo $curauth->display_name; ?></h2>
                                <h3 class="title" itemprop="jobtitle"><?php echo get_user_meta( $curauth->ID, 'position', true ); ?></h3>

                                <div class="ytre-member-content">  
                                    <?php echo get_user_meta( $curauth->ID, 'description', true ); ?>
                                </div>
                                
                            </div>

                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</div>

<?php get_footer(); ?>