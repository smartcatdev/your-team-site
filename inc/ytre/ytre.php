<?php

/**
 * Enqueue scripts and styles.
 */
function ytre_scripts() {
	
    wp_enqueue_style( 'ytre-style', get_stylesheet_uri() );

    // Load Fonts from array
    $fonts = ytre_fonts();

    // Primary Font Enqueue
    if( array_key_exists ( get_theme_mod( 'ytre_font_primary', 'Montserrat, sans-serif'), $fonts ) ) :
        wp_enqueue_style( 'google-font-primary', '//fonts.googleapis.com/css?family=' . $fonts[ get_theme_mod( 'ytre_font_primary', 'Montserrat, sans-serif' ) ], array(), YTRE_VERSION );
    endif;

    // Body Font Enqueue
    if( array_key_exists ( get_theme_mod( 'ytre_font_body', 'Lato, sans-serif'), $fonts ) ) :
        wp_enqueue_style( 'google-font-body', '//fonts.googleapis.com/css?family=' . $fonts[ get_theme_mod( 'ytre_font_body', 'Lato, sans-serif' ) ], array(), YTRE_VERSION );
    endif;
        
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array(), YTRE_VERSION );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), YTRE_VERSION );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/inc/css/owl.carousel.css', array(), YTRE_VERSION );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/inc/css/animate.css', array(), YTRE_VERSION );
    wp_enqueue_style( 'ytre-main-style', get_template_directory_uri() . '/inc/css/ytre.css', array(), YTRE_VERSION );

    wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/inc/js/owl.carousel.min.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'bootstrap-tabs-js', get_template_directory_uri() . '/inc/js/bootstrap.tabs.min.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'galleria-js', get_template_directory_uri() . '/inc/js/galleria/galleria-1.4.7.min.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'tubular-js', get_template_directory_uri() . '/inc/js/jquery.tubular.1.0.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'ytre-main-script', get_template_directory_uri() . '/inc/js/script.js', array('jquery','jquery-masonry'), YTRE_VERSION, true );

//    wp_dequeue_script( 'epl-am-map-api' );
    
    // Google Maps JavaScript API
//    if ( get_theme_mod( 'ytre_google_maps_api_key', '' ) != '' ) :
//        wp_enqueue_script( 'ytre-google-maps-js', '//maps.googleapis.com/maps/api/js?key=' . get_theme_mod( 'ytre_google_maps_api_key', '' ), array('jquery'), YTRE_VERSION, true );    
//    endif;
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'ytre_scripts' );

/**
 * Media Uploader Enqueue
 */
function ytre_load_admin_libs() {
    wp_enqueue_media();
    wp_enqueue_script( 'wp-media-uploader', get_template_directory_uri() . '/inc/js/wp_media_uploader.js', array( 'jquery' ), YTRE_VERSION );
    wp_enqueue_script( 'ytre-main-admin-script', get_template_directory_uri() . '/inc/js/admin_script.js', array( 'jquery' ), YTRE_VERSION );
}
add_action( 'admin_enqueue_scripts', 'ytre_load_admin_libs' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ytre_widgets_init() {
    
    register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'ytre' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'ytre' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
            'name'          => esc_html__( 'Featured Listings - Below', 'ytre' ),
            'id'            => 'sidebar-featured-listings',
            'description'   => esc_html__( 'Add widgets here.', 'ytre' ),
            'before_widget' => '<div class="col-sm-4"><section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section></div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
            'name'          => esc_html__( 'Footer - Frontpage', 'ytre' ),
            'id'            => 'sidebar-footer-frontpage',
            'description'   => esc_html__( 'Add widgets here.', 'ytre' ),
            'before_widget' => '<div class="col-sm-4"><section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section></div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
            'name'          => esc_html__( 'Footer', 'ytre' ),
            'id'            => 'sidebar-footer',
            'description'   => esc_html__( 'Add widgets here.', 'ytre' ),
            'before_widget' => '<div class="col-sm-4"><section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section></div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
    ) );
    
}
add_action( 'widgets_init', 'ytre_widgets_init' );

/**
 * Inject custom CSS in the header to handle certain theme mods.
 */
