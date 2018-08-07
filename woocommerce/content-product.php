<?php

/**

 * The template for displaying product content within loops

 *

 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.

 *

 * HOWEVER, on occasion WooCommerce will need to update template files and you

 * (the theme developer) will need to copy the new files to your theme to

 * maintain compatibility. We try to do this as little as possible, but it does

 * happen. When this occurs the version of the template file will be bumped and

 * the readme will list any important changes.

 *

 * @see     https://docs.woocommerce.com/document/template-structure/

 * @author  WooThemes

 * @package WooCommerce/Templates

 * @version 3.0.0

 */



if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly

}



global $product;

global $redirect_url_filter;

// Ensure visibility

if ( empty( $product ) || ! $product->is_visible() ) {

	return;

}

?>



<div class="product-card grid-item grid-item-disappear">

	<?php

	/**

	 * woocommerce_before_shop_loop_item hook.

	 *

	 * @hooked woocommerce_template_loop_product_link_open - 10

	 */

    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

	do_action( 'woocommerce_before_shop_loop_item' );

    ?>

    <a href="<?php echo get_permalink(); ?>">

    <?php

	/**

	 * woocommerce_before_shop_loop_item_title hook.

	 *

	 * @hooked woocommerce_show_product_loop_sale_flash - 10

	 * @hooked woocommerce_template_loop_product_thumbnail - 10

	 */

	do_action( 'woocommerce_before_shop_loop_item_title' );

    ?>

    </a>

    <div class="description-wrapper">

            <div class="product-card-description">

            

            <?php

            /**

             * woocommerce_shop_loop_item_title hook.

             *

             * @hooked woocommerce_template_loop_product_title - 10

             */

            add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 0 );

            do_action( 'woocommerce_shop_loop_item_title' );

            ?>

            </div>

            <div>

            <?php

            /**

             * woocommerce_after_shop_loop_item_title hook.

             *

             * @hooked woocommerce_template_loop_rating - 5

             * @hooked woocommerce_template_loop_price - 10

             */

            do_action( 'woocommerce_after_shop_loop_item_title' );

            ?>

            </div>

        </div>

    <?php

    /**

     * woocommerce_after_shop_loop_item hook.

     *

     * @hooked woocommerce_template_loop_product_link_close - 5

     * @hooked woocommerce_template_loop_add_to_cart - 10

     */

    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

    do_action( 'woocommerce_after_shop_loop_item' );

    ?>

</div>

