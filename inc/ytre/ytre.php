<?php

/**
 * Enqueue scripts and styles.
 */
function ytre_scripts() {
	
        wp_enqueue_style( 'ytre-style', get_stylesheet_uri() );

        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array(), YTRE_VERSION );
        wp_enqueue_style( 'ytre-main-style', get_template_directory_uri() . '/inc/css/ytre.css', array(), YTRE_VERSION );
        
        wp_enqueue_script( 'tubular-js', get_template_directory_uri() . '/inc/js/jquery.tubular.1.0.js', array('jquery'), YTRE_VERSION, true );
        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
        
}
add_action( 'wp_enqueue_scripts', 'ytre_scripts' );

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
}
add_action( 'widgets_init', 'ytre_widgets_init' );

/**
 * Inject custom CSS in the header to handle certain theme mods.
 */
function ytre_custom_css() { ?>

    <style type="text/css">
        
        /* ---------- FONT FAMILIES ---------- */
        
        body {
            font-family: <?php echo esc_attr( get_theme_mod( 'juno_font_primary', 'Lato, sans-serif' ) ); ?>;
        }
        
        h1,h2,h3,h4,h5,h6 {
            font-family: <?php echo esc_attr( get_theme_mod( 'juno_font_secondary', 'Montserrat, sans-serif' ) ); ?>;
        }
        
        /* ---------- THEME COLORS ---------- */
        
        <?php $skin = ytre_get_skin_colors(); ?>
        
        /* --- PRIMARY COLOR --- */

            #placeholder-style-rule {
                background-color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>;
            }
            
            #placeholder-style-rule {
                color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>;
            }
        
        /* --- SECONDARY COLOR --- */
        
            #placeholder-style-rule {
                background-color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?>;
            }
        
            #placeholder-style-rule {
                color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?>;
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
            
            /*
            * Handle Blog Roll Masonry
            */
//            function doMasonry() {
//
//                var $grid = $( "#masonry-blog-wrapper" ).imagesLoaded(function () {
//                    $grid.masonry({
//                        itemSelector: '.blog-roll-item',
//                        columnWidth: '.grid-sizer',
//                        percentPosition: true,
//                        gutter: '.gutter-sizer',
//                        transitionDuration: '.75s'
//                    });
//                });
//
//                if ( $( window ).width() >= 992 ) {  
//
//                    $('.juno-blog-content .gutter-sizer').css('width', '2%');
//                    $('.juno-blog-content .grid-sizer').css('width', '32%');
//                    $('.juno-blog-content .blog-roll-item').css('width', '32%');
//
//                } else if ( $( window ).width() < 992 && $( window ).width() >= 768 ) {
//
//                    $('.juno-blog-content .gutter-sizer').css('width', '2%');
//                    $('.juno-blog-content .grid-sizer').css('width', '48%');
//                    $('.juno-blog-content .blog-roll-item').css('width', '48%');
//
//                } else {
//
//                    $('.juno-blog-content .gutter-sizer').css('width', '0%');
//                    $('.juno-blog-content .grid-sizer').css('width', '100%');
//                    $('.juno-blog-content .blog-roll-item').css('width', '100%');
//
//                }
//
//            }

            /**
            * Call Masonry on window resize and load
            */
//            $( window ).resize( function() {
//                doMasonry();
//            });
//            doMasonry();
            
            /*
            * Initialize the homepage slider module (only if the element exists on the page)
            */
//            if ( $( "#camera_slider" ).length ) {
//                
//                <?php $video_slider = get_theme_mod( 'ytre_jumbotron_type', 'video' ) == 'video' ? true : false ; ?>
//                
//                $( "#camera_slider" ).camera({ 
//                    height: <?php echo esc_js( get_theme_mod( 'ytre_jumbotron_height', '400' ) ); ?> + 'px';,
//                    hover: true,
//                    transPeriod: 1000,
//                    time: <?php echo esc_js( get_theme_mod( 'ytre_jumbotron_slide_delay', '7500' ) ); ?>,
//                    fx: 'simpleFade',
//                    pagination: <?php echo $video_slider ? esc_js( 'false') : esc_js( 'true' ); ?>,
//                    playPause: false,
//                    loader: 'none',
//                    navigation: false,
//                    autoAdvance: <?php echo $video_slider ? esc_js( 'false') : esc_js( 'true' ); ?>,
//                    mobileAutoAdvance: <?php echo $video_slider ? esc_js( 'false') : esc_js( 'true' ); ?>,
//                });
//
//            }
            
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
                            
                            <h1><?php _e( 'Contact a Your Team Member Now', 'ytre' ) ?></h1>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>

    </div>

<?php }
add_action( 'ytre_jumbotron', 'ytre_render_jumbotron' );

/**
 * Get the skin colors from the Customizer.
 */
function ytre_get_skin_colors() {
    
    $skin_color_array[] = null;
    
    $skin_color_array[ 'primary' ]      = get_theme_mod( 'ytre_theme_color_primary', '#3492c6' );
    $skin_color_array[ 'secondary' ]    = get_theme_mod( 'juno_theme_color_secondary', '#ef5858' );
    $skin_color_array[ 'dark' ]         = get_theme_mod( 'juno_theme_color_dark', '#050e1a' );
    
    return $skin_color_array;
    
}