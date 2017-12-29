jQuery(function() {

	jQuery(document).on( 'click', '#products_filter a', function( event ) {
        var current_cat = jQuery('#products_sort').data('cat');
        var all_tags_count = jQuery('#products_sort').data('tags');
        
        jQuery.ajax({
            url: wsajaxproductscount.ajaxurl,
            type: 'post',
            data: {
                action: 'ws_ajax_products_count',
                all_tags: all_tags_count,
                current_cat: current_cat,
            },
            success: function( data ) {
                jQuery('#product_count').html(data);
            }
        })
	})
});