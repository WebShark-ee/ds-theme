<?php/** * The template for displaying the footer * * Contains the closing of the #content div and all content after. * * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials * * @package WordPress * @subpackage Twenty_Seventeen * @since 1.0 * @version 1.0 */?></div>            
<footer id="footer-default">
	<div class="container nav-container nav-bg">
		<ul class="nav navbar-nav footer-nav-left">
			<li><a href="tel:+372 63 52 477">EU + 372 63 52 477</a></li>
			<li><span class="coma">,</span></li>
			<li><a href="tel:+ 1 818 262 9284">USA + 1 818 262 9284</a></li>
			<li><a href="#terms_condition" data-toggle="modal" data-target="#terms_condition">Terms and conditions</a></li>
			<li><a href="#privacy_policy" data-toggle="modal" data-target="#privacy_policy">Privacy policy</a></li>
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
			<?php } ?>                        <?php if (get_field('facebook_url', 'option')) { ?>                        
			<li>
				<a href="<?php the_field('facebook_url', 'option'); ?>" target="_blank">
					<svg class="svg-social-icon">
						<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgFb" />
					</svg>
				</a>
			</li>
			<?php } ?>                        <?php if (get_field('google_url', 'option')) { ?>                        
			<li class="hidden-xs">
				<a href="<?php the_field('google_url', 'option'); ?>" target="_blank">
					<svg class="svg-social-icon">
						<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgGoogle" />
					</svg>
				</a>
			</li>
			<?php } ?>                        <?php if (get_field('pinterest_url', 'option')) { ?>                        
			<li class="hidden-xs">
				<a href="<?php the_field('pinterest_url', 'option'); ?>" target="_blank">
					<svg class="svg-social-icon">
						<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgPin" />
					</svg>
				</a>
			</li>
			<?php } ?>                        <?php if (get_field('twitter_url', 'option')) { ?>                        
			<li>
				<a href="<?php the_field('twitter_url', 'option'); ?>" target="_blank">
					<svg class="svg-social-icon">
						<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgTwitter" />
					</svg>
				</a>
			</li>
			<?php } ?>                                                
			<li>                            <a href="https://www.digitalsputnik.com/eas-euerdf-and-digital-sputnik/"><img class="eas-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/eas.png"></a>                        </li>
		</ul>
	</div>
</footer>
</div>    </div>        
<div class="modal fade" id="terms_condition" tabindex="-1" role="dialog" aria-labelledby="terms_condition">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form class="form-horizontal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
					<h4 class="modal-title" id="myModalLabel">Terms and conditions</h4>
				</div>
				<div class="modal-body">
					<?php if (get_field('terms_and_condition', 'option')) {
						the_field('terms_and_condition', 'option');
					} ?>                    
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="privacy_policy" tabindex="-1" role="dialog" aria-labelledby="privacy_policy">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form class="form-horizontal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
					<h4 class="modal-title" id="myModalLabel">Privacy policy</h4>
				</div>
				<div class="modal-body">
					<?php if (get_field('privacy_policy', 'option')) {
						the_field('privacy_policy', 'option');
					} ?>                    
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="agree_terms_condition" tabindex="-1" role="dialog" aria-labelledby="agree_terms_condition">
	<div class="modal-dialog modal-lg bg-danger" role="document">
		<div class="modal-content">
			<form class="form-horizontal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                         
					<h4 class="modal-title" id="myModalLabel">Info</h4>
				</div>
				<div class="modal-body">
					<h3>You should agree terms and conditions!</h3>
				</div>
			</form>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>