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
            <h1>Distributors</h1>
        </div>
        <div class="col-md-12 white-box">
            <div class="row">
                <?php
                if( have_rows('resellers') ):
                    while ( have_rows('resellers') ) : the_row();
                    ?>
                    <div class="col-md-2">
                        <a class="tab-header" href="#" id="country_<?php echo str_replace(' ', '_', strtolower(get_sub_field('country'))); ?>">&gt; <?php echo get_sub_field('country'); ?></a>
                    </div>
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
        
        <?php
        if( have_rows('resellers') ):
            while ( have_rows('resellers') ) : the_row();
            ?>
            <div class="tab-country hidden" id="country_<?php echo str_replace(' ', '_', strtolower(get_sub_field('country'))); ?>_block">
                <div class="col-md-12 header-grey-box">
                    <h1><?php echo get_sub_field('country'); ?></h1>
                </div>
                <div class="col-md-12 white-box">
                        <?php
                        if( have_rows('location') ):
                            $fs = 1;
                            $fs_id = 1;
                            while ( have_rows('location') ) : the_row();
                            
                            if ($fs == 1 || ($fs % 5) == 0) 
							{
							?>
								<div class="row">
							<?php
							}
							?>
                            <div class="col-md-3">
                                <?php echo get_sub_field('city'); ?><br />
                                <strong><?php echo get_sub_field('company'); ?></strong><br />
                                <?php echo get_sub_field('address'); ?><br /><br />
                                <a href="mailto:<?php echo get_sub_field('mail'); ?>"><?php echo get_sub_field('mail'); ?></a><br />
                                <a href="tel:<?php echo get_sub_field('phone'); ?>"><?php echo get_sub_field('phone'); ?></a>
                            </div>
                            <?php
                            if (($fs % 4) == 0) 
							{
								?>
								</div>
								<?php
								$fs_id++;
							}
                            $fs++;
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="acf-map-reseller">
                        <?php
                        if( have_rows('location') ):
                            while ( have_rows('location') ) : the_row();
                            
                            $location = get_sub_field('map');
                            if( !empty($location) ):
                                ?>
                                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                                    <p>
                                        <strong><?php echo get_sub_field('company'); ?></strong>
                                    </p>
                                    <p>
                                        <?php // echo get_sub_field('address'); ?>
                                    </p>
                                    <p class="address">
                                        <a href="mailto:<?php echo get_sub_field('mail'); ?>"><?php echo get_sub_field('mail'); ?></a><br />
                                        <a href="tel:<?php echo get_sub_field('phone'); ?>"><?php echo get_sub_field('phone'); ?></a>
                                    </p>
                                </div>
                                <?php
                                endif;
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>
</div>

<?php get_footer();
