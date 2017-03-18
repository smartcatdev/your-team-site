jQuery(document).ready( function( $ ) {

    /**
     * SlickNav Mobile Menu
     */
    $( function() { 
        
        $( '#primary-menu' ).slicknav({
            prependTo:'#header-search',
            duration: 500,
            openedSymbol: "&#45;",	
            closedSymbol: "&#43;",
        }); 
       
    });

    $('#header-actual-form form > label').prepend('<span class="fa fa-search"></span>');

    /**
     * Init ImageMap Resizer
     */
    $('map').imageMapResize();
    
    /**
     * Team Photo Hotspot Effect
     */
    $('#ytre-team-photo .inner map area').mouseenter( function() {
        
        $('#team-photo-display-name').stop().text( $( this ).attr('title') );
        
    });
    
    $('#browser-back-button').on( 'click', function() {
        history.back();
    });

//    /**
//     * Store the Location field, remove it, and re-add it wrapped in tab div
//     */
//    var location_field = $('#floating-filter-search div.epl-property_location');
//        heading_field_location = '<p class="title">Where do you want to buy?</p>';
//    $('#floating-filter-search div.epl-property_location').remove();
//    $('#floating-filter-search div.epl-property_category').before( '<div class="search-field-wrap">' + heading_field_location + '<div class="inner">' + location_field.html() + '</div></div>');
//     
//    /**
//     * Store the Price Range fields, remove them, and re-add them wrapped in tab div
//     */
//    var from_price = $('#floating-filter-search div.epl-property_price_from'),
//        to_price = $('#floating-filter-search div.epl-property_price_to'),
//        heading_field_range = '<p class="title">What is your price range?</p>';
//    $('#floating-filter-search div.epl-property_price_from').remove();
//    $('#floating-filter-search div.epl-property_price_to').remove();
//    $('#floating-filter-search div.epl-property_category').after( '<div class="search-field-wrap">' + heading_field_range + '<div class="inner">' + from_price.html() + to_price.html() + '</div></div>');
//        
//    /**
//     * Store the Bed and Bath room fields, remove them, and re-add them wrapped in tab div
//     */
//    var min_bedrms  = $('#floating-filter-search div.epl-property_bedrooms_min'),
//        min_bathrms = $('#floating-filter-search div.epl-property_bathrooms'),
//        heading_field_bed_bath = '<p class="title">How many beds and baths?</p>';
//    $('#floating-filter-search div.epl-property_bedrooms_min').remove();
//    $('#floating-filter-search div.epl-property_bathrooms').remove();
//    $('#floating-filter-search div.epl-property_bedrooms_max').after( '<div class="search-field-wrap">' + heading_field_bed_bath + '<div class="inner">' + min_bedrms.html() + min_bathrms.html() + '</div></div>');
//        
//    /**
//     * Prepend a title before the Submit button 
//     */
//    $('#floating-filter-search .epl-search-submit').prepend('<p class="title">Ready to Search?</p>');
//    $('#floating-filter-search .epl-search-submit input[type=submit]').wrap('<div class="inner"></div>');
        
    /**
     * Expand On Click of Title
     */
    var show_submit = false;
    $('#floating-filter-search .title').on('click', function() {
        
        
        if ( ! $(this).parent().hasClass('epl-search-submit') ) {        
        
            $(this).parent().find('.inner').stop().slideToggle( 300, function() {
                
                if ( !show_submit ) {
                    $('#floating-filter-search .epl-search-submit').stop().delay(100).slideDown(600);
                    show_submit = true;    
                }
                
            });

        }
        
    });
        
    /**
     * Hide Filter Search On Click of Sidebar
     */
    $('div#floating-filter-search .edge-block').on('click', function() {
       
        $(this).parent().find('.epl-search-forms-wrapper.epl-search-default').stop().fadeToggle( 300 );
        
    });
        
    /**
     * Hide Contact CTA On Click of Sidebar
     */
    $('#floating-contact-cta .edge-block').on('click', function() {
        
        $(this).parent().find('.inner').stop().fadeToggle(300);
        
    });
    
    /**
     * Show Hidden Chat Plugin on Home
     */
    var chat_visible = false;
    $('.chat-trigger').on('click', function() {
        
        if ( !chat_visible ) {
            $('body.home div#scx-widget div#scx-btn, body.page-template-page-contact div#scx-btn').show();
            chat_visible = true;
        }
        
    });
    
});

