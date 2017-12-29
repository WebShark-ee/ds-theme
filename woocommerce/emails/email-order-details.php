<?php
/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text_align = is_rtl() ? 'right' : 'left';

do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>

<?php if ( ! $sent_to_admin ) : ?>
	<tr>
		<td style="background: #6D6E70">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td style="line-height: 0px; font-size: 0px;" width="10">&nbsp;</td>
					<td>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td height="15" style="height: 15px; line-height: 0px; font-size: 0px;">&nbsp;</td>
							</tr>
							<tr>
								<td class="force-title" style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 44px; line-height: 44px;"><?php printf( __( 'Order #%s', 'woocommerce' ), $order->get_order_number() ); ?></td>
							</tr>
							<tr>
								<td height="15" style="height: 15px; line-height: 0px; font-size: 0px;">&nbsp;</td>
							</tr>
						</table>
					</td>
					<td style="line-height: 0px; font-size: 0px;" width="10">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
<?php else : ?>
	<tr>
		<td style="background: #6D6E70">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td style="line-height: 0px; font-size: 0px;" width="10">&nbsp;</td>
					<td>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td height="15" style="height: 15px; line-height: 0px; font-size: 0px;">&nbsp;</td>
							</tr>
							<tr>
								<td class="force-title" style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 44px; line-height: 44px;"><a class="link" href="<?php echo esc_url( admin_url( 'post.php?post=' . $order->get_id() . '&action=edit' ) ); ?>"><?php printf( __( 'Order #%s', 'woocommerce' ), $order->get_order_number() ); ?></a> (<?php printf( '<time datetime="%s">%s</time>', $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created() ) ); ?>)</td>
							</tr>
							<tr>
								<td height="15" style="height: 15px; line-height: 0px; font-size: 0px;">&nbsp;</td>
							</tr>
						</table>
					</td>
					<td style="line-height: 0px; font-size: 0px;" width="10">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
<?php endif; ?>

<table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="1">
	<thead>
		<tr>
			<th class="td" scope="col" style="text-align:<?php echo $text_align; ?>;"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th class="td" scope="col" style="text-align:<?php echo $text_align; ?>;"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
			<th class="td" scope="col" style="text-align:<?php echo $text_align; ?>;"><?php _e( 'Price', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo wc_get_email_order_items( $order, array(
			'show_sku'      => $sent_to_admin,
			'show_image'    => false,
			'image_size'    => array( 32, 32 ),
			'plain_text'    => $plain_text,
			'sent_to_admin' => $sent_to_admin,
		) ); ?>
	</tbody>
	<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
						<th class="td" scope="row" colspan="2" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo $total['label']; ?></th>
						<td class="td" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo $total['value']; ?></td>
					</tr><?php
				}
			}
		?>
	</tfoot>
</table>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>
