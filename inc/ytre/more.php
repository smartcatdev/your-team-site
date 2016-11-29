<?php

register_widget( 'Smartcat_Contact_Info_Widget' );

class Smartcat_Contact_Info_Widget extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'smartcat-module-contact-info',
            __( 'Smartcat Contact Info', 'ytre' ),
            array(
                'classname'   => 'scmod-contact-info',
                'description' => __( 'Display your contact information', 'ytre' ),
            )
        );

    }

    public function widget( $args, $instance ) { 

        if ( file_exists( get_template_directory() . '/inc/ytre/Contact_Info_Widget_View.php' ) ) : 
            include get_template_directory() . '/inc/ytre/Contact_Info_Widget_View.php';
        endif;
        
    }

    public function form( $instance ) {

        $widths = array(
            '3'     => '1/4',
            '4'     => '1/3',
            '6'     => '1/2',
            '12'    => __( 'Full', 'ytre' ),
        );
       
        // Set default values
        $instance = wp_parse_args( (array) $instance, array( 
            'scmod_contact_info_title'      => __( 'Contact Info', 'ytre'),
            'scmod_contact_info_width'      => '12',
            'scmod_contact_info_detail'     => __( 'Detail Text', 'ytre'),
            'scmod_contact_info_phone'      => '',
            'scmod_contact_info_email'      => '',
            'scmod_contact_info_address'    => '',
        ) );

        // Retrieve an existing value from the database
        $scmod_contact_info_title   = !empty( $instance['scmod_contact_info_title'] ) ? $instance['scmod_contact_info_title'] : '';
        $scmod_contact_info_width   = !empty( $instance['scmod_contact_info_width'] ) ? $instance['scmod_contact_info_width'] : 'full';
        $scmod_contact_info_detail  = !empty( $instance['scmod_contact_info_detail'] ) ? $instance['scmod_contact_info_detail'] : '';
        $scmod_contact_info_phone   = !empty( $instance['scmod_contact_info_phone'] ) ? $instance['scmod_contact_info_phone'] : '';
        $scmod_contact_info_email   = !empty( $instance['scmod_contact_info_email'] ) ? $instance['scmod_contact_info_email'] : '';
        $scmod_contact_info_address = !empty( $instance['scmod_contact_info_address'] ) ? $instance['scmod_contact_info_address'] : '';
        
        // Title - Text
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_contact_info_title' ) . '" class="scmod_contact_info_title_label">' . __( 'Title', 'ytre' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'scmod_contact_info_title' ) . '" name="' . $this->get_field_name( 'scmod_contact_info_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'ytre' ) . '" value="' . esc_attr( $scmod_contact_info_title ) . '">';
        echo '</p>';

        // Widget Width - Select/Option
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_contact_info_width' ) . '" class="scmod_contact_info_width_label">' . __( 'Widget Width', 'ytre' ) . '</label>';
        echo '	<select id="' . $this->get_field_id( 'scmod_contact_info_width' ) . '" name="' . $this->get_field_name( 'scmod_contact_info_width' ) . '" class="widefat">';
            foreach( $widths as $key => $value ) :
                echo '<option value="' . $key . '" ' . selected( $scmod_contact_info_width, $key, false ) . '> ' . $value . '</option>';
            endforeach;
        echo '	</select>';
        echo '</p>';

        // Detail Text - Text
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_contact_info_detail' ) . '" class="scmod_contact_info_detail_label">' . __( 'Detail Text', 'ytre' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'scmod_contact_info_detail' ) . '" name="' . $this->get_field_name( 'scmod_contact_info_detail' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'ytre' ) . '" value="' . esc_attr( $scmod_contact_info_detail ) . '">';
        echo '</p>';
        
        // Phone - Tel
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_contact_info_phone' ) . '" class="scmod_contact_info_phone_label">' . __( 'Phone Number', 'ytre' ) . '</label>';
        echo '	<input type="tel" id="' . $this->get_field_id( 'scmod_contact_info_phone' ) . '" name="' . $this->get_field_name( 'scmod_contact_info_phone' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'ytre' ) . '" value="' . esc_attr( $scmod_contact_info_phone ) . '">';
        echo '</p>';
          
        // Email - Email
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_contact_info_email' ) . '" class="scmod_contact_info_email_label">' . __( 'Email', 'ytre' ) . '</label>';
        echo '	<input type="email" id="' . $this->get_field_id( 'scmod_contact_info_email' ) . '" name="' . $this->get_field_name( 'scmod_contact_info_email' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'ytre' ) . '" value="' . esc_attr( $scmod_contact_info_email ) . '">';
        echo '</p>';
        
        // Address - TextArea
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_contact_info_address' ) . '" class="scmod_contact_info_address_label">' . __( 'Address', 'ytre' ) . '</label>';
        echo '	<textarea id="' . $this->get_field_id( 'scmod_contact_info_address' ) . '" name="' . $this->get_field_name( 'scmod_contact_info_address' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'ytre' ) . '">' . $scmod_contact_info_address . '</textarea>';
        echo '</p>';

    }

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['scmod_contact_info_title']   = !empty( $new_instance['scmod_contact_info_title'] ) ? strip_tags( $new_instance['scmod_contact_info_title'] ) : '';
        $instance['scmod_contact_info_width']   = !empty( $new_instance['scmod_contact_info_width'] ) ? strip_tags( $new_instance['scmod_contact_info_width'] ) : '12';
        $instance['scmod_contact_info_detail']  = !empty( $new_instance['scmod_contact_info_detail'] ) ? strip_tags( $new_instance['scmod_contact_info_detail'] ) : '';
        $instance['scmod_contact_info_phone']   = !empty( $new_instance['scmod_contact_info_phone'] ) ? strip_tags( $new_instance['scmod_contact_info_phone'] ) : '';
        $instance['scmod_contact_info_email']   = !empty( $new_instance['scmod_contact_info_email'] ) ? strip_tags( $new_instance['scmod_contact_info_email'] ) : '';
        $instance['scmod_contact_info_address'] = !empty( $new_instance['scmod_contact_info_address'] ) ? strip_tags( $new_instance['scmod_contact_info_address'] ) : '';
        
        return $instance;
        
    }

}