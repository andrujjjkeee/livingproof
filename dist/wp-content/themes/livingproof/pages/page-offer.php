<?php

    /*
        Template Name: Offer Page
    */

    get_header();

    $heroID = 183;

?>

    <!-- hero-offers -->
    <div class="hero-offers js-resize-section">

        <div class="hero-offers__layout">

            <div class="hero-offers__price">NOW <span>$<?php the_field( 'offer_price' ) ?></span> <span>$<?php the_field( 'offer_old_price' ) ?></span></div>

            <div class="hero-offers__text">
	            <?= wpautop( get_post_field('post_content' ) ); ?>
            </div>

            <div class="hero-offers__expire">Offer expires in <span class="timer" data-time-out="<?php the_field( 'offer_time_out' ) ?>">00:00:00</span></div>

            <a href="#" class="btn btn_3 popup__open" data-popup="schedule-frame">SCHEDULE NOW</a>

        </div>

        <div class="hero-offers__background">
            <img src="<?= get_template_directory_uri() ?>/assets/img/hero-offers.jpg" alt="img"/>
            <svg viewBox="0 0 1439 807" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1.000000, -401.000000)" fill="#FFFFFF">
                        <g transform="translate(0.000000, -33.000000)">
                            <path d="M1,434.308199 L1,1240.35927 L1440,1240.35927 L1440,967.260816 C1260.27059,990.44763 1085.48328,973.766404 915.638076,917.217138 C776.220468,870.798617 589.124622,710.722878 413.276542,561.46016 C335.720282,495.629142 198.294769,453.245155 1,434.308199 Z"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

    </div>
    <!-- /hero-offers -->

    <!-- welcome -->
    <div class="welcome">

        <!-- welcome__photo -->
        <div class="welcome__photo">
            <div class="welcome__photo-ava">
                <img src="<?= get_the_post_thumbnail_url( $heroID ); ?>" alt="<?= get_the_title( $heroID ); ?>"/>
            </div>
            <a href="https://www.expertise.com/ny/nyc/nutritionists/" target="_blank" rel="nofollow" class="welcome__photo-awards">
                <img src="//cdn.expertise.com/award.svg" />
                <span>Best Nutritionists<br>in New York</span>
                <span>2018</span>
            </a>
        </div>
        <!-- /welcome__photo -->

        <!-- welcome__content -->
        <div class="welcome__content">

            <div class="welcome__text">
	            <?php the_field( 'lisas_greeting' ) ?>
            </div>

            <a href="#" class="btn btn_3 popup__open" data-popup="schedule-frame">SCHEDULE NOW</a>

        </div>
        <!-- /welcome__content -->

    </div>
    <!-- /welcome -->

    <!-- start -->
    <div class="start js-resize-section">

        <div class="start__text">
	        <?php the_field( 'promo_text' ) ?>
        </div>

        <div class="start__background">
            <svg viewBox="0 0 1440 635" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, -2230.000000)" fill="#FFFFFF">
                        <g transform="translate(-162.000000, 2230.000000)">
                            <g>
                                <path d="M1603.15563,281.130883 C1603.15563,281.130883 1603.15563,187.450642 1603.15563,0.0901616332 L162,0.0901616332 L162,407.048991 C353.430858,558.479871 538.240299,634.195311 716.428322,634.195311 C983.710356,634.195311 1325.58545,320.301412 1603.15563,281.130883 Z"></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            <img src="<?= get_template_directory_uri() ?>/assets/img/appointment-only-background.jpg" alt="background"/>
            <svg viewBox="0 0 1440 323" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <path d="M1603.15563,1327.86217 L1603.15563,1011.78765 C1237.41132,1123.96524 968.232839,1156.45263 795.620198,1109.24983 C536.701237,1038.44563 433.203296,987.189966 162,1011.78765 C162,1011.78765 162,1117.14583 162,1327.86217 L1603.15563,1327.86217 Z" id="path-2"></path>
                </defs>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, -3235.000000)">
                        <g transform="translate(-162.000000, 2230.000000)">
                            <g>
                                <mask fill="white">
                                    <use xlink:href="#path-2"></use>
                                </mask>
                                <use fill="#fff" xlink:href="#path-2"></use>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

        <!-- start__services -->
        <div class="start__services">

            <!-- start__services-video -->
            <a href="#" class="start__services-video popup__open" data-popup="video" data-video="<?php the_field( 'video_id' ) ?>">
                <img src="<?= get_template_directory_uri() ?>/assets/pic/img-046.jpg" alt="img"/>

                <i>
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M405.2,232.9L126.8,67.2c-3.4-2-6.9-3.2-10.9-3.2c-10.9,0-19.8,9-19.8,20H96v344h0.1c0,11,8.9,20,19.8,20  c4.1,0,7.5-1.4,11.2-3.4l278.1-165.5c6.6-5.5,10.8-13.8,10.8-23.1C416,246.7,411.8,238.5,405.2,232.9z"/>
                    </svg>
                </i>

            </a>
            <!-- /start__services-video -->

            <!-- start__services-text -->
            <div class="start__services-text">
	            <?php the_field( 'promo_service_text' ) ?>
            </div>
            <!-- /start__services-text -->

        </div>
        <!-- /start__services -->

        <a href="#" class="btn btn_3 popup__open" data-popup="schedule-frame">SCHEDULE NOW</a>

    </div>
    <!-- /start -->

    <?php get_template_part('contents/content', 'instagram'); ?>

    <?php get_template_part('contents/content', 'review'); ?>

<?php get_footer(); ?>