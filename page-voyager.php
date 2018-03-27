<?php
/*
Template Name: Voyager page
Template Post Type: page
*/

get_header(); ?>

<div class="voyager">
    <div class="container">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/voyager.jpg">
        <div class="row">
            <div class="col row-bottom-border">
                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'voyager',
                    'menu'            => 'voyager',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => '',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '%3$s',		
                    'depth'           => 0,
                    'walker'          => new Description_Walker
                    ) 
                );
                ?>
            </div>
        </div>
    </div>
    <div class="container bg">
        <div class="row">
            <div class="col">
                <h2 class="cyan"><?php the_field('what_is_voyager_title'); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col col-50">
                <?php the_field('what_is_voyager_text'); ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="video-container">
             <?php the_field('what_is_voyager_video'); ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="red"><?php the_field('technical_specs_title'); ?></h2>
            </div>
        </div>
        <?php 
        $technical_specs_image = get_field('technical_specs_image');
        if( !empty($technical_specs_image) ): ?>
            <img src="<?php echo $technical_specs_image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
        <?php endif; ?>
        <?php the_field('technical_specs_text'); ?>
        <div class="gallery">
            <?php
            if( have_rows('gallery') ):
                $i == 1;
                while ( have_rows('gallery') ) : the_row();
                    $field = get_sub_field_object('type');
                    $value = $field['value'];
                    $gallery_image = get_sub_field('image');
                    ?>
                    <div class="col<?php if ($i > 3) { echo ' collapse';}; ?>">
                        <a class="popup-<?php echo $value; ?>" href="<?php if ($value == 'youtube' or $value == 'youtube') { echo get_sub_field('link');} else { echo $gallery_image['url']; } ?>">
                            <img class="img-centered" src="<?php echo $gallery_image['url']; ?>">
                        </a>
                    </div>
                    <?php
                    $i++;
                endwhile;
            endif;
            ?>
            <div class="col">
                <a class="btn" id="wall">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/button.png">
                    <div class="arrow"></div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="cyan"><?php the_field('what_users_say_title'); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="separator"></div>
        </div>
        <div class="row">
            <?php the_field('what_users_say_text'); ?>
        </div>
        <div class="row">
            <div class="separator"></div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="green"><?php the_field('lightgrading_software_title'); ?></h2>
            </div>
        </div>
        <div class="row">
            <?php the_field('lightgrading_software_text'); ?>
        </div>
    </div>
</div>

<?php get_footer();
