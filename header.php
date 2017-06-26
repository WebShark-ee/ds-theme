<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="content-wrapper">
		<div class="content">
    
            <nav class="navbar navbar-default" id="main-navbar">
                <div class="container nav-container nav-bg">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand hidden-xs" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <svg class="svg-logo">
                                <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgLogo" />
                            </svg>
                            <svg class="svg-logo-text">
                                <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgLogoText" />
                            </svg>
                        </a>
                        <div class="row row-top-xs visible-xs">
                            <div class="col-xs-4 col-xs-3-left">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="col-xs-4 col-mobile-logo">
                                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <svg class="svg-mobile-logo">
                                        <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#mob-logo" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-xs-4 col-xs-3-right">
                                <a href="#" class="mobile-account">My Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="row row-bottom-xs visible-xs">
                        <div class="col-xs-8">
                            <?php
                            get_search_form();
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <div class="li-switch">
                                <span class="switch-span-euro active">€</span>
                                <label class="switch">
                                    <input class="input-switch" type="checkbox">
                                    <div class="slider round"></div>
                                </label>
                                <span class="switch-span-dollar">$</span>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-right hidden-xs">
                        <?php
                        get_search_form();
                        ?>
                    </div>
                    <ul class="nav navbar-nav navbar-right hidden-xs">
                        <li class="li-switch">
                            <?php //echo do_action('wcml_currency_switcher', array('format' => '%name% (%symbol%)', 'switcher_style' => 'wcml-horizontal-list')); ?>
                            <div id="currency_state_current" class="hide"><?php echo get_woocommerce_currency(); ?></div>
                            <span class="switch-span-euro<?php if (get_woocommerce_currency() == 'EUR') { echo ' active'; } ?>">€</span>
                            <label class="switch">
                                <input class="input-switch" type="checkbox" id="currency_state">
                                <div class="slider round"></div>
                            </label>
                            <span class="switch-span-dollar<?php if (get_woocommerce_currency() == 'USD') { echo ' active'; } ?>">$</span>
                        </li>
                        <?php if (get_field('instagram_url', 'option')) { ?>
                        <li>
                            <a href="<?php the_field('instagram_url', 'option'); ?>">
                                <svg class="svg-social-icon">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgInsta" />
                                </svg>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (get_field('instagram_url', 'option')) { ?>
                        <li>
                            <a href="<?php the_field('facebook_url', 'option'); ?>">
                                <svg class="svg-social-icon">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgFb" />
                                </svg>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (get_field('google_url', 'option')) { ?>
                        <li>
                            <a href="<?php the_field('google_url', 'option'); ?>">
                                <svg class="svg-social-icon">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgGoogle" />
                                </svg>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (get_field('pinterest_url', 'option')) { ?>
                        <li>
                            <a href="<?php the_field('pinterest_url', 'option'); ?>">
                                <svg class="svg-social-icon">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgPin" />
                                </svg>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (get_field('twitter_url', 'option')) { ?>
                        <li>
                            <a href="<?php the_field('twitter_url', 'option'); ?>">
                                <svg class="svg-social-icon">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgTwitter" />
                                </svg>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- /.container-fluid -->
                <div class="container nav-container collapse-container">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php
                        wp_nav_menu( array(
                            'menu'              => 'primary',
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'menu_class'        => 'nav navbar-nav',
                            'menu_id'           => 'nav-bottom-left',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker())
                        );
                        ?>
                        <?php
                        /*
                        <ul class="nav navbar-nav navbar-right" id="nav-bottom-right">
                            <li>
                                <a href="#">
                                    <span>
                                        Log in /Sign up 
                                        <svg class="svg-cart">
                                            <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgCart" />
                                        </svg>
                                    </span>
                                    My Account 
                                </a>
                            </li>
                        </ul>
                        */
                        ?>
                        <div class="navbar-form-small navbar-right">
                            <?php
                            get_search_form();
                            ?>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <div class="breadcrumb-wrapper">
                    <?php
                    $args = array(
                        'delimiter' => '',
                        'wrap_before' => '<ol class="breadcrumb">',
                        'wrap_after' => '</ol>',
                    );
                    
                    woocommerce_breadcrumb($args);
                    ?>
               </div>
            </nav>
            
            <div class="navbar-placeholder"></div>
            
            <div id="main-content" class="main-content-area">