function ytre_custom_css() { ?>

    <style type="text/css">
        
        /* ---------- FONT FAMILIES ---------- */
        
        body,
        .listing-tile .listing-price,
        .galleria-theme-classic .galleria-info-title,
        .galleria-theme-classic .galleria-info-description,
        #listing-agent-sidebar .epl-author-box .epl-author-title a {
            font-family: <?php echo esc_attr( get_theme_mod( 'ytre_font_body', 'Lato, sans-serif' ) ); ?>;
        }
        
        h1,h2,h3,h4,h5,h6,
        ul#primary-menu li a,
        .property-box .property-address a,
        #listing-agent-sidebar .epl-author-position.author-position,
        #listing-agent-sidebar .epl-author-contact.author-contact {
            font-family: <?php echo esc_attr( get_theme_mod( 'ytre_font_primary', 'Montserrat, sans-serif' ) ); ?>;
        }

        /* ---------- FONT SIZES ---------- */
        
        ul#primary-menu li a {
            font-size: <?php echo esc_attr( get_theme_mod( 'ytre_nav_menu_font_size', 11 ) ); ?>px;
        }
        
        #jumbotron-content .jumbo-title {
            font-size: <?php echo esc_attr( get_theme_mod( 'ytre_jumbotron_title_size', 30 ) ); ?>px;
        }
        
        /* ---------- THEME COLORS ---------- */
        
        <?php $skin = ytre_get_skin_colors(); ?>
        
        /* --- PRIMARY COLOR --- */

            #jumbotron-tagline,
            footer#colophon,
            div#single-title-box,
            .galleria-theme-classic .galleria-info-text {
                background-color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>;
            }
            
            ul#primary-menu li.current-menu-item a,
            ul#primary-menu li:hover a,
            .listing-tile .listing-price,
            h2#featured-listing-heading,
            #property-heading .entry-title,
            #listing-agent-sidebar .epl-author-box .epl-author-title a,
            .property-box .price,
            .jumbo-title span {
                color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>;
            }
            
            div#jumbotron-content,
            ul#primary-menu li:hover a,
            .listing-tile:hover .listing-details,
            .search-form input.search-field:focus,
            #property-heading,
            header#masthead {
                border-color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>;
            }
        
        /* --- SECONDARY COLOR --- */
        
            div#jumbotron-buttons a.button,
            a.primary-button,
            div#featured-listings-widgets .widget,
            .search-form input.search-submit,
            .view-toggle-button,
            #listing-agent-sidebar ul.epl-author-tabs li,
            .galleria-info-link,
            .galleria-info-text {    
                background-color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?>;
            }
            
            .nav-pills>li>a,
            .nav-pills>li.active>a,
            .nav-pills>li.active:hover>a{
                background-color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?> !important;
            }
        
        /* --- SECONDARY ACCENT COLOR --- */
        
            div#jumbotron-buttons a.button,
            a.primary-button,
            div#featured-listings-widgets .widget,
            .search-form input.search-submit,
            .view-toggle-button,
            #listing-agent-sidebar ul.epl-author-tabs li,
            .galleria-info-link,
            .galleria-info-text,
            .nav-pills>li>a {
                border-color: <?php echo esc_attr( $skin[ 'secondary_accent' ] ); ?>;
            }
        
            #placeholder-style-rule {
                color: <?php echo esc_attr( $skin[ 'secondary_accent' ] ); ?>;
            }
            
        /* --- JUMBOTRON TINT --- */
        
        div#tubular-shield {
            height: 400px !important;
            background-color: rgba( 0, 0, 0, <?php echo esc_attr( get_theme_mod( 'ytre_jumbotron_dark_tint', .5 ) ); ?> );
        }
            
    </style>
    
    <?php 
    
}
add_action('wp_head', 'ytre_custom_css');

/**
 * Inject custom JS in the header to handle certain scripted actions.
 */
