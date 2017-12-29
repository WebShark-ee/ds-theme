<?php
/*
Template Name: Products page
Template Post Type: page
*/

get_header(); ?>

<div class="container">
    <div class="row row-about">
        <div class="col-md-12 header-grey-box">
            <?php
                $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 6
                );
                $featured_query = new WP_Query( $args );
                if ($featured_query->have_posts()) :
            ?>
                <ul class="products">
                    <?php
                        echo "<h3>" . __("Featured Products") . "</h3>";
                        if ( $featured_query->have_posts() ) {
                            while ( $featured_query->have_posts() ) : $featured_query->the_post();
                                woocommerce_get_template_part( 'content', 'product' );
                            endwhile;
                        } else {
                            echo __( 'No products found' );
                        }
                        wp_reset_postdata();
                    ?>
                </ul><!--/.products-->
        <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer();
