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
    wp_enqueue_style( 'slickNav', get_template_directory_uri() . '/inc/css/slicknav.min.css', array(), YTRE_VERSION );
    wp_enqueue_style( 'sweetAlert', get_template_directory_uri() . '/inc/css/sweetalert.css', array(), YTRE_VERSION );
    wp_enqueue_style( 'ytre-main-style', get_template_directory_uri() . '/inc/css/ytre.css', array(), YTRE_VERSION );

    wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/inc/js/owl.carousel.min.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'bootstrap-tabs-js', get_template_directory_uri() . '/inc/js/bootstrap.tabs.min.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'imageMapResizer', get_template_directory_uri() . '/inc/js/imageMapResizer.min.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'slickNav-js', get_template_directory_uri() . '/inc/js/jquery.slicknav.min.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'galleria-js', get_template_directory_uri() . '/inc/js/galleria/galleria-1.4.7.min.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'sticky-js', get_template_directory_uri() . '/inc/js/jquery.sticky.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'sweetAlert', get_template_directory_uri() . '/inc/js/sweetalert.min.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'tubular-js', get_template_directory_uri() . '/inc/js/jquery.tubular.1.0.js', array('jquery'), YTRE_VERSION, true );
    wp_enqueue_script( 'ytre-main-script', get_template_directory_uri() . '/inc/js/script.js', array('jquery','jquery-masonry'), YTRE_VERSION, true );
    
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
        #listing-agent-sidebar .epl-author-box .epl-author-title a,
        .page-template-page-events .event-details .date,
        h3#team-photo-display-name,
        .ytre-member-details .title,
        div#single-title-box .entry-title,
        .page-template-page-listings-list #view-toggle-buttons .entry-title,
        .page-template-page-listings-map #view-toggle-buttons .entry-title {
            font-family: <?php echo esc_attr( get_theme_mod( 'ytre_font_body', 'Lato, sans-serif' ) ); ?>;
        }
        
        h1,h2,h3,h4,h5,h6,
        ul#primary-menu li a,
        .property-box .property-address a,
        .property-box .price,
        #listing-agent-sidebar .epl-author-position.author-position,
        #listing-agent-sidebar .epl-author-contact.author-contact,
        .overlay-featured-marker > .content .property_address_suburb,
        .page-template-page-events .event-details .time,
        .page-template-page-events .event-details .location,
        div#floating-filter-search label,
        a.slicknav_btn,
        .slicknav_nav a {
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
            .galleria-theme-classic .galleria-info-text,
            div#floating-filter-search .edge-block,
            div#floating-contact-cta .edge-block,
            div#header-search,
            .home header#masthead.sticky-header,
            .site-branding {
                background-color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>;
            }
            
            .listing-tile .listing-price,
            h2#featured-listing-heading,
            #property-heading .entry-title,
            #listing-agent-sidebar .epl-author-box .epl-author-title a,
            .property-box .price,
            div#single-title-box,
            .epl-archive-default h3.archive-page-subtitle,
            .grid2 .sc_team_member .sc_team_member_name a,
            #featured-listings .owl-buttons div,
            #mobile-team-cards .mobile-team-member .name a,
            .page-template-page-listings-list #view-toggle-buttons .entry-title,
            .page-template-page-listings-map #view-toggle-buttons .entry-title {
                color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>;
            }
            
            div#jumbotron-content,
            .listing-tile:hover .listing-details,
            .search-form input.search-field:focus,
            #property-heading,
            header#masthead,
            .grid2 .sc_team_member_inner .image-container,
            #mobile-team-cards .mobile-team-member .name {
                border-color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>;
            }
            
            #jumbotron-tagline .arrow {
                border-top-color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>;
            }
            
            div#header-search {
                background-color: <?php echo esc_attr( $skin[ 'primary' ] ); ?> !important;
            }
            
            @media (max-width:767px) {
                .home header#masthead {
                    background-color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>;
                }
            }
                
        /* --- SECONDARY COLOR --- */
        
            div#jumbotron-buttons a.button,
            a.primary-button,
            div.primary-button,
            .search-form input.search-submit,
            div#floating-filter-search input[type="submit"],
            .view-toggle-button,
            #listing-agent-sidebar ul.epl-author-tabs li,
            .galleria-info-link,
            .galleria-info-text,
            #single-event-inner .gform_wrapper input[type="submit"],
            div#scx-widget .scx-button.scx-primary,
            div#featured-listings-widgets .gform_wrapper input[type="submit"] {    
                background-color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?>;
            }
            
            .jumbo-title span,
            div#jumbotron-buttons a.button:hover {
                color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?>;
            }
            
            .nav-pills>li>a,
            .nav-pills>li.active>a,
            .nav-pills>li.active:hover>a,
            div#scx-widget .scx-button.scx-primary:hover {
                background-color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?> !important;
            }
            
            div#jumbotron-buttons a.button:hover {
                border-color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?> !important;
            }
        
        /* --- SECONDARY ACCENT COLOR --- */
        
            div#jumbotron-buttons a.button,
            a.primary-button,
            div.primary-button,
            .search-form input.search-submit,
            div#floating-filter-search input[type="submit"],
            .view-toggle-button,
            #listing-agent-sidebar ul.epl-author-tabs li,
            .galleria-info-link,
            .galleria-info-text,
            .nav-pills>li>a,
            #single-event-inner .gform_wrapper input[type="submit"],
            div#scx-widget .scx-chat-btn {
                border-color: <?php echo esc_attr( $skin[ 'secondary_accent' ] ); ?>;
            }
        
            #placeholder-style-rule {
                color: <?php echo esc_attr( $skin[ 'secondary_accent' ] ); ?>;
            }
            
            div#scx-widget .scx-button.scx-primary:hover,
            div#scx-widget .scx-button.scx-primary,
            div#featured-listings-widgets .gform_wrapper input[type="submit"],
            div#featured-listings-widgets .gform_wrapper input[type="submit"]:hover {
                border-color: <?php echo esc_attr( $skin[ 'secondary_accent' ] ); ?> !important;
            }
            
        /* --- JUMBOTRON --- */
        
        div#tubular-shield {
            background-color: rgba( 0, 0, 0, <?php echo esc_attr( get_theme_mod( 'ytre_jumbotron_dark_tint', .5 ) ); ?> );
        }
        
        #jumbotron-section,
        div#jumbotron-content,
        div#tubular-container,
        div#tubular-shield {
            height: <?php echo intval( get_theme_mod( 'ytre_jumbotron_height', 400 ) ); ?>px !important;
        }
        
        @media (max-width: 640px) {
    
            #jumbotron-section, div#jumbotron-content, div#tubular-container, div#tubular-shield {
                height: 400px !important;
            }
            
        }
        
        @media (max-width:1299px) and (max-height: 749px) {
            #jumbotron-section, div#jumbotron-content, div#tubular-container, div#tubular-shield {
                height: 400px !important;
            }
        }
        
        @media (max-width:849px) and (max-height: 499px) {
            iframe#tubular-player {
                top: -5% !important;
            }   
        }
         
    </style>
    
    <?php 
    
    // Custom CSS from Customizer > Extras
    if ( get_theme_mod( 'ytre_custom_css', '' ) != '' ) :

        echo '<style type="text/css">' . get_theme_mod( 'ytre_custom_css', '' ) . '</style>';

    endif;
    
}
add_action('wp_head', 'ytre_custom_css');

