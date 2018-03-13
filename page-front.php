<?php
/*
Template Name: Front page
Template Post Type: page
*/

get_header(); ?>

<div id="frontCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
    
    
    <?php if( have_rows('slider') ): ?>
    <div class="carousel-inner" role="listbox">

        <?php 
        $sc = 0;
        while( have_rows('slider') ): the_row();
            $image_desktop = get_sub_field('slider_item_lg_desktop');
            $image_tablet = get_sub_field('slider_item_sm_mobile');
            $image_mobile = get_sub_field('slider_item_xs_mobile');
            ?>
            <div class="item<?php if ($sc == 0) { echo ' active';} ?>">
                <?php if (get_sub_field('link')) { echo '<a href="' . get_sub_field('link') . '">'; }?>
                <img src="<?php echo $image_desktop['url']; ?>" alt="<?php echo $image['alt'] ?>" class="visible-lg-block img-responsive">
                <img src="<?php echo $image_tablet['url']; ?>" alt="<?php echo $image['alt'] ?>" class="visible-sm-block visible-md-block img-responsive">
                <img src="<?php echo $image_mobile['url']; ?>" alt="<?php echo $image['alt'] ?>" class="visible-xs-block img-responsive">
                <?php if (get_sub_field('link')) { echo '</a>'; }?>
            </div>

        <?php
        $sc++;
        endwhile;  
        ?>
    </div>
    <?php endif; ?>
    
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php
    for($i = 0; $i < $sc; ++$i)
    {
        echo '<li data-target="#frontCarousel" data-slide-to="' . $i . '"';
        if ($i == 0) { 
            echo ' class="active"';
        }
        echo '></li>';
    }
    ?>
    </ol>
    
    
    <a class="left carousel-control hidden-xs" href="#frontCarousel" role="button" data-slide="prev">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/left_arrow.png" alt="">
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control hidden-xs" href="#frontCarousel" role="button" data-slide="next">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/right_arrow.png" alt="">
        <span class="sr-only">Next</span>
    </a>
</div>

<?php get_footer();
