<?php
/*
Template Name: About us page
Template Post Type: page
*/

get_header(); ?>

<div class="container-fluid">
    <div class="row row-hero">
        <div id="hero" class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-7">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php
if( have_rows('people') ):
    while ( have_rows('people') ) : the_row();
    ?>
<div class="container">
	<div class="row row-about">
		<div class="col-md-12 header-grey-box">
			<h1><?php echo get_sub_field('team_title'); ?></h1>
		</div>
		<div class="col-md-12">
			<div class="row row-persona">
                <?php
                while ( have_rows('team_content') ) : the_row();
                    $image_person = get_sub_field('person_image');
                    ?>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="persona-card">
                            <div class="img-wrapper">
                                <img src="<?php echo $image_person['url']; ?>" alt="<?php echo get_sub_field('person_name'); ?>" class="img-responsive">
                            </div>
                            <div class="description">
                                <span><?php echo get_sub_field('person_name'); ?><br><?php echo get_sub_field('person_position'); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                ?>
			</div>
		</div>
	</div>
</div>
<?php
    endwhile;
endif;
?>
<?php get_footer();
