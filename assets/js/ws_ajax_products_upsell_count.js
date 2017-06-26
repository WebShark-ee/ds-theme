jQuery(function() {

	jQuery(document).on( 'click', '#product_filter a', function( event ) {
        var product = jQuery('#product_sort').data('product');
        var upsells = jQuery('#product_sort').data('upsells');
        var all_tags_count = jQuery('#product_sort').data('tags');
        
        jQuery.ajax({
            url: wsajaxproductsupsellcount.ajaxurl,
            type: 'post',
            data: {
                action: 'ws_ajax_products_upsell_count',
                product: product,
                all_tags: all_tags_count,
                upsells: upsells
            },
            success: function( data ) {
                jQuery('#product_count').html(data);
            }
        })
	})
});