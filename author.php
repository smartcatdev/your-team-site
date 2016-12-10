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