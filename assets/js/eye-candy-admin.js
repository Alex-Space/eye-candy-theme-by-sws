jQuery(document).ready(function($) {

	$('.form-table').on('click', '.sws-eye-candy-select-bg-btn', function(event) {
		event.preventDefault();

		sws_open_media_uploader_image( $('.sws-eye-candy-select-bg-input') );

	});

	$('.form-table').on('click', '.sws-eye-candy-select-logo', function(event) {
		event.preventDefault();

		sws_open_media_uploader_image( $('.sws-eye-candy-select-logo-input') );

	});
	
    function sws_open_media_uploader_image(el) {
        media_uploader = wp.media({
            frame: "post",
            state: "insert",
            multiple: false
        });

        media_uploader.on("insert", function() {
            console.log(el);
            var json = media_uploader.state().get("selection").first().toJSON();

            var image_url = json.url;
            var image_caption = json.caption;
            var image_title = json.title;
        	var template = _.template('<i class="dashicons dashicons-trash"></i><img src="<%= url %>" alt="" class="sws-eye-candy-thumb">');

	        el.val( json.sizes.full.url );

	        if ( el.parents('tr').hasClass('sws-admin-bg') ) {
	        	$('.sws-eye-candy-select-bg-btn').remove();
	        } else if ( el.parents('tr').hasClass('sws-admin-menu-logo') ) {
	        	$('.sws-eye-candy-select-logo').remove();
	        }
        	el.parents('tr').find('.sws-thumb-box').append( template({ url: json.sizes.full.url }) );

        });

        media_uploader.open();

    }

    // Remove image from options page
    $('.form-table').on('click', '.sws-thumb-box i', function() {
    	$(this).siblings('img').remove();
    	$(this).parent().siblings('input[type="hidden"]').val('');

    	if ( $(this).parents('tr').hasClass('sws-admin-bg') ) {
	    	$(this).parent().prepend('<a href="#" class="sws-eye-candy-select-bg-btn button button-small">Upload background</a>');

    	} else if ( $(this).parents('tr').hasClass('sws-admin-menu-logo') ) {
    		$(this).parent().prepend('<a href="#" class="sws-eye-candy-select-logo button button-small">Upload logo</a>');
    	}

    	$(this).remove();
    });
});
