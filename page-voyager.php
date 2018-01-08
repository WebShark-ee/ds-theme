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
                wp_nav_menu( array( 'theme_location' => 'voyager', 'items_wrap' => '%3$s' ) );
                ?>
            </div>
        </div>
    </div>
    <div class="container bg">
        <div class="row">
            <div class="col">
                <h2 class="cyan">What is Voyager</h2>
            </div>
        </div>
        <div class="row">
            <div class="col col-50">
                <p>The Smart Light is a fixture concept which combines light source, battery, and remote controller into a single product. All you need to add is a phone or a computer as an interface. No extra software licenses and no more hardware needed.</p>
                <p>The Voyager is the next step in the Digital Sputnik product range. We have taken our DS product line and packed the full feature set into this small fixture. Then, we added batteries, an animation controller and made the package waterproof. When using current light controller boards, a technician needs to address every single light manually. With Voyager the software can autodetect fixtures on the set making this manual labor obsolete.</p>
                <p>The Devil is in the details, and we have ten finished prototypes that look and sometimes even behave like finished products. Now we need to take the final step.</p>
                <p>The last 10% of the project costs as much as the first 90% - therefore, providing a high-quality product in a timely fashion with bug-free software requires a lot of effort, and that is where you can help! Please support this endeavor so we could provide tools for your next creative project.</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="video-container">
            <iframe src="https://player.vimeo.com/video/211494254?color=ffffff&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="red">Technical specs</h2>
            </div>
        </div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/specs.jpg">
        <div class="row text-center">
            <div class="col col-50">
                <h3 class="red">Voyager 2ft</h3>
                <ul>
                    <li>Dimensions: 610x62x50mm (24"x2.5"x2")</li>
                    <li>Resolution: 39 pixels</li>
                    <li>Weight: 1.1kg (2.43lbs)</li>
                    <li>Power draw: 20W</li>
                    <li>Battery: 45Wh</li>
                    <li>List price: 390 USD</li>
                </ul>
            </div>
            <div class="col col-50">
                <h3 class="red">Voyager 4ft</h3>
                <ul>
                    <li>Dimensions: 1226x62x50mm (44"x2.5"x2")</li>
                    <li>Resolution: 83 pixels</li>
                    <li>Weight: 2.2kg (4.86lbs)</li>
                    <li>Power draw: 40W</li>
                    <li>Battery: 90Wh</li>
                    <li>List price: 590 USD</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>With the Voyager it is possible to use Your favorite diffusion filter by LEE or Rosco. There are two slots to install the filter. The first layer is inside the diffuser tube. The second layer is right over the LEDs, and the cutout strip mounts right into the groove around the LEDs.</p>
            </div>
        </div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/specs2.jpg">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/underwater.jpg">
        <div class="row">
            <div class="col">
                <h2 class="cyan">Underwater</h2>
                <p>The fixture can be used fully submerged up to 2 meters of depth for short time periods (30min). The 2-meter maximum is to keep the manufacturing cost and weight of the unit reasonable.</p>
                <p>We will provide a BTO option for an extra 150USD/2ft, 200USD/4ft per fixture to enhance the operational depth to 10 meters. These units will ship with wired control for fixed large-scale installations.</p>
            </div>
            <div class="col">
                <h2 class="yellow">Have I seen it in use?</h2>
                <p>Yes, You might have. Here is one video production that has used Voyager very early and it was then a hyper-fragile prototype. Voyager is also a great fit for social media use or stills photography.</p>
            </div>
        </div>
        <div class="gallery">
            <div class="col">
                <a class="popup-youtube" href="https://www.youtube.com/watch?v=FC0pT9xg1oI">
                    <img class="img-centered" src="<?php echo get_stylesheet_directory_uri(); ?>/img/gallery1.jpg">
                </a>
            </div>
            <div class="col">
                <a class="popup-instagram" href="<?php echo get_stylesheet_directory_uri(); ?>/img/gallery2.jpg">
                    <img class="img-centered" src="<?php echo get_stylesheet_directory_uri(); ?>/img/gallery2.jpg">
                </a>
            </div>
            <div class="col">
                <a class="popup-image" href="<?php echo get_stylesheet_directory_uri(); ?>/img/gallery3.jpg">
                    <img class="img-centered" src="<?php echo get_stylesheet_directory_uri(); ?>/img/gallery3.jpg">
                </a>
            </div>
            <div class="col collapse">
                <a class="popup-image" href="<?php echo get_stylesheet_directory_uri(); ?>/img/gallery4.jpg">
                    <img class="img-centered" src="<?php echo get_stylesheet_directory_uri(); ?>/img/gallery4.jpg">
                </a>
            </div>
            <div class="col collapse">
                <a class="popup-image" href="<?php echo get_stylesheet_directory_uri(); ?>/img/gallery5.jpg">
                    <img class="img-centered" src="<?php echo get_stylesheet_directory_uri(); ?>/img/gallery5.jpg">
                </a>
            </div>
            <div class="col">
                <a class="btn" id="wall">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/button.png">
                    <div class="arrow"></div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="cyan">What users say:</h2>
            </div>
        </div>
        <div class="row">
            <div class="separator"></div>
        </div>
        <div class="row">
            <div class="col col-50">
                <p>"The high-output Digital Sputnik LED lights have become an integral part of our lighting package. The ability to precisely mix any color within seconds without having to change gels is not only a huge timesaver; it became my on-set color-grading tool."</p>
                <p class="cyan italic">Markus Förderer, “Independence Day: Resurgence”</p>
                <p>"This I feel is one of the most flexible creative lighting tools out there. I literally try not to leave home without them! Total color and intensity control from behind the camera wirelessly - genius!"</p>
                <p class="cyan italic">Nigel Bluck, “True Detective”</p>
            </div>
            <div class="col col-50">
                <p>“The Digital Sputnik LEDs are the cornerstone of Rogue One’s aesthetic. They figure prominently in nearly every scene.”</p>
                <p class="cyan italic">Greig Fraser, “Star Wars: Rogue One"</p>
                <p>“One of my key concepts in creating an aesthetic for 'Ghost In The Shell’ was the rendering of a highly complex and original color palette. Digital Sputnik was an essential tool, both in the research and development of this concept and in its execution where they provided great precision and flexibility.”</p>
                <p class="cyan italic">Jess Hall, “Ghost in the Shell”</p>
            </div>
        </div>
        <div class="row">
            <div class="separator"></div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="green">LightGrading&trade; Software</h2>
            </div>
        </div>
        <div class="row">
            <div class="col col-25">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lightgrading.png">
            </div>
            <div class="col col-75">
                <p class="grey">LightGrading is lighting and animation via remote control at its simplest.</p>
                <ol>
                    <li><span>Position your lights in the scene.</span></li>
                    <li><span>Snap pictures of the lighting setup and your lights will be detected and mapped automatically.</span></li>
                    <li><span>Pick a color and draw on the image as with a “light brush”.</span></li>
                    <li><span>Use the timeline to give the lighting design its’ final touch. Every single light brush stroke can be animated, copied and modified on the timeline.</span></li>
                </ol>
                <p>The professional lighting industry has used light controller boards for remote operation of lights for over three decades.  Digital Sputnik has spent countless hours to come up with an interface that would provide the same flexibility with a much simpler learning curve. The software is compatible with other manufacturers’ fixtures through ArtNet, sACN and RDM protocols.</p>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <a class="last-button" href="https://igg.me/at/dsvoyager/x/16978930">check out our indiegogo campaign &gt;</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer();
