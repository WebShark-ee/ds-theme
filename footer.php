<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
            </div>
            <footer id="footer-default">
                <div class="container nav-container nav-bg">
                    <ul class="nav navbar-nav footer-nav-left">
                        <li><a href="tel:+372 63 52 477">EU + 372 63 52 477</a></li>
                        <li><span class="coma">,</span></li>
                        <li><a href="tel:+ 1 818 262 9284">USA + 1 818 262 9284</a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right footer-nav-right">
                        <?php if (get_field('instagram_url', 'option')) { ?>
                        <li>
                            <a href="<?php the_field('instagram_url', 'option'); ?>" target="_blank">
                                <svg class="svg-social-icon">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgInsta" />
                                </svg>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (get_field('facebook_url', 'option')) { ?>
                        <li>
                            <a href="<?php the_field('facebook_url', 'option'); ?>" target="_blank">
                                <svg class="svg-social-icon">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgFb" />
                                </svg>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (get_field('google_url', 'option')) { ?>
                        <li class="hidden-xs">
                            <a href="<?php the_field('google_url', 'option'); ?>" target="_blank">
                                <svg class="svg-social-icon">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgGoogle" />
                                </svg>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (get_field('pinterest_url', 'option')) { ?>
                        <li class="hidden-xs">
                            <a href="<?php the_field('pinterest_url', 'option'); ?>" target="_blank">
                                <svg class="svg-social-icon">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgPin" />
                                </svg>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (get_field('twitter_url', 'option')) { ?>
                        <li>
                            <a href="<?php the_field('twitter_url', 'option'); ?>" target="_blank">
                                <svg class="svg-social-icon">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgTwitter" />
                                </svg>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
    
<?php wp_footer(); ?>

</body>
</html>
