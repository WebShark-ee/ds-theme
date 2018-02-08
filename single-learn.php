<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container">
    <div class="row row-learn">
        
        <div class="col-sm-12 col-md-12">
            <div class="row row-posts">
                <?php
                while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', 'learn' );
                    if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();
