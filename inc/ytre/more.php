<?php

add_filter( 'manage_edit-property_columns', 'ytre_add_featured_column' );
function ytre_add_featured_column( $columns ) {
   
    $columns[ 'is_featured' ] = 'Featured?';
    return $columns;
    
}
add_filter( 'manage_property_posts_custom_column', 'ytre_populate_featured_column', 10, 2 );
function ytre_populate_featured_column( $column_name, $post_id ) {
   
    switch( $column_name ) {
        case 'is_featured':
            if ( get_post_meta( $post_id, 'single_property_is_featured', true ) == 'featured' ) :
                echo '<div class="edit-screen-feat-toggle" id="is_featured-' . $post_id . '">' . '<span meta-id="'. $post_id .'" class="dashicons dashicons-star-filled" style="cursor: pointer;"></span>' . '</div>';
            else : 
                echo '<div class="edit-screen-feat-toggle" id="is_featured-' . $post_id . '">' . '<span meta-id="'. $post_id .'" class="dashicons dashicons-star-empty" style="cursor: pointer;"></span>' . '</div>';
            endif;
            break;
    }    
    
}
//add_filter( 'manage_edit-property_sortable_columns', 'ytre_make_sortable_columns' );
//function ytre_make_sortable_columns( $sortable_columns ) {
//
//   /**
//    * Array index and column name must match.
//    * 
//    * The value of the array item is the
//    * identifier of the column data's meta field.
//    */
//   $sortable_columns[ 'is_featured' ] = 'single_property_is_featured';
//
//   return $sortable_columns;
//   
//}
//add_action( 'pre_get_posts', 'manage_wp_posts_be_qe_pre_get_posts', 1 );
//function manage_wp_posts_be_qe_pre_get_posts( $query ) {
//
//   /**
//    * We only want our code to run in the main WP query
//    * AND if an orderby query variable is designated.
//    */
//   if ( $query->is_main_query() && ( $orderby = $query->get( 'orderby' ) ) ) {
//
//      switch( $orderby ) {
//
//         // If we're ordering by 'film_rating'
//         case 'single_property_is_featured':
//
//            // set our query's meta_key, which is used for custom fields
//            $query->set( 'meta_key', 'single_property_is_featured' );
//				
//            /**
//             * Tell the query to order by our custom field/meta_key's
//             * value, in this film rating's case: PG, PG-13, R, etc.
//             *
//             * If your meta value are numbers, change 'meta_value'
//             * to 'meta_value_num'.
//             */
//            $query->set( 'orderby', 'meta_value' );
//				
//            break;
//
//      }
//
//   }
//
//}


add_action( 'admin_footer', 'toggle_featured_property' );
function toggle_featured_property() {
  
    $ajax_nonce = wp_create_nonce( 'featured_property_nonce' ); ?>
    
    <script>
      
        jQuery( document ).ready( function( $ ) {
            
            $( '.edit-screen-feat-toggle span' ).on( 'click', function(){
                
                var clicked_star = $(this);
                
                var data = {
                    action: 'update_featured_property',
                    security: '<?php echo $ajax_nonce; ?>',
                    post_id: $(this).attr( 'meta-id' ),
                };

                $.post( ajaxurl, data, function( response ) {
                    
                    console.log( 'Got this from the server: ' + response );
                    
                    if ( response == 0 ) {
                        clicked_star.addClass('dashicons-star-filled').removeClass('dashicons-star-empty');
                    } 
                    if ( response == 1 ) {
                        clicked_star.addClass('dashicons-star-empty').removeClass('dashicons-star-filled');
                    }
                                        
                });
                
            });
            
        });
    
    </script>
    
<?php }

add_action( 'wp_ajax_update_featured_property', 'update_featured_property_callback' );
function update_featured_property_callback() {
    
    global $wpdb; // this is how you get access to the database
    check_ajax_referer( 'featured_property_nonce', 'security' );
    
    $the_id = sanitize_text_field($_POST['post_id']);
    $status = get_post_meta( $the_id, 'single_property_is_featured', true );
    
    if ( !isset( $status ) || $status == '' ) :
    
        update_post_meta( $the_id, 'single_property_is_featured', 'featured' );
        echo 0;
        
    else :
        
        update_post_meta( $the_id, 'single_property_is_featured', '' );
        echo 1;
    
    endif;
    
    die(); // this is required to return a proper result
    
}



register_widget( 'Your_Team_Contact_Info_Widget' );
register_widget( 'Your_Team_Google_Maps_Widget' );

class Your_Team_Contact_Info_Widget extends WP_Widget {

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

class Your_Team_Google_Maps_Widget extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'ytre-google-maps-widget',
            __( 'Google Maps Widget', 'ytre' ),
            array(
                'classname'   => 'ytre-google-maps',
                'description' => __( 'Display a map to the address set in Customizer', 'ytre' ),
            )
        );

    }

    public function widget( $args, $instance ) { ?>

        <div class="maps-widget <?php echo isset( $instance['ytre_google_maps_width'] ) ? 'col-sm-' . $instance['ytre_google_maps_width'] : 'col-sm-12'; ?>">

            <h4 class="widget-title">
                <?php echo !empty( $instance['ytre_google_maps_title'] ) ? esc_html( $instance['ytre_google_maps_title'] ) : ''; ?>
            </h4>
            
            <div id="ytre-google-map"></div>
    
        </div>
        
    <?php }

    public function form( $instance ) {

        $widths = array(
            '3'     => '1/4',
            '4'     => '1/3',
            '6'     => '1/2',
            '12'    => __( 'Full', 'ytre' ),
        );
       
        // Set default values
        $instance = wp_parse_args( (array) $instance, array( 
            'ytre_google_maps_title'      => __( 'Contact Info', 'ytre'),
            'ytre_google_maps_width'      => '12',
        ) );

        // Retrieve an existing value from the database
        $ytre_google_maps_title   = !empty( $instance['ytre_google_maps_title'] ) ? $instance['ytre_google_maps_title'] : '';
        $ytre_google_maps_width   = !empty( $instance['ytre_google_maps_width'] ) ? $instance['ytre_google_maps_width'] : 'full';
        
        // Title - Text
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'ytre_google_maps_title' ) . '" class="ytre_google_maps_title_label">' . __( 'Title', 'ytre' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'ytre_google_maps_title' ) . '" name="' . $this->get_field_name( 'ytre_google_maps_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'ytre' ) . '" value="' . esc_attr( $ytre_google_maps_title ) . '">';
        echo '</p>';

        // Widget Width - Select/Option
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'ytre_google_maps_width' ) . '" class="ytre_google_maps_width_label">' . __( 'Widget Width', 'ytre' ) . '</label>';
        echo '	<select id="' . $this->get_field_id( 'ytre_google_maps_width' ) . '" name="' . $this->get_field_name( 'ytre_google_maps_width' ) . '" class="widefat">';
            foreach( $widths as $key => $value ) :
                echo '<option value="' . $key . '" ' . selected( $ytre_google_maps_width, $key, false ) . '> ' . $value . '</option>';
            endforeach;
        echo '	</select>';
        echo '</p>';

    }

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['ytre_google_maps_title']   = !empty( $new_instance['ytre_google_maps_title'] ) ? strip_tags( $new_instance['ytre_google_maps_title'] ) : '';
        $instance['ytre_google_maps_width']   = !empty( $new_instance['ytre_google_maps_width'] ) ? strip_tags( $new_instance['ytre_google_maps_width'] ) : '12';
        
        return $instance;
        
    }

}