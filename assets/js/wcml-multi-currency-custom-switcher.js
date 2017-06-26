var woocommerce_price_slider_params = '';
function wcml_load_currency_custom(a, b) {
    var c = jQuery('');
    jQuery("#currency_state").addClass(b), void 0 === b && (b = 0), jQuery.ajax({
        type: "post",
        url: woocommerce_params.ajax_url,
        dataType: "json",
        data: {
            action: "wcml_switch_currency",
            currency: a,
            force_switch: b,
            wcml_nonce: wcml_mc_settings.wcml_mc_nonce
        },
        success: function(b) {
            if (void 0 !== b.error) alert(b.error);
            else if (void 0 !== b.prevent_switching) jQuery("body").append(b.prevent_switching);
            else {
                if (void 0 !== wcml_mc_settings.w3tc) {
                    var c = window.location.href;
                    c = c.replace(/&wcmlc(\=[^&]*)?(?=&|$)|wcmlc(\=[^&]*)?(&|$)/, ""), c = c.replace(/\?$/, "");
                    var d = c.indexOf("?") != -1 ? "&" : "?",
                        e = c + d + "wcmlc=" + a
                } else var e = window.location.href;
                window.location = e
            }
        }
    })
}
jQuery(document).ready(function() {
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
        
        jQuery(this).off(a), wcml_load_currency_custom(rel)
    }), "undefined" != typeof woocommerce_price_slider_params && (woocommerce_price_slider_params.currency_symbol = wcml_mc_settings.current_currency.symbol)
});