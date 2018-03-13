<?php
/**
 * Email Header
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-header.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
		<style type="text/css">
			@media only screen and (max-width: 880px) {
				.force-frame {
					width: 100%!important;
					max-width: 100%!important;
				}
				.force-narrow {
					width: 15px!important;
				}
				.force-hide {
					display: none!important;
				}
			}
			@media only screen and (max-width: 550px) {
				.force-title {
					font-size: 24px!important;
					line-height: 28px!important;
				}
				.force-text {
					font-size: 12px!important;
					line-height: 14px!important;
				}
			}
		</style>
	</head>
	<body <?php echo is_rtl() ? 'rightmargin' : 'leftmargin'; ?>="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="margin: 0px; padding: 0px; background-color: #FEFEFE;">
		<div id="wrapper" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'?>">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td align="center" valign="top">
						<div id="template_header_image">
							<?php
								if ( $img = get_option( 'woocommerce_email_header_image' ) ) {
									echo '<p style="margin-top:0;"><img src="' . esc_url( $img ) . '" alt="' . get_bloginfo( 'name', 'display' ) . '" /></p>';
								}
							?>
							
						</div>
						<table class="force-frame" border="0" cellpadding="0" cellspacing="0" width="880" align="center" style="margin: auto;">
							<tr>
								<td background="<?php echo get_template_directory_uri(); ?>/woocommerce/emails/images/header.png" bgcolor="#6D6E70" valign="top">
								<!--[if gte mso 9]>
								<v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:880px;height:140px;">
								<v:fill type="tile" src="<?php echo get_template_directory_uri(); ?>/woocommerce/emails/images/header.png" color="#6D6E70" />
								<v:textbox inset="0,0,0,0">
								<![endif]-->
								<div>
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_header">
										<tr>
											<td class="force-narrow" style="line-height: 0px; font-size: 0px;" width="35">&nbsp;</td>
											<td>
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td height="30" style="height: 30px; line-height: 0px; font-size: 0px;">&nbsp;</td>
													</tr>
													<tr>
														<td>
															<table border="0" cellpadding="0" cellspacing="0" width="100%">
																<tr>
																	<td class="force-title" valign="middle" style="font-family: Arial, Helvetica, sans-serif; font-size: 44px; line-height: 44px; color: #FFFFFF; font-weight: 600; vertical-align: middle;"><?php echo $email_heading; ?></td>
																	<td style="line-height: 0px; font-size: 0px;" width="15">&nbsp;</td>
																	<td width="160" style="font-family: Arial, Helvetica, sans-serif; font-size: 22px; line-height: 26px; color: #FFFFFF; font-weight: 600;"><img src="<?php echo get_template_directory_uri(); ?>/woocommerce/emails/images/logo.png" width="160" height="90" border="0" alt="Digital Sputnik" style="display: block;"></td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td height="20" style="height: 20px; line-height: 0px; font-size: 0px;">&nbsp;</td>
													</tr>
												</table>
											</td>
											<td class="force-narrow" style="line-height: 0px; font-size: 0px;" width="35">&nbsp;</td>
										</tr>
									</table>
								</div>
								<!--[if gte mso 9]>
								</v:textbox>
								</v:rect>
								<![endif]-->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_body">
										<tr>
											<td class="force-narrow" style="line-height: 0px; font-size: 0px;" width="25">&nbsp;</td>
											<td valign="top" id="body_content">
												<!-- Content -->
												<table border="0" cellpadding="20" cellspacing="0" width="100%">
													<tr>
														<td valign="top">
															<div id="body_content_inner">
