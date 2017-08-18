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
			<td class="td" style="text-align:<?php echo $text_align; ?>; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" valign="top" width="50%">
				<h3><?php _e( 'Customer details', 'woocommerce' ); ?></h3>
			</td>
			<ul>
				<?php foreach ( $fields as $field ) : ?>
					<li><strong><?php echo wp_kses_post( $field['label'] ); ?>:</strong> <span class="text"><?php echo wp_kses_post( $field['value'] ); ?></span></li>
				<?php endforeach; ?>
			</ul>
		</tr>
	</table>
<?php endif; ?>
