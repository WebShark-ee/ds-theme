<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
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
	exit;
}

global $product, $woocommerce_loop, $upsells;

if ( ! $upsells = $product->get_upsells() ) {
	return;
}

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->id ),
	'meta_query'          => WC()->query->get_meta_query()
);

$products                    = new WP_Query( $args );
$woocommerce_loop['name']    = 'up-sells';
$woocommerce_loop['columns'] = apply_filters( 'woocommerce_up_sells_columns', $columns );

if ( $products->have_posts() ) : ?>

    <div class="row row-accessories">
        <div class="col-xs-12" id="product_filter">
            <?php
            $compatatible_with_url = get_query_var('compatatible_with');
            $compatatible_with_url = explode(',', $compatatible_with_url);
            global $wp;
            $terms = get_terms( 'product_tag', array('object_ids' => $upsells) );
            $current_url = home_url(add_query_arg(array(),$wp->request));
            if (has_term( 'systems', 'product_cat' ))
            {
                $current_terms = get_the_terms($product->id, 'product_tag');
                if ($current_terms != '')
                {
                    foreach ( $current_terms as $current_term ) {
                        $current_term_slug = $current_term->slug;
                    }
                }
            }
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                foreach ( $terms as $term ) {
                    if (in_array($term->slug, $compatatible_with_url))
                    {
                        //$old_compatatible_url = array($term->slug, ',' . $term->slug);
                        $current_compatatible_url = array($term->slug);
                        $old_compatatible_url = array_diff($compatatible_with_url, $current_compatatible_url);
                        $new_compatatible_url = implode(',', $old_compatatible_url);
                        echo '<a href="'. $term_link .'?compatatible_with=' . $new_compatatible_url . '"';
                    }
                    else if ($term->slug == $current_term_slug) {
                        echo '<span ';
                    }
                    else
                    {
                       echo '<a href="'. $term_link .'?compatatible_with=' . get_query_var('compatatible_with');
                       if (get_query_var('compatatible_with'))
                       {
                           echo ',';
                       }
                       echo $term->slug . '"'; 
                    }
                    echo ' class="btn btn-primary';
                    if (in_array($term->slug, $compatatible_with_url) || $term->slug == $current_term_slug)
                    {
                        echo ' btn-disabled';
                    }
                    if ($term->slug != $current_term_slug)
                    {
                        echo '" rel="' . $term->slug . '"';
                    }
                    else 
                    {      
                        echo '" rel=""';
                    }
                    if ($term->slug == $current_term_slug)
                    {
                        echo ' disabled="disabled"';
                    }
                    echo '>' . $term->name;
                    if ($term->slug == $current_term_slug)
                    {
                        echo '</span>';
                    }
                    else
                    {
                        echo '</a>';
                    }
                    
                }
            }
            $upsells_ids = implode(',', $upsells);
            ?>
            <div class="items-counter">
                <span>total items <span id="product_count"><?php echo do_shortcode('[product_upsell_count productID="119" upsells="'.$upsells_ids.'"]'); ?></span></span>
            </div>
        </div>
    </div>

	<div class="up-sells upsells products" id="product_sort" data-tags="<?php echo $current_term_slug; ?>" data-product="<?php echo $product->id; ?>" data-upsells="<?php echo $upsells_ids; ?>">
        <div class="animated-grid">
            <?php woocommerce_product_loop_start(); ?>

                <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                    <?php wc_get_template_part( 'content', 'product' ); ?>

                <?php endwhile; // end of the loop. ?>

            <?php woocommerce_product_loop_end(); ?>

        </div>
    </div>

<?php endif;

wp_reset_postdata();
