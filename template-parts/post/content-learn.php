<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="col-xs-12">
    <h1><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
    <p>
        <?php twentyseventeen_posted_on(); ?>
        <span class="span-block"><strong>Tags: </strong><?php echo get_the_term_list( $post->ID, 'learn_tag', '', ', ' ); ?></span>     
        <a href="<?php comments_link(); ?>">
            <?php comments_number( 'no comments', 'comment', '% comments' ); ?>
        </a>
    </p>
</div>
<div class="col-xs-12 col-sm-4 img-wrapper">
    <?php the_post_thumbnail( 'twentyseventeen-featured-image', ['class' => 'img-responsive'] ); ?>
</div>
<div class="col-xs-12 col-sm-8 btn-wrapper">
    <?php
        /* translators: %s: Name of current post */
        the_content( sprintf(
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
            get_the_title()
        ) );
        if ( !is_single() ) :
        ?>
        <a href="<?php echo get_permalink(); ?>" class="read-btn">Read more</a>
        <?php
        endif;
        
        wp_link_pages( array(
            'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
        ) );
    ?>
    <?php if ( is_single() ) : ?>
        <?php twentyseventeen_entry_footer(); ?>
    <?php endif; ?>
</div>
