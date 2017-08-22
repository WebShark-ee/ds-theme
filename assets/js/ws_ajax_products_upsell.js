jQuery(function() {

	jQuery(document).on( 'click', '#product_filter a', function( event ) {
		event.preventDefault();
        
        var selected_tag = jQuery(this).attr('rel').toString();
        var product = jQuery('#product_sort').data('product');
        var upsells = jQuery('#product_sort').data('upsells');
        var all_tags = jQuery('#product_sort').data('tags');
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
        jQuery('#product_sort').data('tags', all_tags_string);

		jQuery.ajax({
            url: wsajaxproductsupsell.ajaxurl,
            type: 'post',
            data: {
                action: 'ws_ajax_products_upsell',
                product: product,
                all_tags: all_tags_string,
                upsells: upsells
            },
            beforeSend: function() {
                jQuery('#product_sort').find( 'div, nav' ).remove();
            },
            success: function( data ) {
                jQuery('#product_sort').html(data);
                var new_cart_link = jQuery('.loop-cart').attr('href').replace('/wp-admin/admin-ajax.php', '');
                jQuery('.loop-cart').attr('href', new_cart_link)
                var $grid = jQuery('.animated-grid');
                var grid = new AnimatedGrid($grid);                
                grid.visible = false;
                grid.toggle();
            }
        })
	})
});