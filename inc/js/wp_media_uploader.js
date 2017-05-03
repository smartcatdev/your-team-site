/**
 * 
 * wpMediaUploader v1.0 2016-11-05
 * Copyright (c) 2016 Smartcat
 * 
 */

( function( $) {

    $.wpMediaUploader = function( options ) {
        
        var settings = $.extend({
            
            target : '.smartcat-uploader', // The class wrapping the textbox
            uploaderTitle : 'Select or upload image', // The title of the media upload popup
            uploaderButton : 'Set image', // the text of the button in the media upload popup
            multiple : false, // Allow the user to select multiple images
            buttonText : 'Upload image', // The text of the upload button
            buttonClass : '.smartcat-upload', // the class of the upload button
            previewSize : '150px', // The preview image size
            modal : false, // is the upload button within a bootstrap modal ?
            buttonStyle : { // style the button
                color : '#fff',
                background : '#3bafda',
                fontSize : '16px',                
                padding : '10px 15px',                
            },

            
        }, options );
        
        
        $( settings.target ).append( '<a href="#" class="' + settings.buttonClass.replace('.','') + '">' + settings.buttonText + '</a>' );
        // $( settings.target ).append('<div><br><img src="#" style="display: none; width: ' + settings.previewSize + '"/></div>');
        
        $( settings.buttonClass ).css( settings.buttonStyle );
        
        $('body').on('click', settings.buttonClass, function(e) {
            
            e.preventDefault();

            var clicked_form_group = $(this).parents('.ytre-sortable');
            
            var custom_uploader = wp.media({
                title: settings.uploaderTitle,
                button: {
                    text: settings.uploaderButton
                },
                multiple: settings.multiple
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
        
                var p = custom_uploader.state().get('selection').toJSON();
                
                
                for( var i = 0; i< p.length; i++ ) {
                    console.log( p[i].url );
                    
                    clicked_form_group.append('<div class="bulk-image-section"><input type="hidden" value="' + p[i].url + '" style="width: 100%" name="bulk_image_set[]"/><img src="' + p[i].url + '" style="max-height: 100px"/></div>');
                    
                    
                }
                
                
                
                if( settings.modal ) {
                    $('.modal').css( 'overflowY', 'auto');
                }
            })
            .open();
        });

        /**
         * Delete a Row
         */
        $('body').on('click', '.delete-uploaded-row', function(e) {
            
            e.preventDefault();

            var response = confirm("Are you sure you want to remove this image?");
            if (response == true) {
                var clicked_form_row = $(this).parents('.bulk-image-section');
                clicked_form_row.remove();
            }

        });
        
    }
})(jQuery);