function ytre_custom_js() { ?>
    
    <script type="text/javascript">
    
        jQuery(document).ready( function( $ ) {

            /**
             * OwlCarousel Init 
             */
            $("#featured-listings").owlCarousel({
                slideSpeed : 400,
                paginationSpeed : 1000,
                autoPlay : true,
                items : 4,
                itemsDesktop : [767,2],
                itemsMobile : [499,1],
                pagination : false,
                navigation : true,
                navigationText : ["Prev","Next"]
            });    
            
            if ( $('#property-gallery').length ) {
            
                Galleria.loadTheme('<?php echo esc_js( get_template_directory_uri() ); ?>/inc/js/galleria/themes/classic/galleria.classic.min.js');
                Galleria.configure({
                    imageCrop: true,
                });
                Galleria.run('#property-gallery');
                
            }

            /**
             * Jumbotron and Video Background
             */
            $('#jumbotron-section').tubular({ 
                videoId: 'AK-MUzWdpjU',
            });
            $('#tubular-container').appendTo('#jumbotron-section');
            $('#tubular-shield').appendTo('#jumbotron-section');
            $(window).load(function () {
                $('#tubular-container').delay(650).animate({
                    opacity: 1
                }, 500 );
            });
           
            <?php if ( false ) : ?>
            <?php // if ( get_theme_mod( 'ytre_google_maps_api_key', '' ) != '' ) : ?>
           
                if ( $('#ytre-google-map').length > 0 ) {
           
//                    google.maps.event.addDomListener( window, 'load', init );
//
//                    function init() {
//
//                        var geocoder = new google.maps.Geocoder();
//                        var address = '<?php echo esc_attr( get_theme_mod( 'ytre_google_maps_address', 'Kingston, ON' ) ); ?>';
//
//                        geocoder.geocode( { 'address' : address }, function( results, status ) {
//
//                            if ( status == google.maps.GeocoderStatus.OK ) {
//
//                                var the_latitude = results[0].geometry.location.lat();
//                                var the_longitude = results[0].geometry.location.lng();
//
//                                // Basic options for a simple Google Map
//                                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
//                                var mapOptions = {
//
//                                    // How zoomed in you want the map to start at (always required)
//                                    zoom: 15,
//
//                                    // no scroll zooming
//                                    scrollwheel: false,
//
//                                    // The latitude and longitude to center the map (always required)
//                                    center: new google.maps.LatLng(
//                                        the_latitude, 
//                                        the_longitude
//                                    ),
//
//                                    // How you would like to style the map. 
//                                    // This is where you would paste any style found on Snazzy Maps.
//                                    styles: <?php echo get_theme_mod( 'ytre_google_maps_style', '[{"featureType":"all","elementType":"geometry.stroke","stylers":[{"color":"#818a89"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40},{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#7c8382"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#818a89"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#818a89"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#222322"},{"lightness":17},{"weight":"0.46"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#191919"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#818a89"},{"lightness":17}]}]'); ?>
//
//                                };
//
//                                // Get the HTML DOM element that will contain your map 
//                                // We are using a div with id="map" seen below in the <body>
//                                var mapElement = document.getElementById('ytre-google-map');
//
//                                // Create the Google Map using our element and options defined above
//                                var map = new google.maps.Map(mapElement, mapOptions);
//
//                                // Let's also add a marker while we're at it
//                                var image = '<?php echo esc_url( get_theme_mod( 'ytre_google_maps_icon', get_template_directory_uri() . '/inc/images/map-pointer.png' ) ); ?>';
//                                var marker = new google.maps.Marker({
//                                    position: new google.maps.LatLng( the_latitude, the_longitude ),
//                                    map: map,
//                                    title: '<?php echo esc_attr( get_theme_mod( 'ytre_google_maps_title', '' ) ); ?>',
//                                    icon: image
//                                });
//
//                            }
//
//                        }); 
//
//                    }
                    
                }

            <?php endif; ?>

            /*
            * Handle Blog Roll Masonry
            */
            function doMasonry() {

                var $grid = $( ".epl-shortcode-listing" ).imagesLoaded(function () {
                    $grid.masonry({
                        itemSelector: '.epl-listing-post',
                        columnWidth: '.grid-sizer',
                        percentPosition: true,
                        gutter: '.gutter-sizer',
                        transitionDuration: '.75s'
                    });
                });

                if ( $( window ).width() >= 992 ) {  

                    $('.gutter-sizer').css('width', '2%');
                    $('.grid-sizer').css('width', '23.5%');
                    $('.epl-shortcode-listing .epl-listing-post').css('width', '23.5%');

                } else if ( $( window ).width() < 992 && $( window ).width() >= 768 ) {

                    $('.gutter-sizer').css('width', '2%');
                    $('.grid-sizer').css('width', '48%');
                    $('.epl-shortcode-listing .epl-listing-post').css('width', '48%');

                } else {

                    $('.gutter-sizer').css('width', '0%');
                    $('.grid-sizer').css('width', '100%');
                    $('.epl-shortcode-listing .epl-listing-post').css('width', '100%');

                }
                    
            }

            /**
            * Call Masonry on window resize and load
            */
            $('.gutter-sizer').prependTo('.epl-shortcode-listing');
            $('.grid-sizer').prependTo('.epl-shortcode-listing');
            $( window ).resize( function() {
                doMasonry();
            });
            doMasonry();
            
            $('#listing-toggle a').click( function (e) {
                e.preventDefault();
                doMasonry();
                $(this).tab('show');
            });
           
        });
    
    </script>
    
<?php }
add_action('wp_head', 'ytre_custom_js');

