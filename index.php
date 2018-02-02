<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container">
    <div class="row row-news">
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
                <?php
                if ( have_posts() ) :
                    ?>
                    <div class="row row-cards-fluid">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/post/content', get_post_format() );

                    endwhile;
                    ?>
                    </div>
                    <div class="clearfix"></div>
                    <?php
                    the_posts_pagination( array(
                        'prev_text' => '→' . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
                        'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . '→',
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
                    ) );

                else :

                    get_template_part( 'template-parts/post/content', 'none' );

                endif;
                ?>
        </div>
    </div>
</div>

<?php get_footer();
