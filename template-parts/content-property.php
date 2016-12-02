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

                        <?php $property_images = get_post_meta( $post->ID, 'property_image_set', true ); ?>
                        
                        <?php if ( empty( $property_images ) ) : ?>
                            
                            <?php if ( has_post_thumbnail() ) : ?>
                        
                                <div id="prop-galleria-wrap" class="single">

                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>">

                                </div>

                            <?php endif; ?>
                        
                        <?php else : ?>
                        
                            <div id="prop-galleria-wrap">

                                <div id="property-gallery">
                                    
                                    <?php foreach ( $property_images as $image ) : ?>
                                    
                                        <img src="<?php echo esc_url($image); ?>">
                                    
                                    <?php endforeach; ?>
     
                                </div>

                            </div>
                        
                        <?php endif; ?>
                        
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
