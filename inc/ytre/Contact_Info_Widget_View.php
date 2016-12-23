<div class="<?php echo isset( $instance['scmod_contact_info_width'] ) ? 'col-sm-' . $instance['scmod_contact_info_width'] : 'col-sm-12'; ?>">

    <h2 class="widget-title">
        <?php echo !empty( $instance['scmod_contact_info_title'] ) ? esc_html( $instance['scmod_contact_info_title'] ) : ''; ?>
    </h2>
    
    <div class="detail">
        <?php echo !empty( $instance['scmod_contact_info_detail'] ) ? esc_html( $instance['scmod_contact_info_detail'] ) : ''; ?>
    </div>

    <?php if( !empty( $instance['scmod_contact_info_phone'] ) ) : ?>

        <div class="contact-row">
            <span class="fa fa-phone"></span>
            <div class="details">
                <?php echo !empty( $instance['scmod_contact_info_phone'] ) ? esc_html ( $instance['scmod_contact_info_phone'] ) : ''; ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if( !empty( $instance['scmod_contact_info_email'] ) ) : ?>

        <div class="contact-row">
            <span class="fa fa-envelope"></span>
            <div class="details">
                <?php echo !empty( $instance['scmod_contact_info_email'] ) ? esc_html( $instance['scmod_contact_info_email'] ) : ''; ?>
            </div>    
        </div>

    <?php endif; ?>

    <?php if( !empty( $instance['scmod_contact_info_address'] ) ) : ?>

        <div class="contact-row">
            <span class="fa fa-map"></span>    
            <div class="details">
                <?php echo !empty( $instance['scmod_contact_info_address'] ) ? esc_html( $instance['scmod_contact_info_address'] ) : ''; ?>
            </div>
        </div>

    <?php endif; ?>

</div>