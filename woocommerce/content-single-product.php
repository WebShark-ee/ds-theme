<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
    
    $product_id_nr = get_the_ID();
    $is_bundle_product = true;
    $product = get_product( get_the_ID() );
    if( $product->is_type( 'simple' ) ){
        $is_bundle_product = false;
    }
    
?>

<div class="container" itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>">
    <?php
    if ($is_bundle_product == true)
    {
        $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
        $thumb_size_image = wp_get_attachment_image_src( $post_thumbnail_id, 'shop_thumbnail' );
        ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="flexslider" id="carousel">
                    <ul class="slides">
                        <li>
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array( 'class' => 'img-responsive img-parallax', 'data-speed' => '1' )); ?>
                        </li>
                    <?php 

                    $attachment_ids = $product->get_gallery_image_ids();
                    if ( $attachment_ids && has_post_thumbnail() ) {
                        foreach ( $attachment_ids as $attachment_id ) {
                            $full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
                            echo '<li><img src="' . $full_size_image[0] . '" class="img-responsive img-parallax" data-speed="1"></li>';
                        }
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="row<?php if ($is_bundle_product == false) { echo ' row-fan'; } ?>">
        <div class="col-sm-12 col-md-<?php if ($is_bundle_product == false) { echo '6'; } else { echo '4'; } ?> col-products">
        <?php
            /**
             * woocommerce_before_single_product_summary hook.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            if ($is_bundle_product == true)
            {
                remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
                //add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_thumbnails', 20 );
                ?>
                <div class="flexslider flexslider-nav" id="carousel-slider">
                    <ul class="slides" id="">
                        <li><img src="<?php echo $thumb_size_image[0]; ?>"></li>
                        <?php
                        if ( $attachment_ids && has_post_thumbnail() ) {
                            foreach ( $attachment_ids as $attachment_id ) {
                                $thumbnail = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
                                echo '<li><img src="' . $thumbnail[0] . '"></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            <?php
            }
            do_action( 'woocommerce_before_single_product_summary' );
        ?>
        </div>

        <div class="col-sm-12 col-md-<?php if ($is_bundle_product == false) { echo '6'; } else { echo '8'; } ?>">
            <div class="product-description">
                <!--<a class="btn btn-primary pull-right" data-toggle="modal" data-target="#ask_offer">Ask for offer</a>-->
                <?php
                    /**
                     * woocommerce_single_product_summary hook.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     */
                     
                    /*
                    function q2a_product_summary() {

                        function wrapstart () {
                            echo '<div class="buy-box">';
                        }

                        function wrapend () {
                            echo '</div>';
                        }

                        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
                        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );  
                        add_action( 'woocommerce_single_product_summary', 'wrapstart', 30 );
                        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 30 );
                        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
                        add_action( 'woocommerce_single_product_summary', 'wrapend', 30 );
                        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
                        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

                    }
                    add_action('woocommerce_single_product_summary', 'q2a_product_summary');
                    */
                    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
                    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 0 );
                    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
                    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
                    do_action( 'woocommerce_single_product_summary' );
                ?>

            </div>
        </div>
    </div>
    
    <div class="row row-cards">
        <div class="col-md-12">

        <?php
            /**
             * woocommerce_after_single_product_summary hook.
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
            do_action( 'woocommerce_after_single_product_summary' );
        ?>

        <meta itemprop="url" content="<?php the_permalink(); ?>" />
    </div>
    
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
