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



                        if ($fs == 1 || ($fs % 4) == 1)

                        {

                        ?>

                            <div class="row">

                        <?php

                        }

                        ?>

                        <div class="col-md-3">

                            <p><?php echo get_sub_field('city'); ?></p>

                            <strong><?php echo get_sub_field('company'); ?></strong><br />

                            <?php echo get_sub_field('address'); ?><br />

                            <a href="mailto:<?php echo get_sub_field('mail'); ?>"><?php echo get_sub_field('mail'); ?></a><br />

                            <a href="tel:<?php echo get_sub_field('phone'); ?>"><?php echo get_sub_field('phone'); ?></a>

                        </div>

                        <?php

                        if (($fs % 4) == 0) 

                        {

                            ?>

                            </div>

                            <?php

                        }

                        if (($fs % 4) != 0) 

                        {

                            $fs_last = '</div>';

                        }

                        else {
                            $fs_last = '';
                        }
                        $fs++;
                        endwhile;
                        echo $fs_last;
                    endif;
                    ?>
                </div>
            <?php
            endwhile;
        endif;
    ?>
    </div>
    <div class="row row-about">

        <div class="col-md-12 header-grey-box">

            <h1>Retailers</h1>

        </div>

        <div class="col-md-12 white-box">

            <div class="row">

                <?php

                if( have_rows('retailers') ):

                    while ( have_rows('retailers') ) : the_row();

                    ?>

                    <div class="col-md-2">

                        <a class="tab-header" href="#" id="country_retailer_<?php echo str_replace(' ', '_', strtolower(get_sub_field('country'))); ?>">&gt; <?php echo get_sub_field('country'); ?></a>

                    </div>

                    <?php

                    endwhile;

                endif;

                ?>

            </div>

        </div>
        <?php
        if( have_rows('retailers') ):

            while ( have_rows('retailers') ) : the_row();

            ?>

            <div class="tab-country hidden" id="country_retailer_<?php echo str_replace(' ', '_', strtolower(get_sub_field('country'))); ?>_block">

                <div class="col-md-12 header-grey-box">

                    <h1><?php echo get_sub_field('country'); ?></h1>

                </div>

                <div class="col-md-12 white-box">

                    <?php

                    if( have_rows('location') ):

                        $fs = 1;

                        $fs_id = 1;

                        while ( have_rows('location') ) : the_row();



                        if ($fs == 1 || ($fs % 4) == 1)

                        {

                        ?>

                            <div class="row">

                        <?php

                        }

                        ?>

                        <div class="col-md-3">

                            <p><?php echo get_sub_field('city'); ?></p>

                            <strong><?php echo get_sub_field('company'); ?></strong><br />

                            <?php echo get_sub_field('address'); ?><br />

                            <a href="mailto:<?php echo get_sub_field('mail'); ?>"><?php echo get_sub_field('mail'); ?></a><br />

                            <a href="tel:<?php echo get_sub_field('phone'); ?>"><?php echo get_sub_field('phone'); ?></a>

                        </div>

                        <?php

                        if (($fs % 4) == 0) 

                        {

                            ?>

                            </div>

                            <?php

                        }

                        if (($fs % 4) != 0) 

                        {

                            $fs_last = '</div>';

                        }

                        else {
                            $fs_last = '';
                        }
                        $fs++;
                        endwhile;
                        echo $fs_last;
                    endif;
                    ?>
                </div>
            <?php
            endwhile;

        endif;
        ?>

    </div>

</div>



<?php get_footer();

