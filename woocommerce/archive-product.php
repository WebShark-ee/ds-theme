<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

wc_print_notices();
?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
        //remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
		//do_action( 'woocommerce_before_main_content' );
	?>

    <div class="container">
        <?php
        if (!is_product_category('systems') && !$wp_query->is_search && !is_shop())
        {
            ?>
        <div class="row row-accessories">
            <div class="col-xs-12" id="products_filter">
                <h1>Compatible with:</h1>
                <?php // echo do_shortcode('[woof autosubmit=1 is_ajax=1]'); ?>
                <?php
                $current_tax = get_query_var( 'product_cat' );
                $term = get_term_by( 'slug', $current_tax, 'product_cat');
                $term_id = $term->term_id;
                $term_link = get_term_link($term_id);
                $compatatible_with_url = get_query_var('compatatible_with');
                $compatatible_with_url = explode(',', $compatatible_with_url);
                global $wp;
                $terms = get_terms( 'product_tag' );
                $current_url = home_url(add_query_arg(array(),$wp->request));
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    foreach ( $terms as $term ) {
                        echo '<a ';
                        if (in_array($term->slug, $compatatible_with_url))
                        {
                            //$old_compatatible_url = array($term->slug, ',' . $term->slug);
                            $current_compatatible_url = array($term->slug);
                            $old_compatatible_url = array_diff($compatatible_with_url, $current_compatatible_url);
                            $new_compatatible_url = implode(',', $old_compatatible_url);
                            echo 'href="'. $term_link .'?compatatible_with=' . $new_compatatible_url . '"';
                        }
                        else
                        {
                           echo 'href="'. $term_link .'?compatatible_with=' . get_query_var('compatatible_with');
                           if (get_query_var('compatatible_with'))
                           {
                               echo ',';
                           }
                           echo $term->slug . '"'; 
                        }
                        echo ' class="btn btn-primary';
                        if (in_array($term->slug, $compatatible_with_url))
                        {
                            echo ' btn-disabled';
                        }
                        echo '" rel="' . $term->slug . '">' . $term->name . '</a>';
                    }
                }
                ?>
                <?php
                    /**
                     * woocommerce_archive_description hook.
                     *
                     * @hooked woocommerce_taxonomy_archive_description - 10
                     * @hooked woocommerce_product_archive_description - 10
                     */
                    do_action( 'woocommerce_archive_description' );
                ?>
                <div class="items-counter">
                    <span>total items <span id="product_count"><?php echo do_shortcode('[product_count]'); ?></span></span>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

        <div class="row row-cards row-accessories-cards">
            <div class="col-md-12" id="products_sort" data-tags="" data-cat="<?php echo get_query_var( 'product_cat' ); ?>">
                <div class="animated-grid">

                    <?php if ( have_posts() ) : ?>

                        <?php
                            /**
                             * woocommerce_before_shop_loop hook.
                             *
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                            //do_action( 'woocommerce_before_shop_loop' );
                        ?>

                        <?php woocommerce_product_loop_start(); ?>

                            <?php woocommerce_product_subcategories(); ?>

                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php
                                    /**
                                     * woocommerce_shop_loop hook.
                                     *
                                     * @hooked WC_Structured_Data::generate_product_data() - 10
                                     */
                                    do_action( 'woocommerce_shop_loop' );
                                ?>

                                <?php wc_get_template_part( 'content', 'product' ); ?>

                            <?php endwhile; // end of the loop. ?>

                        <?php woocommerce_product_loop_end(); ?>
                </div>
                
                <?php
                    /**
                     * woocommerce_after_shop_loop hook.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                ?>

                <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                    <?php
                        /**
                         * woocommerce_no_products_found hook.
                         *
                         * @hooked wc_no_products_found - 10
                         */
                        do_action( 'woocommerce_no_products_found' );
                    ?>

                <?php endif; ?>
                

            </div>
        </div>

    </div>
    <?php
        /**
         * woocommerce_after_main_content hook.
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action( 'woocommerce_after_main_content' );
    ?>
    

<?php get_footer( 'shop' ); ?>
