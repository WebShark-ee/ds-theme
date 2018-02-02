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
        <div id="sidebar" class="col-sm-12 col-md-3 col-md-push-9">
            <div class="wrapper">
                <form role="search" method="get" id="searchform" action="<?php echo get_site_url(); ?>/news/">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <svg class="svg-search">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgSearch"/>
                                </svg>
                            </div>
                            <input class="form-control" placeholder="search:" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s">
                            <input type="hidden" value="1" name="sentence" />
                            <input type="hidden" value="post" name="post_type" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-9 col-md-pull-3">
            <div class="card-post">
                <?php
                while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile; // End of the loop.
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();