/**
 * Returns all available fonts as an array.
 * 
 * @return array of fonts
 */
function ytre_fonts(){
    
    $font_family_array = array(
        
        'Abel, sans-serif'                                  => 'Abel',
        'Arvo, serif'                                       => 'Arvo:400,400i,700',
        'Bangers, cursive'                                  => 'Bangers',
        'Courgette, cursive'                                => 'Courgette',
        'Domine, serif'                                     => 'Domine',
        'Dosis, sans-serif'                                 => 'Dosis:200,300,400',
        'Droid Sans, sans-serif'                            => 'Droid+Sans:400,700',
        'Economica, sans-serif'                             => 'Economica:400,700',
        'Josefin Sans, sans-serif'                          => 'Josefin+Sans:300,400,600,700',
        'Itim, cursive'                                     => 'Itim',
        'Lato, sans-serif'                                  => 'Lato:100,300,400,700,900,300italic,400italic',
        'Lobster Two, cursive'                              => 'Lobster+Two',
        'Lora, serif'                                       => 'Lora',
        'Lilita One, cursive'                               => 'Lilita+One',
        'Montserrat, sans-serif'                            => 'Montserrat:400,700',
        'Noto Serif, serif'                                 => 'Noto+Serif',
        'Old Standard TT, serif'                            => 'Old+Standard+TT:400,400i,700',
        'Open Sans, sans-serif'                             => 'Open Sans',
        'Open Sans Condensed, sans-serif'                   => 'Open+Sans+Condensed:300,300i,700',
        'Orbitron, sans-serif'                              => 'Orbitron',
        'Oswald, sans-serif'                                => 'Oswald:300,400',
        'Poiret One, cursive'                               => 'Poiret+One',
        'PT Sans Narrow, sans-serif'                        => 'PT+Sans+Narrow',
        'Rajdhani, sans-serif'                              => 'Rajdhani:300,400,500,600',
        'Raleway, sans-serif'                               => 'Raleway:200,300,400,500,700',
        'Roboto, sans-serif'                                => 'Roboto:100,300,400,500',
        'Roboto Condensed, sans-serif'                      => 'Roboto+Condensed:400,300,700',
        'Shadows Into Light, cursive'                       => 'Shadows+Into+Light',
        'Shrikhand, cursive'                                => 'Shrikhand',
        'Source Sans Pro, sans-serif'                       => 'Source+Sans+Pro:200,400,600',
        'Teko, sans-serif'                                  => 'Teko:300,400,600',
        'Titillium Web, sans-serif'                         => 'Titillium+Web:400,200,300,600,700,200italic,300italic,400italic,600italic,700italic',
        'Ubuntu, sans-serif'                                => 'Ubuntu',
        'Vollkorn, serif'                                   => 'Vollkorn:400,400i,700',
        'Voltaire, sans-serif'                              => 'Voltaire',
        
    );
    
    return $font_family_array;
    
}

/**
 * Render the jumbotron.
 */
