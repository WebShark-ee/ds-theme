<?php
/**
 * Bundle quantity input template
 *
 * Override this template by copying it to 'yourtheme/woocommerce/single-product/add-to-cart/bundle-quantity-input.php'.
 *
 * On occasion, this template file may need to be updated and you (the theme developer) will need to copy the new files to your theme to maintain compatibility.
 * We try to do this as little as possible, but it does happen.
 * When this occurs the version of the template file will be bumped and the readme will list any important changes.
 *
 * @version 4.12.2
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="input-group">
<?php
if ( ! $product->is_sold_individually() ) {
	woocommerce_quantity_input( array(
		'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
		'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
		'input_value' => ( isset( $_POST[ 'quantity' ] ) ? wc_stock_amount( $_POST[ 'quantity' ] ) : 1 )
	) );

} else {
	?><input class="qty" type="hidden" name="quantity" value="1" /><?php
}
?>
<span class="input-group-btn">
    <button type="button" class="btn btn-default btn-number btn-plus" data-type="plus" data-field="quant[1]">

    <div class="arrow-up"></div>
    </button>


    <button type="button" class="btn btn-default btn-number btn-minus" disabled="disabled" data-type="minus" data-field="quant[1]">

    <div class="arrow-down"></div>
    </button>
</span>
</div>