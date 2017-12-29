<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
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

?><table id="addresses" cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0">
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
								<td class="force-title" style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 44px; line-height: 44px;"><?php _e( 'Billing address', 'woocommerce' ); ?></td>
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
	<tr>
		<td style="font-family: Arial, Helvetica, sans-serif; color: #737373; font-size: 1em; line-height: 1.4em; padding: 15px 0;">
			<?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
			<?php if ( $order->get_billing_phone() ) : ?>
				<p><?php echo esc_html( $order->get_billing_phone() ); ?></p>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && ( $shipping = $order->get_formatted_shipping_address() ) ) : ?>
			<td class="td" style="text-align:<?php echo $text_align; ?>; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" valign="top" width="50%">
				<h3><?php _e( 'Shipping address', 'woocommerce' ); ?></h3>

				<p class="text"><?php echo $shipping; ?></p>
			</td>
		<?php endif; ?>
	</tr>
</table>