/**
 * Inject custom JS in the header to handle certain scripted actions.
 */
function ytre_custom_js() { ?>
    
    <script type="text/javascript">
    
        jQuery(document).ready( function( $ ) {
    
            if ( $('body').hasClass('home') ) {
            
                var topofDiv = $("#jumbotron-section").offset().top; //gets offset of header
                var height = $("#jumbotron-section").outerHeight(); //gets height of header
                var passed_jumbotron = false;

                $(window).scroll(function(){

                    if( $( window ).scrollTop() > ( topofDiv + height ) ){

                        if ( !passed_jumbotron ) {
                            $('.home header#masthead').addClass('sticky-header animated slideInDown');
                            passed_jumbotron = true;
                        }

                    } else {

                        if ( passed_jumbotron ) {
                            $('.home header#masthead').fadeOut( 300, function(){
                                $(this).removeClass('sticky-header animated slideInDown').fadeIn( 200 );
                            });
                            passed_jumbotron = false;
                        }

                    }

                });

            }
        
            /**
             * OwlCarousel Init 
             */
            if ( $("#featured-listings").length ) {
            
                $("#featured-listings").owlCarousel({
                    slideSpeed : 400,
                    paginationSpeed : 1000,
                    autoPlay : true,
                    items : 4,
                    itemsDesktop : [767,2],
                    itemsMobile : [499,1],
                    pagination : false,
                    navigation : true,
                    navigationText : ["«","»"]
                });    

            }
            
            /**
            * Store the Location field, remove it, and re-add it wrapped in tab div
            */
            var location_field = $('#floating-filter-search div.epl-property_location');
                heading_field_location = '<p class="title">' + '<?php echo esc_js( get_theme_mod( 'ytre_filter_search_location_label', __( 'Where do you want to buy?', 'ytre' ) ) ); ?>' + '</p>';
            $('#floating-filter-search div.epl-property_location').remove();
            $('#floating-filter-search div.epl-property_category').before( '<div class="search-field-wrap">' + heading_field_location + '<div class="inner">' + location_field.html() + '</div></div>');

            /**
            * Store the Price Range fields, remove them, and re-add them wrapped in tab div
            */
            var from_price = $('#floating-filter-search div.epl-property_price_from'),
                to_price = $('#floating-filter-search div.epl-property_price_to'),
                heading_field_range = '<p class="title">' + '<?php echo esc_js( get_theme_mod( 'ytre_filter_search_price_label', __( 'What is your price range?', 'ytre' ) ) ); ?>' + '</p>';
            $('#floating-filter-search div.epl-property_price_from').remove();
            $('#floating-filter-search div.epl-property_price_to').remove();
            $('#floating-filter-search div.epl-property_category').after( '<div class="search-field-wrap">' + heading_field_range + '<div class="inner">' + from_price.html() + to_price.html() + '</div></div>');

            /**
            * Store the Bed and Bath room fields, remove them, and re-add them wrapped in tab div
            */
            var min_bedrms  = $('#floating-filter-search div.epl-property_bedrooms_min'),
                min_bathrms = $('#floating-filter-search div.epl-property_bathrooms'),
                heading_field_bed_bath = '<p class="title">' + '<?php echo esc_js( get_theme_mod( 'ytre_filter_search_bed_bath_label', __( 'How many bedrooms?', 'ytre' ) ) ); ?>' + '</p>';
            $('#floating-filter-search div.epl-property_bedrooms_min').remove();
            $('#floating-filter-search div.epl-property_bathrooms').remove();
            $('#floating-filter-search div.epl-property_bedrooms_max').after( '<div class="search-field-wrap">' + heading_field_bed_bath + '<div class="inner">' + min_bedrms.html() + '</div></div>');

            /**
            * Prepend a title before the Submit button 
            */
            $('#floating-filter-search .epl-search-submit').prepend('<p class="title">' + '<?php echo esc_js( get_theme_mod( 'ytre_filter_search_ready_label', __( 'Ready to Search?', 'ytre' ) ) ); ?>' + '</p>');
            $('#floating-filter-search .epl-search-submit input[type=submit]').wrap('<div class="inner"></div>');
            
            /**
             * Property Images Gallery Init
             */
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
            if ( $("#jumbotron-section").length ) {
            
                $('#jumbotron-section').tubular({ 
                    videoId: '<?php echo esc_js( get_theme_mod( 'ytre_jumbo_video_id', 'QO-dXDj9zII' ) ); ?>',
                    repeat: true
                });
                $('#tubular-container').appendTo('#jumbotron-section');
                $('#tubular-shield').appendTo('#jumbotron-section');
                $(window).load(function () {
                    $('#tubular-container').delay(650).animate({
                        opacity: 1
                    }, 500 );
                });
            
            }
            
            /**
             * Change the Filter CTA action parameter to the listings page
             */
            $('#floating-filter-search form').attr( 'action', '<?php echo esc_url( home_url( '/listings-list/' ) ); ?>' ).find('input[type="hidden"]').remove();
            $('#floating-filter-search form').prepend( '<input type="hidden" name="homepage-search-arrival" value="true" />' );

            /*
            * Handle Blog Roll Masonry
            */
            function doMasonry() {

                var $grid = $( ".epl-shortcode-listing, #archive-loop-epl, #list-view-masonry" ).imagesLoaded(function () {
                    $grid.masonry({
                        itemSelector: '.epl-listing-post, .featured-property-tile',
                        columnWidth: '.grid-sizer',
                        percentPosition: true,
                        gutter: '.gutter-sizer',
                        transitionDuration: '.75s'
                    });
                });

                if ( $( window ).width() >= 992 ) {  

                    $('.gutter-sizer').css('width', '2%');
                    $('.grid-sizer').css('width', '23.5%');
                    $('.epl-shortcode-listing .epl-listing-post, #list-view-masonry .featured-property-tile').css('width', '23.5%');

                } else if ( $( window ).width() < 992 && $( window ).width() >= 768 ) {

                    $('.gutter-sizer').css('width', '2%');
                    $('.grid-sizer').css('width', '48%');
                    $('.epl-shortcode-listing .epl-listing-post, #list-view-masonry .featured-property-tile').css('width', '48%');

                } else {

                    $('.gutter-sizer').css('width', '0%');
                    $('.grid-sizer').css('width', '100%');
                    $('.epl-shortcode-listing .epl-listing-post, #list-view-masonry .featured-property-tile').css('width', '100%');

                }
                    
            }

            /**
            * Call Masonry on window resize and load
            */
            $('.gutter-sizer').prependTo('.epl-shortcode-listing,#archive-loop-epl,#list-view-masonry');
            $('.grid-sizer').prependTo('.epl-shortcode-listing,#archive-loop-epl,#list-view-masonry');
            $( window ).resize( function() {
                doMasonry();
            });
            doMasonry();
            
            $('#listing-toggle a').click( function (e) {
                e.preventDefault();
                doMasonry();
                $(this).tab('show');
            });
            
            /**
            * Click handler to store and update Contact CPTs for offline ChatX Submit button
            */
            $('.scx-popup-offline .scx-send a.scx-send-btn, .scx-popup-prechat .scx-send a.scx-send-btn').on('click', function() {

                if ( $(this).hasClass( 'scx-disabled' ) ) {

                    return false;

                } else {

                    var form = $(this).parents('form.scx-form');

                    var name = form.find('input.scx-field-name').val(),
                        email = form.find('input.scx-field-email').val(),
                        details = form.find('textarea.scx-field-question').val(),
                        url = '<?php echo esc_js( esc_url( admin_url( 'admin-ajax.php' ) ) ); ?>';

                    var data = {

                        action : 'ytre_store_or_update_contact',
                        name : name,
                        email : email,
                        details : details

                    }

                    $.post( url, data, function ( response ) {
                        
                        console.log( response );
                        // if( response == 1 ) {
                        //      console.log( 'success' );
                        // } else {
                        //      console.log( 'failure' );
                        // }

                    });

                }

            });
            
            /**
             * Show Phone Call Popup
             */
            $('.phone-popup-trigger').on('click', function() {

                swal({
                    title: "",
                    text: "<a href='tel:6135300968'>613-530-0968</a>",
                    html: true
                });

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
                                       href="tel:6135300968"
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
                                    <a class="button chat-trigger" href="#">
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
                
                    <div class="arrow"></div>
                    
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
        'meta_value'        => 'featured',
    );

    $feat_listings = new WP_Query( $args ); ?>
    
    <div id="featured-listings-section" class="container">
        
        <div class="row">
        
            <div class="col-sm-12">
            
                <div class="inner">
                
                    <?php if ( $feat_listings->have_posts() ) : ?>
                    
                        <ul id="featured-listings" class="owl-carousel owl-theme">

                            <?php while ( $feat_listings->have_posts() ) : $feat_listings->the_post(); ?>

                                <li>

                                    <div class="featured-property-tile">

                                        <?php if ( has_post_thumbnail() ) : ?>
                                        
                                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                            
                                                <div class="prop-image" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>);">

                                                    <div class="price-banner">

                                                        <h4 class="listing-price">
                                                            <?php echo '$' . number_format( get_post_meta( get_the_ID(), 'property_price', true ), 0, ".", "," ); ?>
                                                        </h4>

                                                    </div>

                                                </div>
                                                
                                            </a>
                                        
                                        <?php endif; ?>

                                        <div class="prop-details">

                                            <h3 class="prop-heading">
                                                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                                    <?php echo get_post_meta( get_the_ID(), 'property_heading', true ); ?>
                                                </a>
                                            </h3>

                                            <div class="prop-meta">

                                                <div class="bedrooms">
                                                    <h4 class="prop-label">
                                                        <span class="fa fa-bed"></span>
                                                        <?php _e( 'Bedrooms', 'ytre' ); ?>
                                                        <div class="value">
                                                            <?php echo intval( get_post_meta( get_the_ID(), 'property_bedrooms', true ) ); ?>    
                                                        </div>
                                                    </h4>
                                                </div>
                                                
                                                <div class="bathrooms">
                                                    <h4 class="prop-label">
                                                        <span class="fa fa-bathtub"></span>
                                                        <?php _e( 'Bathrooms', 'ytre' ); ?>
                                                        <div class="value">
                                                            <?php echo intval( get_post_meta( get_the_ID(), 'property_bathrooms', true ) ); ?>    
                                                        </div>
                                                    </h4>
                                                </div>
                                                
                                                <?php $terms = wp_get_post_terms( get_the_ID(), 'location' ); ?>
                                                
                                                <?php if ( !empty( $terms ) ) : ?>
                                                    <div class="parking">
                                                        <h4 class="prop-label">
                                                            <span class="fa fa-map-o"></span>
                                                            <?php echo $terms[0]->name;?>
                                                        </h4>
                                                    </div>
                                                <?php endif; ?>

                                            </div>

                                        </div>

                                        <?php // var_dump( get_post_meta(get_the_ID(), '', true)); ?>
                                        
                                    </div>

                                </li>

                            <?php endwhile; ?>

                            <?php wp_reset_postdata(); ?>

                        </ul>
                    
                    <?php endif; ?>
                    
                    <div id="frontpage-copy-section">
                    
                        <p>
                            <?php _e( 'Haven’t found your dream home yet? Let one of our experienced agents help you. After all, it’s our job. They don’t call us Your Team for nothing.', 'ytre' ); ?>
                        </p>
                        
                    </div>
                    
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
            
            <div class="arrow"></div>

        </div>
        
        <div id="footer-copyright" class="col-md-12">
            <?php _e( 'Copyright © 2017. All rights reserved. MLS®, REALTOR®, and the associated logos are trademarks of The Canadian Real Estate Association.', 'ytre' ); ?>
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
    //    $skin_color_array[ 'dark' ]                 = get_theme_mod( 'ytre_theme_color_dark', '#050e1a' );
    
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
