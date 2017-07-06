<?php
/**
 * The template for displaying archive pages
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
    <div class="row row-learn">
        <div id="sidebar" class="col-sm-12 col-md-4 col-md-push-8">
            <div class="wrapper">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <svg class="svg-search">
                                <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgSearch"/>
                            </svg>
                        </div>
                        <input class="form-control" placeholder="search:" type="text">
                    </div>
                </div>
                <h1 class="box-heading">Tags</h1>
                <div class="post_tags">
                <?php
                $args = array('taxonomy' => 'learn_tag', 'hide_empty' => false);
                $tags = get_terms($args);
                foreach ( $tags as $tag ) {
                    $tag_link = get_tag_link( $tag->term_id );
                    echo '<a href="' . $tag_link . '">' . $tag->name . '</a> ';
                }
                ?>
                </div>
                <h1 class="box-heading">Recent Posts</h1>
                <ul class="posts">
                    <?php
                    $args = array(
                        'numberposts' => 3,
                        'post_type' => 'learn',
                    );
                    $recent_posts = wp_get_recent_posts($args);
                    foreach( $recent_posts as $recent ){
                        echo '<li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a></li>';
                    }
                    wp_reset_query();
                    ?>
                </ul>
                <h1 class="box-heading">Categories</h1>
                <ul class="posts">
                    <?php
                    $args = array('taxonomy' => 'learn_categorie', 'hide_empty' => false);
                    $tags = get_terms($args);
                    foreach ( $tags as $tag ) {
                        $tag_link = get_tag_link( $tag->term_id );
                        echo '<li><a href="' . $tag_link . '">' . $tag->name . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-8 col-md-pull-4">
            <div class="row row-posts">
                <?php
                if ( have_posts() ) :

                    /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/post/content', 'learn' );

                    endwhile;

                    the_posts_pagination( array(
                        'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
                        'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
                    ) );

                else :

                    get_template_part( 'template-parts/post/content', 'none' );

                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();
