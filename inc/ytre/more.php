<?php

function ytre_add_ajax_url() { ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
    </script>
<?php }
add_action('wp_head', 'ytre_add_ajax_url', 0);

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

add_action( 'admin_footer', 'toggle_featured_property' );
function toggle_featured_property() {
  
    $ajax_nonce = wp_create_nonce( 'featured_property_nonce' ); ?>
    
    <script>
      
        jQuery( document ).ready( function( $ ) {
            
            $( '.edit-screen-feat-toggle span' ).on( 'click', function(){
                
                var clicked_star = $(this);
                
                var data = {
                    action: 'ytre_update_featured_property',
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

add_action( 'wp_ajax_ytre_update_featured_property', 'ytre_update_featured_property_callback' );
function ytre_update_featured_property_callback() {
    
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

new Ytre_Property_Images_Meta_Box();
class Ytre_Property_Images_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',        array ( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php',    array ( $this, 'init_metabox' ) );
        }
        
    }

    public function init_metabox() {

        add_action( 'add_meta_boxes',           array ( $this, 'add_metabox' ) );
        add_action( 'save_post',                array ( $this, 'save_metabox' ), 10, 2 );
        
    }

    public function add_metabox() {

        add_meta_box( 'ytre_property_images_meta', __( 'Property Images', 'ytre' ), array ( $this, 'render_ytre_property_images_metabox' ), array( 'property' ), 'normal', 'high' );
        
    }

    public function render_ytre_property_images_metabox( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( 'ytre_property_images_meta_box_nonce_action', 'ytre_property_images_meta_box_nonce' );

        // Retrieve an existing value from the database.
        $property_images      = get_post_meta( $post->ID, 'property_image_set' );

        // Set default values.
        if ( empty( $property_images ) )    { $property_images = array(); } 
        
        // Form fields
        echo '<table class="form-table">';
        
        if ( !empty( $property_images ) ) :
        
            /**
             * Multiple Images Set 
             */
            $ctr = 1;
            foreach ( $property_images[0] as $image ) :

                echo '	<tr>';
                echo '		<th style="vertical-align: middle;"><label for="property_image_set" class="property_image_set_label">' . __( 'Image #' . $ctr, 'ytre' ) . '</label></th>';    
                echo '		<td>';
                echo '		    <div class="form-group smartcat-uploader">';
                echo '	                <input type="text" id="property_image_set" name="property_image_set[]" value="' . esc_url($image) . '" class="property_image_set_field">';
                echo '		    </div>';
                echo '		</td>';
                echo '		<td>';
                echo '              <div><img src="' . esc_url($image) . '" style="height: 100px; margin: 1px 3px; border-radius: 4px;"></div>';
                echo '		</td>';
                echo '		<td>';
                echo '              <div class="delete-uploaded-row"><span class="dashicons dashicons-trash"></span></div>';
                echo '		</td>';
                echo '	</tr>';

                $ctr++;

            endforeach;
            
            /**
             * Add New Image Field
             */
            echo '	<tr>';
            echo '		<th style="vertical-align: middle;"><label for="property_image_set" class="add_new_image_row">' . __( 'Add an image?', 'ytre' ) . '</label></th>';    
            echo '	</tr>';
            
        else :
            
            /**
             * Add New Image Field
             */
            echo '	<tr>';
            echo '		<th style="vertical-align: middle;"><label for="property_image_set" class="add_new_image_row">' . __( 'Add an image?', 'ytre' ) . '</label></th>';    
            echo '	</tr>';
            
        endif;
        
        echo '</table>';
        
    }
    
    public function save_metabox( $post_id, $post ) {

        // Add nonce for security and authentication.
        $nonce_name     = isset( $_POST[ 'ytre_property_images_meta_box_nonce' ] ) ? $_POST[ 'ytre_property_images_meta_box_nonce' ] : '';
        $nonce_action   = 'ytre_property_images_meta_box_nonce_action';

        // Check if a nonce is set and valid
        if ( !isset( $nonce_name ) ) { return; }
        if ( !wp_verify_nonce( $nonce_name, $nonce_action ) ) { return; }
            
        // Sanitize user input.
        
        if ( isset( $_POST[ 'property_image_set' ] ) ) :
            $property_images = $_POST[ 'property_image_set' ];
        else : 
            $property_images = array();
        endif;

        // Update the meta field in the database
        update_post_meta( $post_id, 'property_image_set', $property_images );
        
    }
    
}


$labels = array (

    'name'                  => _x( 'Events', 'Post Type General Name', 'ytre' ),
    'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'ytre' ),
    'menu_name'             => __( 'Events', 'ytre' ),
    'name_admin_bar'        => __( 'Events', 'ytre' ),
    'archives'              => __( 'Archives', 'ytre' ),
    'parent_item_colon'     => __( 'Parent Item:', 'ytre' ),
    'all_items'             => __( 'All Events', 'ytre' ),
    'add_new_item'          => __( 'Add New Event', 'ytre' ),
    'add_new'               => __( 'Add New', 'ytre' ),
    'new_item'              => __( 'New Event', 'ytre' ),
    'edit_item'             => __( 'Edit Event', 'ytre' ),
    'update_item'           => __( 'Update Event', 'ytre' ),
    'view_item'             => __( 'View Event', 'ytre' ),
    'search_items'          => __( 'Search Events', 'ytre' ),
    'not_found'             => __( 'Not found', 'ytre' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'ytre' ),
    'featured_image'        => __( 'Featured Image', 'ytre' ),
    'set_featured_image'    => __( 'Set featured image', 'ytre' ),
    'remove_featured_image' => __( 'Remove featured image', 'ytre' ),
    'use_featured_image'    => __( 'Use as featured image', 'ytre' ),
    'insert_into_item'      => __( 'Insert into event', 'ytre' ),
    'uploaded_to_this_item' => __( 'Uploaded to this event', 'ytre' ),
    'items_list'            => __( 'Events list', 'ytre' ),
    'items_list_navigation' => __( 'Jobs list navigation', 'ytre' ),
    'filter_items_list'     => __( 'Filter events', 'ytre' ),

);
$args = array (

    'label'                 => __( 'Event', 'ytre' ),
    'description'           => __( 'Events', 'ytre' ),
    'labels'                => $labels,
    'supports'              => array ( 'title', 'editor', 'author', 'thumbnail', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-calendar-alt',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',

);
register_post_type( 'event', $args );

new Your_Team_Event_Meta_Box;
class Your_Team_Event_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',        array ( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php',    array ( $this, 'init_metabox' ) );
        }
        
    }

    public function init_metabox() {

        add_action( 'add_meta_boxes',           array ( $this, 'add_metabox' ) );
        add_action( 'save_post',                array ( $this, 'save_metabox' ), 10, 2 );
        
    }

    public function add_metabox() {

        add_meta_box( 'event_meta', __( 'Event Details', 'ytre' ), array ( $this, 'render_event_metabox' ), 'event', 'normal', 'high' );
        
    }

    public function render_event_metabox( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( 'event_meta_box_nonce_action', 'event_meta_box_nonce' );

        // Retrieve an existing value from the database.
        $event_date         = get_post_meta( $post->ID, 'event_meta_date', true );
        $event_time_start   = get_post_meta( $post->ID, 'event_meta_time_start', true );
        $event_time_end     = get_post_meta( $post->ID, 'event_meta_time_end', true );
        $event_location     = get_post_meta( $post->ID, 'event_meta_location', true );

        // Set default values.
        if ( empty( $event_date ) )         { $event_date = ''; } 
        if ( empty( $event_time_start ) )   { $event_time_start = ''; }
        if ( empty( $event_time_end ) )     { $event_time_end = ''; }
        if ( empty( $event_location ) )     { $event_location = ''; }
            
        // Form fields.
        echo '<table class="form-table">';

        echo '	<tr>';
        echo '		<th><label for="event_meta_date" class="event_meta_date_label">' . __( 'Date', 'ytre' ) . '</label></th>';
        echo '		<td>';
        echo '			<input type="date" id="event_meta_date" name="event_meta_date" class="event_meta_date_field" placeholder="' . esc_attr__( '', 'ytre' ) . '" value="' . esc_attr__( $event_date ) . '">';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="event_meta_time_start" class="event_meta_time_start_label">' . __( 'Time Start', 'ytre' ) . '</label></th>';
        echo '		<td>';
        echo '			<input type="time" id="event_meta_time_start" name="event_meta_time_start" class="event_meta_time_start_field" placeholder="' . esc_attr__( '', 'ytre' ) . '" value="' . esc_attr__( $event_time_start ) . '">';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="event_meta_time_end" class="event_meta_time_end_label">' . __( 'Time End', 'ytre' ) . '</label></th>';
        echo '		<td>';
        echo '			<input type="time" id="event_meta_time_end" name="event_meta_time_end" class="event_meta_time_end_field" placeholder="' . esc_attr__( '', 'ytre' ) . '" value="' . esc_attr__( $event_time_end ) . '">';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="event_meta_location" class="event_meta_location_label">' . __( 'Location', 'ytre' ) . '</label></th>';
        echo '		<td>';
        echo '			<input type="text" id="event_meta_location" name="event_meta_location" class="event_meta_location_field" placeholder="' . esc_attr__( '', 'ytre' ) . '" value="' . esc_attr__( $event_location ) . '">';
        echo '		</td>';
        echo '	</tr>';

        echo '</table>';
        
    }
    
    public function save_metabox( $post_id, $post ) {

        // Add nonce for security and authentication.
        $nonce_name = isset( $_POST[ 'event_meta_box_nonce' ] ) ? $_POST[ 'event_meta_box_nonce' ] : '';
        $nonce_action = 'event_meta_box_nonce_action';

        // Check if a nonce is set and valid
        if ( !isset( $nonce_name ) ) { return; }
        if ( !wp_verify_nonce( $nonce_name, $nonce_action ) ) { return; }
            
        // Sanitize user input.
        $event_date = isset( $_POST[ 'event_meta_date' ] ) ? sanitize_text_field( $_POST[ 'event_meta_date' ] ) : '';
        $event_time_start = isset( $_POST[ 'event_meta_time_start' ] ) ? sanitize_text_field( $_POST[ 'event_meta_time_start' ] ) : '';
        $event_time_end = isset( $_POST[ 'event_meta_time_end' ] ) ? sanitize_text_field( $_POST[ 'event_meta_time_end' ] ) : '';
        $event_location = isset( $_POST[ 'event_meta_location' ] ) ? sanitize_text_field( $_POST[ 'event_meta_location' ] ) : '';

        // Update the meta field in the database.
        update_post_meta( $post_id, 'event_meta_date', $event_date );
        update_post_meta( $post_id, 'event_meta_time_start', $event_time_start );
        update_post_meta( $post_id, 'event_meta_time_end', $event_time_end );
        update_post_meta( $post_id, 'event_meta_location', $event_location );
        
    }
    
}