function ytre_render_jumbotron() { ?>
        
    <div id="jumbotron-section">
               
        <div id="jumbotron-content">

            <div class="inner">
                
                <div class="container">
                    
                    <div class="row">
                        
                        <div class="col-sm-12">
                            
                            <h2 class="jumbo-title">
                                <?php _e( 'Contact a ', 'ytre' ); ?> 
                                <span><?php _e( 'Your Team', 'ytre' ); ?></span>
                                <?php _e( ' member now.', 'ytre' ); ?>
                            </h2>
                            
                            <div id="jumbotron-buttons">
                                
                                <?php if ( get_theme_mod( 'ytre_jumbotron_button_1_label', __( 'Call', 'ytre' ) ) != '' ) : ?>
                                    <a class="button" 
                                       href="<?php echo esc_url( get_theme_mod( 'ytre_jumbotron_button_1_url', '#' ) ); ?>"
                                       <?php echo get_theme_mod( 'ytre_jumbotron_button_1_target', 'same' ) == 'new' ? ' target="_BLANK" ': ''; ?>>
                                        <span class="fa fa-mobile"></span>
                                        <?php echo get_theme_mod( 'ytre_jumbotron_button_1_label', __( 'Call', 'ytre' ) ); ?>
                                    </a>
                                <?php endif; ?>
                                
                                <?php if ( get_theme_mod( 'ytre_jumbotron_button_2_label', __( 'Email', 'ytre' ) ) != '' ) : ?>
                                    <a class="button" 
                                       href="<?php echo esc_url( get_theme_mod( 'ytre_jumbotron_button_2_url', '#' ) ); ?>"
                                       <?php echo get_theme_mod( 'ytre_jumbotron_button_2_target', 'same' ) == 'new' ? ' target="_BLANK" ': ''; ?>>
                                        <span class="fa fa-envelope-o"></span>
                                        <?php echo get_theme_mod( 'ytre_jumbotron_button_2_label', __( 'Email', 'ytre' ) ); ?>
                                    </a>
                                <?php endif; ?>
                                
                                <?php if ( get_theme_mod( 'ytre_jumbotron_button_3_label', __( 'Live Chat', 'ytre' ) ) != '' ) : ?>
                                    <a class="button" 
                                       href="<?php echo esc_url( get_theme_mod( 'ytre_jumbotron_button_3_url', '#' ) ); ?>"
                                       <?php echo get_theme_mod( 'ytre_jumbotron_button_3_target', 'same' ) == 'new' ? ' target="_BLANK" ': ''; ?>>
                                        <span class="fa fa-commenting-o"></span>
                                        <?php echo get_theme_mod( 'ytre_jumbotron_button_3_label', __( 'Live Chat', 'ytre' ) ); ?>
                                    </a>
                                <?php endif; ?>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>

    </div>
    
    <div id="jumbotron-tagline" class="container-fluid">
        
        <div class="row">
            
            <div class="col-sm-12">
                
                <?php echo get_theme_mod( 'ytre_jumbotron_tagline', __( 'Your Team... Making Dreams a Reality', 'ytre' ) ); ?>
                
            </div>
            
        </div>
        
    </div>

<?php }
add_action( 'ytre_jumbotron', 'ytre_render_jumbotron' );

/**
 * Render the Featured Listings.
 */
