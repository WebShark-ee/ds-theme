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
    <!--
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
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                            <p>
                                <strong><?php echo get_sub_field('company'); ?></strong>
                            </p>
                            <p>
                                <?php echo get_sub_field('contact_person'); ?>
                            </p>
                            <p>
                                <?php echo get_sub_field('contact'); ?>
                            </p>
                            <p class="address">
                                <?php echo get_sub_field('mailing_aadress'); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
                endwhile;
            endif;
            ?>
            </div>
        </div>
    </div>-->
    <div class="row row-about">
							<div class="col-md-12 header-grey-box">
								<h1>Distributors</h1>
							</div>
							<div class="col-md-12 white-box">
								<div class="row">
									<div class="col-md-2">
										<a class="tab-header" href="#">&gt; Australia</a><br>
										<a class="tab-header" href="#">&gt; Austria</a><br>
										<a class="tab-header" href="#">&gt; Belgium</a>
									</div>
									<div class="col-md-2">
										<a class="tab-header" href="#">&gt; France</a><br>
										<a class="tab-header" href="#">&gt; Germany</a><br>
										<a class="tab-header" href="#">&gt; Japan</a>
									</div>
									<div class="col-md-2">
										<a class="tab-header" href="#">&gt; New Zealand</a><br>
										<a class="tab-header" href="#">&gt; South Africa</a><br>
										<a class="tab-header" href="#">&gt; Switzerland</a>
									</div>
									<div class="col-md-2">
										<a class="tab-header" href="#">&gt; UK</a><br>
										<a class="tab-header" href="#">&gt; USA</a><br>
									</div>
								</div>
							</div>
							<div class="tab-country tab-open">
								<div class="col-md-12 header-grey-box">
									<h1>Australia</h1>
								</div>
								<div class="col-md-12 white-box">
									<p>
										<b>Adress:</b> Niine 11, 10414 Tallinn<br>
										<b>Phone:</b> <a href="tel:+3726352477">+372 63 52 477</a>
									</p>
								</div>
								<div class="col-md-12">
									<div class="acf-map">
										<div class="marker" data-lat="59.44384549999999" data-lng="24.73950089999994"></div>
									</div>
								</div>
							</div>
							<div class="tab-country">
								<div class="col-md-12 header-grey-box">
									<h1>Austria</h1>
								</div>
								<div class="col-md-12 white-box">
									<p>
										<b>Adress:</b> Niine 11, 10414 Tallinn<br>
										<b>Phone:</b> <a href="tel:+3726352477">+372 63 52 477</a>
									</p>
								</div>
								<div class="col-md-12">
									<div class="acf-map">
										<div class="marker" data-lat="59.44384549999999" data-lng="24.73950089999994"></div>
									</div>
								</div>
							</div>
							<div class="tab-country">
								<div class="col-md-12 header-grey-box">
									<h1>Belgium</h1>
								</div>
								<div class="col-md-12 white-box">
									<p>
										<b>Adress:</b> Niine 11, 10414 Tallinn<br>
										<b>Phone:</b> <a href="tel:+3726352477">+372 63 52 477</a>
									</p>
								</div>
								<div class="col-md-12">
									<div class="acf-map">
										<div class="marker" data-lat="59.44384549999999" data-lng="24.73950089999994"></div>
									</div>
								</div>
							</div>
							<div class="tab-country">
								<div class="col-md-12 header-grey-box">
									<h1>France</h1>
								</div>
								<div class="col-md-12 white-box">
									<p>
										<b>Adress:</b> Niine 11, 10414 Tallinn<br>
										<b>Phone:</b> <a href="tel:+3726352477">+372 63 52 477</a>
									</p>
								</div>
								<div class="col-md-12">
									<div class="acf-map">
										<div class="marker" data-lat="59.44384549999999" data-lng="24.73950089999994"></div>
									</div>
								</div>
							</div>
							<div class="tab-country">
								<div class="col-md-12 header-grey-box">
									<h1>Germany</h1>
								</div>
								<div class="col-md-12 white-box">
										Text
								</div>
								<div class="col-md-12">
									<div class="acf-map">
										<div class="marker" data-lat="59.44384549999999" data-lng="24.73950089999994"></div>
									</div>
								</div>
							</div>
							<div class="tab-country">
								<div class="col-md-12 header-grey-box">
									<h1>Japan</h1>
								</div>
								<div class="col-md-12 white-box">
										Text
								</div>
								<div class="col-md-12">
									<div class="acf-map">
										<div class="marker" data-lat="59.44384549999999" data-lng="24.73950089999994"></div>
									</div>
								</div>
							</div>
							<div class="tab-country">
								<div class="col-md-12 header-grey-box">
									<h1>New Zealand</h1>
								</div>
								<div class="col-md-12 white-box">
										Text
								</div>
								<div class="col-md-12">
									<div class="acf-map">
										<div class="marker" data-lat="59.44384549999999" data-lng="24.73950089999994"></div>
									</div>
								</div>
							</div>
							<div class="tab-country">
								<div class="col-md-12 header-grey-box">
									<h1>South Africa</h1>
								</div>
								<div class="col-md-12 white-box">
										Text
								</div>
								<div class="col-md-12">
									<div class="acf-map">
										<div class="marker" data-lat="59.44384549999999" data-lng="24.73950089999994"></div>
									</div>
								</div>
							</div>
							<div class="tab-country">
								<div class="col-md-12 header-grey-box">
									<h1>Switzerland</h1>
								</div>
								<div class="col-md-12 white-box">
										Text
								</div>
								<div class="col-md-12">
									<div class="acf-map">
										<div class="marker" data-lat="59.44384549999999" data-lng="24.73950089999994"></div>
									</div>
								</div>
							</div>
							<div class="tab-country">
								<div class="col-md-12 header-grey-box">
									<h1>UK</h1>
								</div>
								<div class="col-md-12 white-box">
										Text
								</div>
								<div class="col-md-12">
									<div class="acf-map">
										<div class="marker" data-lat="59.44384549999999" data-lng="24.73950089999994"></div>
									</div>
								</div>
							</div>
							<div class="tab-country">
								<div class="col-md-12 header-grey-box">
									<h1>USA</h1>
								</div>
								<div class="col-md-12 white-box">
									<div class="row">
										<div class="col-md-3">
											New York<br>
											<b>BH Photo Video</b><br>
											building 664, unit #229<br>
											Brooklyn Navy Yard<br>
											63 Flushing Ave<br>
											Brooklyn 11205 USA<br><br>
											<a href="mailto:shayef@bhphoto.com">shayef@bhphoto.com</a><br>
											Phone: <a href="tel:(212)239-7500">(212)239-7500</a>
										</div>
										<div class="col-md-3">
											New York<br>
											<b>OffHollywood</b><br>
											60 Freeman Street, Brooklyn,<br>
											NY 11 222, USA<br><br><br><br>
											<a href="mailto:ark@offhollywoodny.com">mark@offhollywoodny.com</a><br>
											Phone: <a href="tel:646-295-9070">646-295-9070</a>
										</div>
										<div class="col-md-3">
											Boston<br>
											<b>Astera Led Sales</b><br>
											Astera LED Sales<br>
											42 Elm Street Unit #4<br>
											Kingston, MA 02364<br><br><br>
											<a href="mailto:greg@asteraledsales.com">greg@asteraledsales.com</a><br>
											Phone: <a href="tel:508-927-8403">508-927-8403</a>
										</div>
										<div class="col-md-3">
											Atlanta<br>
											<b>WAVE LENGTH LIGHTING, LLC</b><br>
											Park Central Blvd<br>
											Decatur, GA 30035<br><br><br><br>
											<a href="mailto:brieanna@wavelengthlightingllc.com">brieanna@wavelengthlightingllc.com</a><br>
											Phone: <a href="tel:678-827-1223">678-827-1223</a>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											Oklahoma<br>
											<b>Oklahoma Camera Rental</b><br>
											6127 S Victor Ave<br>
											Tulsa, OK 74136<br><br><br><br>
											<a href="mailto:brieanna@wavelengthlightingllc.com">brieanna@wavelengthlightingllc.com</a><br>
											Phone: <a href="tel:678-827-1223">678-827-1223</a>
										</div>
										<div class="col-md-3">
											Los Angeles<br>
											<b>Maccam Inc.</b><br>
											building 664, unit #229<br>
											Brooklyn Navy Yard<br>
											63 Flushing Ave<br>
											Brooklyn 11205 USA<br><br>
											<a href="mailto:shayef@bhphoto.com">shayef@bhphoto.com</a><br>
											Phone: <a href="tel:(212)239-7500">(212)239-7500</a>
										</div>
										<div class="col-md-3">
											Los Angeles<br>
											<b>Hot Rod Cameras</b><br>
											722 North Mariposa<br>
											Street Burbank, CA 91506 USA<br><br><br><br>
											<a href="mailto:illya@hotrodcameras.com">illya@hotrodcameras.com</a><br>
											Phone: <a href="tel:323-230-3589">323-230-3589</a>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="acf-map">
										<div class="marker" data-lat="59.44384549999999" data-lng="24.73950089999994"></div>
									</div>
								</div>
							</div>
						</div>
</div>

<?php get_footer();
