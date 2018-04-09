<?php
/*
Template Name: Manuals page
Template Post Type: page
*/

get_header(); ?>

<div class="container">
    <?php
    $params = array(
        'posts_per_page' => -1, 
        'post_type' => 'product',
        'meta_query' => array (
            array (
                //'relation' => 'OR',
                'key' => 'files', //The field to check.
                'value' => '', //The value of the field.
                'compare' => '!=', //Conditional statement used on the value.
            ),  
        ),
    );
    $wc_query = new WP_Query($params); // (2)
    ?>
    <?php if ($wc_query->have_posts()) : // (3) ?>
    <?php while ($wc_query->have_posts()) : // (4)
        $wc_query->the_post(); ?>
        <div class="row row-with-border">
            <div class="col col-25">
                <h2><?php the_title(); ?></h2>
            </div>
            <div class="col col-75">
                <table>
                    <?php
                    if( have_rows('files') ):
                        while ( have_rows('files') ) : the_row();
                            $numbers = get_sub_field('file_list');
                            $numbers = count($numbers);
                            ?>
                            <tr>
                                <td<?php if ($numbers > 1) { echo ' rowspan="' . $numbers . '"'; } ?>><?php echo get_sub_field('type'); ?></td>
                                <?php
                                while ( have_rows('file_list') ) : the_row();
                                    $file_vs_link = get_sub_field('file_or_link');
                                    $file = get_sub_field('file');
                                    ?>
                                    <td><?php echo get_sub_field('name'); ?></td>
                                    <td>
                                        <a href="<?php 
                                        if ($file_vs_link == 'file')
                                        {
                                            echo $file['url'];
                                        }
                                        else
                                        {
                                            echo get_sub_field('link');
                                        }
                                        ?>" class="btn">download</a>
                                    </td>
                                    </tr>
                                    <?php
                                endwhile;
                                ?>
                            <?php
                        endwhile;
                    endif;
                            /*
                        echo '<div class="col-md-12 title">' . get_sub_field('type') . '</div>';
                            echo '<div class="col-md-12"><div class="downloads-wrapper clearfix">';
                            while ( have_rows('file_list') ) : the_row();
                                $file_vs_link = get_sub_field('file_or_link');
                                $file = get_sub_field('file');
                                echo '<div class="col-md-6">';
                                    echo '<p>' . get_sub_field('name') . '</p>';
                                    echo '<div class="triangle-wrapper">';
                                        echo '<div><a href="';
                                        if ($file_vs_link == 'file')
                                        {
                                            echo $file['url'];
                                        }
                                        else
                                        {
                                            echo get_sub_field('link');
                                        }
                                        echo '" class="triangle-btn" target="_blank">download</a>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            endwhile;
                            echo '</div></div>';
                        endwhile;
                        echo '</div>';
                    endif;
                             * 
                             */
                    ?>
                </table>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); // (5) ?>
    <?php else:  ?>
    <p>
         <?php _e( 'No Products' ); // (6) ?>
    </p>
    <?php endif; ?>
</div>

<?php get_footer();
