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

            var clicked_form_group = $(this).parents('tr');
            
            var custom_uploader = wp.media({
                title: settings.uploaderTitle,
                button: {
                    text: settings.uploaderButton
                },
                multiple: settings.multiple
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                clicked_form_group.find('img').attr( 'src', attachment.url ).show();
                clicked_form_group.find('input').val( attachment.url );
                if( settings.modal ) {
                    $('.modal').css( 'overflowY', 'auto');
                }
            })
            .open();
        });

        /**
         * Add a Row
         */
        $('body').on('click', '.add_new_image_row', function(e) {
            
            e.preventDefault();

            var clicked_form_row = $(this).parents('tr');

            var new_row = '<tr>';
            
            new_row += '    <th style="vertical-align: middle;">';
            new_row += '        <label for="property_image_set" class="property_image_set_label">';
            new_row += '            New Image';
            new_row += '        </label>';
            new_row += '    </th>';
            
            new_row += '    <td>';
            new_row += '        <div class="form-group smartcat-uploader">';
            new_row += '            <input type="text" id="property_image_set" name="property_image_set[]" class="property_image_set_field">';
            new_row += '            <a href="#" class="' + settings.buttonClass.replace('.','') + '">' + settings.buttonText + '</a>';
            new_row += '        </div>';
            new_row += '    </td>';
            
            new_row += '    <td>';
            new_row += '        <div>';
            new_row += '            <img src="" style="height: 100px; margin: 1px 3px; display: none; border-radius: 4px;">';
            new_row += '        </div>';
            new_row += '    </td>';
            
            new_row += '    <td>';
            new_row += '        <div class="delete-uploaded-row"><span class="dashicons dashicons-trash"></span></div>';
            new_row += '    </td>';
            
            new_row += '</tr>';
            
            clicked_form_row.before(new_row);
            
            $( settings.buttonClass ).css( settings.buttonStyle );
            
        });

        /**
         * Delete a Row
         */
        $('body').on('click', '.delete-uploaded-row', function(e) {
            
            e.preventDefault();

            var response = confirm("Are you sure you want to remove this image?");
            if (response == true) {
                var clicked_form_row = $(this).parents('tr');
                clicked_form_row.remove();
            }

        });
        
    }
})(jQuery);


