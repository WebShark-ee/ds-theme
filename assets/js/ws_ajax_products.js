jQuery(function() {

	jQuery(document).on( 'click', '#products_filter a', function( event ) {
		event.preventDefault();
        
        var selected_tag = jQuery(this).attr('rel').toString();
        var current_cat = jQuery('#products_sort').data('cat');
        var all_tags = jQuery('#products_sort').data('tags');
        all_tags = all_tags.toString();
        if (all_tags !== '')
        {
            all_tags_array = all_tags.split(',');
        }
        else 
        {
            all_tags_array = [];
        }
        var found = jQuery.inArray(selected_tag, all_tags_array);
        if (found >= 0) {
            all_tags_array.splice(found, 1);
        } else {
            all_tags_array.push(selected_tag);
        }
        all_tags_string = all_tags_array.join(',');
        jQuery('#products_sort').data('tags', all_tags_string);

		jQuery.ajax({
            url: wsajaxproducts.ajaxurl,
            type: 'post',
            data: {
                action: 'ws_ajax_products',
                selected_tag: selected_tag,
                all_tags: all_tags_string,
                current_cat: current_cat,
            },
            beforeSend: function() {
                jQuery('#products_sort').find( 'div, nav' ).remove();
                jQuery(document).scrollTop();
            },
            success: function( data ) {
                jQuery('#products_sort').html(data);
                var $grid = jQuery('.animated-grid');
                var grid = new AnimatedGrid($grid);                
                grid.visible = false;
                grid.toggle();
            }
        })
	})
});