jQuery(document).ready( function( $ ) {
    
    $('#view-toggle-map').click( function(){
        if ( ! $(this).hasClass('active') ) {
            
            $('#view-toggle-list').removeClass('active');
            $(this).addClass('active');
            
            $('#list-view').stop().fadeOut( 300, function(){
                $('#map-view').fadeIn( 0, function(){
                    google.maps.event.trigger(myGmap.gmap3("get"), "resize");
                    set_markers( "http://localhost/wp-content/plugins/epl-advanced-mapping/images/" );
                }).animate({
                    opacity: 1
                }, 300 );
            });
            
        } 
    });
    
    $('#view-toggle-list').click( function(){
        if ( ! $(this).hasClass('active') ) {
            
            $('#view-toggle-map').removeClass('active');
            $(this).addClass('active');
            
            $('#map-view').stop().animate({ 
                opacity: 0
            }, 300, function(){
                $('#map-view').fadeOut( 0, function(){
                    $('#list-view').fadeIn( 300 );
                });
            });
            
        } 
    });
    
});

