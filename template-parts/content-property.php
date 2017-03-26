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
                                <h2 class="property-price">
                                    <?php echo '$' . number_format( intval( get_post_meta( get_the_ID(), 'property_price', true ) ), 0, ".", "," ); ?>
                                </h2>

                                <div class="clear"></div>
                                
                                <?php if ( get_post_meta( get_the_ID(), 'mls_listing_number', true ) ) : ?>
                                    <div class="mls-number-box">
                                        <h3 class="property-mls-number"><?php _e( 'MLS® Number', 'ytre' ); ?>: <?php echo get_post_meta( get_the_ID(), 'mls_listing_number', true ); ?></h3>
                                    </div>
                                <?php endif; ?>

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
        
        <div id="single-property-wrap">
        
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
                            
                            <div id="property-details">

                                <!-- Nav tabs -->
                                <ul class="nav nav-pills" role="tablist">
                                    <li role="presentation" class="active"><a href="#features" aria-controls="features" role="tab" data-toggle="tab"><?php _e( 'Overview / Features', 'ytre' ); ?></a></li>
                                    <?php if ( get_post_meta( get_the_ID(), 'property_address_hide_map', true ) != 'yes' ) : ?>
                                        <li role="presentation"><a href="#directions" aria-controls="directions" role="tab" data-toggle="tab"><?php _e( 'Get Directions', 'ytre' ); ?></a></li>
                                    <?php endif; ?>
                                        <li><div id="browser-back-button" class="primary-button"><?php _e( 'Go Back to Listings', 'ytre' ); ?></div></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    
                                    <div role="tabpanel" class="tab-pane fade in active" id="features">
                                        
                                        <div id="property-excerpt">
                                            
                                            <?php if ( has_excerpt() ) : ?>
                                            
                                                <div class="sub-section">
                                                    <h4 class="prop-sub-heading"><?php _e( 'Summary', 'ytre' ); ?></h4>
                                                    <p>
                                                        <?php echo get_the_excerpt(); ?>
                                                    </p>
                                                </div>
                                            
                                            <?php endif; ?>
                                            
                                            <div class="sub-section">
                                                <h4 class="prop-sub-heading"><?php _e( 'Full Description', 'ytre' ); ?></h4>
                                                <?php the_content(); ?>
                                            </div>
                                            
                                        </div>
                                        
                                        <h4 class="prop-sub-heading"><?php _e( 'Property Features', 'ytre' ); ?></h4>
                                        <div class="epl-tab-section epl-tab-section-features">
                                            <?php do_action('epl_property_tab_section'); ?>
                                        </div>
                                        
                                    </div>
                                    
                                    <?php if ( get_post_meta( get_the_ID(), 'property_address_hide_map', true ) != 'yes' ) : ?>
                                    
                                        <div role="tabpanel" class="tab-pane fade" id="directions">

                                            <h4 class="prop-sub-heading"><?php _e( 'Show Location on Google Maps', 'ytre' ); ?></h4>
                                            <a class="primary-button" target="_BLANK" href="<?php echo esc_url( 'http://www.google.com/maps/dir/' . get_post_meta( get_the_ID(), 'property_address_coordinates', true ) ); ?>">
                                                <?php _e( 'Locate', 'ytre' ); ?>
                                            </a>

                                        </div>
                                    
                                    <?php endif; ?>
                                    
                                </div>

                            </div>
                            
                        </div><!-- .entry-content -->

                    </div>

                    <div class="col-sm-3">

                        <div id="listing-agent-sidebar">

                            <?php do_action( 'epl_single_author' ); ?>

                        </div>

                    </div>

                </div>

            </div>
            
        </div>
            
    </article>
        
</div>
