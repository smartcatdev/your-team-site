<?php
?>

<div id="single-page-container">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div id="single-property-title">
            
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-sm-12">
                        
                        <div id="prop-header-wrap">
                        
                            <div id="property-heading">

                                <h2 class="entry-title"><?php echo get_post_meta( get_the_ID(), 'property_heading', true ); ?></h2>
                                <h2 class="property-price"><?php echo '$' . number_format( get_post_meta( get_the_ID(), 'property_price', true ), 0, ".", "," ); ?></h2>

                                <div class="clear"></div>

                            </div>

                            <div id="property-icons">

                                <div class="epl-property-featured-icons property-feature-icons epl-clearfix">
                                    <?php do_action('epl_property_icons'); ?>
                                </div>

                            </div>
                            
                        </div>
                       
 
                            
                    </div>
                    
                </div>
                
            </div>

        </div>

        <div class="container">
            
            <div class="row">

                <div class="col-sm-9">

                    <div class="entry-content">

                        <div id="prop-galleria-wrap">
                                                        
                            <div id="property-gallery">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" data-title="Another title" data-description="My <i>HTML</i> description">
                                <img src="<?php echo get_template_directory_uri() . '/inc/images/rough-trans-logo.png'; ?>" data-title="My title" data-description="My description">
                            </div>
                            
                        </div>
                        
                        <div id="property-excerpt">
                            <h4 class="prop-sub-heading"><?php _e('Description', 'ytre' ); ?></h4>
                            <p>
                                <?php echo get_the_excerpt(); ?>
                            </p>
                        </div>
                        
                        <?php the_content(); ?>
                        
                    </div><!-- .entry-content -->

                </div>
                
                <div class="col-sm-3">

                    <div id="listing-agent-sidebar">
                        
			<?php do_action( 'epl_single_author' ); ?>
			
                        <?php // var_dump(get_post_meta(get_the_ID())); ?>
                        
                    </div>

                </div>

            </div>
            
        </div>
            
    </article>
        
</div>
