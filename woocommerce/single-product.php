<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

            <div class="modal fade" id="ask_offer" tabindex="-1" role="dialog" aria-labelledby="ask_offer">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-horizontal">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Ask for offer</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="inputname" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputname" name="inputname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputemail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputemail" name="inputemail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputphone" name="inputphone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputcomment" class="col-sm-2 control-label">Comment</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputcomment" name="inputcomment"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputproduct" class="col-sm-2 control-label">Product</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputproduct" name="inputproduct" disabled="disabled" value="<?php echo $product->get_title(); ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div id="product_question_message" class="pull-left"></div>
                                <button type="button" class="btn btn-primary pull-right" id="product_question"><span class="btn-loading hidden"><i class="fa fa-spinner fa-spin"></i></span>Send form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer( 'shop' ); ?>
