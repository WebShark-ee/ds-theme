<?php
/*
Template Name: Contacts page
Template Post Type: page
*/

get_header(); ?>

<div class="container">
	<?php
    if( have_rows('locations') ):
        while ( have_rows('locations') ) : the_row();
        ?>
        <div class="row row-about">
            <div class="col-md-12 header-grey-box">
                <h1><?php echo get_sub_field('location'); ?></h1>
            </div>
            <div class="col-md-12">
                <?php
                $location = get_sub_field('map');
                if( !empty($location) ):
                ?>
                <div class="acf-map">
                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12 map-info">
                  <?php echo get_sub_field('address'); ?>
            </div>
        </div>
        <?php
        endwhile;
    endif;
    ?>
    
    <div class="row row-about">
        <div class="col-md-12 header-grey-box">
            <h1>Contact Info</h1>
        </div>
        <div class="col-md-12 map-info">
            <?php the_field('contact_info'); ?>
        </div>
    </div>
    
    <div class="row row-about">
        <div class="col-md-12 header-grey-box">
            <h1>Resellers</h1>
        </div>
        <div class="col-md-12">
            <div class="acf-map">
            <?php
            if( have_rows('resellers') ):
                while ( have_rows('resellers') ) : the_row();
                ?>
                <div class="col-md-12">
                    <?php
                    $location = get_sub_field('map');
                    if( !empty($location) ):
                    ?>
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    <?php endif; ?>
                </div>
                <?php
                endwhile;
            endif;
            ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();
