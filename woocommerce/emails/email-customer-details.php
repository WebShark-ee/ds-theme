<?php
/**
 * Additional Customer Details
 *
 * This is extra customer data which can be filtered by plugins. It outputs below the order item table.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-customer-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<?php if ( ! empty( $fields ) ) : ?>
	
	<table cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0">
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
									<td class="force-title" style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 44px; line-height: 44px;"><?php _e( 'Customer details', 'woocommerce' ); ?></td>
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
			<td>
				<ul style="font-family: Arial, Helvetica, sans-serif; color: #737373; font-size: 1em; line-height: 1.4em; padding: 20px 0px; margin: 0px;">
					<?php foreach ( $fields as $field ) : ?>
						<li style="font-family: Arial, Helvetica, sans-serif; color: #737373; font-size: 1em; line-height: 1.4em; padding: 0px; margin: 0px;"><strong><?php echo wp_kses_post( $field['label'] ); ?>:</strong> <span class="text"><?php echo wp_kses_post( $field['value'] ); ?></span></li>
					<?php endforeach; ?>
				</ul>
			</td>
		</tr>
	</table>
<?php endif; ?>
