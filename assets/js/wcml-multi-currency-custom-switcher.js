jQuery(function() {

})
jQuery(function() {
    if (jQuery('#currency_state_current').html() == 'USD'){
        jQuery('#currency_state').prop('checked', true);
    }
    jQuery(document).on("click", "#currency_state", function(a) {
        var rel = 'EUR';
        if(document.getElementById('currency_state').checked) {
            rel = 'USD';
        } else {
            rel = 'EUR';
        }
		jQuery('#currency_switcher').on('submit', function(a){
			var input = jQuery("<input>").attr("type", "hidden").attr("name", 'aelia_cs_currency').val(rel);
			jQuery(this).append(jQuery(input));
		});
		jQuery('#currency_switcher').submit();
    })
});