function ytre_render_featured_listings() { ?>
        
    <?php

    $args = array (
        'posts_per_page'    => 8,
        'post_status'       => 'publish',
        'post_type'         => 'property',
        'meta_key'          => 'single_property_is_featured',
        'meta_value'             => 'featured',
    );

    $feat_listings = wp_get_recent_posts( $args ); ?>
    
    <div id="featured-listings-section" class="container">
        
        <div class="row">
        
            <div class="col-sm-12">
            
                <div class="inner">
                
                    <!--<h2 id="featured-listing-heading">
                        <?php echo get_theme_mod( 'ytre_featured_listing_heading_text', __( 'Featured Listings', 'ytre' ) ); ?>
                    </h2>-->

                    <ul id="featured-listings" class="owl-carousel owl-theme">

                        <?php foreach( $feat_listings as $listing ) : ?>

                            <li>

                                <div class="listing-tile">

                                    <?php if ( has_post_thumbnail( $listing['ID'] ) ) : ?>
                                        <a href="<?php echo get_the_permalink( $listing['ID'] ); ?>">
                                            <img alt="<?php esc_attr_e( get_the_title( $listing['ID'] ) ); ?>" src="<?php echo esc_url( get_the_post_thumbnail_url( $listing['ID'], 'full' ) ); ?>" />
                                        </a>
                                    <?php endif; ?>

                                    <div class="listing-details">

                                        <h3 class="listing-title">
                                            <a href="<?php echo get_the_permalink( $listing['ID'] ); ?>">
                                                <?php esc_html_e( get_the_title( $listing['ID'] ) ); ?>
                                            </a>
                                        </h3>

                                        <h4 class="listing-price">
                                            <?php $prices = get_post_meta( $listing['ID'], 'property_price' ); ?>
                                            <?php echo '$' . number_format( $prices[0], 0, ".", "," ); ?>
                                        </h4>

                                        <div class="listing-meta">

                                            <?php $words = get_theme_mod( 'ytre_featured_listings_trim', 50 ); ?>

                                            <!--<div class="listing-content">
                                                <?php esc_html_e( wp_trim_words( strip_shortcodes( strip_tags( $listing['post_excerpt'] ) ), $words, '...' ) ); ?>    
                                            </div>-->

                                            <!--<div class="listing-agent">
                                                <?php $agent = get_post_meta( $listing['ID'], 'property_agent' ); ?>
                                                <?php echo esc_html( $agent[0] ); ?>
                                            </div>-->

                                        </div>

                                    </div>

                                </div>

                            </li>

                        <?php endforeach; ?>

                        <?php wp_reset_postdata(); ?>

                    </ul>

                    <?php if ( is_active_sidebar( 'sidebar-featured-listings' ) ) : ?>
                        <div id="featured-listings-widgets">

                            <?php get_sidebar( 'featured-listings' ); ?>

                        </div>
                    <?php endif; ?>
            
                </div>
                    
            </div>
        
        </div>
        
    </div>

<?php }
add_action( 'ytre_featured_listings', 'ytre_render_featured_listings' );

/**
 * Render the footer.
 */
function ytre_render_footer() { ?>
        
<div id="footer-sidebar-wrapper" class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="container">
                    
                    <div class="row">

                        <?php if ( is_front_page() ) : ?>
                        
                            <?php if ( is_active_sidebar( 'sidebar-footer-frontpage' ) ) : ?>
                                <div class="col-md-12">

                                    <div id="footer-widget-area">

                                        <?php get_sidebar( 'footer-frontpage' ); ?>

                                    </div>

                                </div>
                            <?php endif; ?>
                        
                        <?php else : ?>
                        
                            <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
                                <div class="col-md-12">

                                    <div id="footer-widget-area">

                                        <?php get_sidebar( 'footer' ); ?>

                                    </div>

                                </div>
                            <?php endif; ?>
                        
                        <?php endif; ?>
                       
                    </div>
                    
                </div>
                
            </div>
    
        </div>
            
    </div>
    
<?php }
add_action( 'ytre_footer', 'ytre_render_footer' );

/**
 * Get the skin colors from the Customizer.
 */
function ytre_get_skin_colors() {
    
    $skin_color_array[] = null;
    
    $skin_color_array[ 'primary' ]              = get_theme_mod( 'ytre_theme_color_primary', '#3492c6' );
    $skin_color_array[ 'secondary' ]            = get_theme_mod( 'ytre_theme_color_secondary', '#ef5858' );
    $skin_color_array[ 'secondary_accent' ]     = get_theme_mod( 'ytre_theme_color_secondary_accent', '#b52c2c' );
    $skin_color_array[ 'dark' ]                 = get_theme_mod( 'ytre_theme_color_dark', '#050e1a' );
    
    return $skin_color_array;
    
}

/**
 * Returns all posts as an array.
 * Pass true to include Pages
 * 
 * @param boolean $include_pages
 * @return array of posts
 */
function ytre_all_posts_array( $include_pages = false ) {
    
    $posts = get_posts( array(
        'post_type'        => $include_pages ? array( 'post', 'page' ) : 'post',
        'posts_per_page'   => -1,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'order'            => 'ASC',
    ));

    $posts_array = array(
        'none'  => __( 'None', 'ytre' ),
    );
    
    foreach ( $posts as $post ) :
        
        if ( ! empty( $post->ID ) ) :
            $posts_array[ $post->ID ] = $post->post_title;
        endif;
        
    endforeach;
    
    return $posts_array;
    
}

remove_filter( 'the_content', 'wpautop' );
