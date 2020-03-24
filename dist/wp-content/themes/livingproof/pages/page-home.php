<?php

    /*
        Template Name: Home Page
    */

    get_header();

    $heroID = 183;
    $nutrition_page = 13;
    $pilates_page = 17;
    $strength_page = 15;

?>

    <!-- hero -->
    <div class="hero">

        <!-- hero__content -->
        <div class="hero__content">

            <!-- hero__nutritionist-person -->
            <article class="hero__nutritionist-person">

                <!-- hero__photo -->
                <div class="hero__photo">
                    <div class="hero__photo-ava">
                        <img src="<?= get_the_post_thumbnail_url( $heroID ); ?>" alt="<?= get_the_title( $heroID ); ?>"/>
                    </div>
                    <a href="<?php the_field('hp-link'); ?>" target="_blank" rel="nofollow" class="hero__photo-awards">
                        <?php the_field('hp-pattern'); ?>
                    </a>
                </div>
                <!-- /hero__photo -->

                <!-- hero__nutritionist-info -->
                <div class="hero__nutritionist-info">

	                <?= wpautop( get_post_field('post_content' ) ); ?>

                </div>
                <!-- /hero__nutritionist-info -->

                <a href="#" class="btn btn_1 popup__open" data-popup="biography" data-id="<?= $heroID ?>">read more</a>

            </article>
            <!-- /hero__nutritionist-person -->

            <!-- hero__about -->
            <div class="hero__about">

                <!-- hero__about-pic -->
                <div class="hero__about-pic">
                    <img src="<?= get_template_directory_uri() ?>/assets/pic/pic-001.jpg" alt="img"/>
                </div>
                <!-- /hero__about-pic -->

                <!-- hero__about-text -->
                <div class="hero__about-text">
                    <?php the_field( 'hp-hf-about' ) ?>
                </div>
                <!-- /hero__about-text -->

            </div>

        </div>
        <!-- /hero__content -->

        <div class="hero__background">
            <img src="<?= get_template_directory_uri() ?>/assets/img/hero-background.jpg" alt="background" />
            <svg viewBox="0 0 1440 878">
                <defs>
                    <path d="M79,826.459992 L79,1117.04761 L1521.63113,1117.04761 L1521.63113,242.590495 C1353.78251,226.807987 1141.10397,321.560314 883.595504,526.847478 C686.579829,683.909454 418.381327,783.780292 79,826.459992 Z" id="path-1"></path>
                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Home" transform="translate(0.000000, -385.000000)">
                        <g id="BG" transform="translate(-79.000000, 109.000000)">
                            <g id="Top-img" transform="translate(0.000000, 36.000000)">
                                <mask id="mask-2" fill="white">
                                    <use xlink:href="#path-1"></use>
                                </mask>
                                <use id="home-1" fill="#FFFFFF" xlink:href="#path-1"></use>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

    </div>
    <!-- /hero -->

    <!-- services -->
    <div class="services">

        <dl class="services__item">
            <dt class="services__topic"><?php the_field( 'hp-hf-title' ) ?></dt>
            <dd>
	            <?php the_field( 'hp-in-advantages' ) ?>

                <!-- services__content -->
                <div class="services__item-frame">

                    <!-- services__video -->
                    <a href="#" class="services__video popup__open" data-popup="video" data-video="<?php the_field( 'hp-in-video' ) ?>">
                        <img src="<?= get_template_directory_uri() ?>/assets/pic/img-001.jpg" alt="img"/>

                        <div>
                            <i>
                                <svg viewBox="0 0 512 512">
                                    <path d="M405.2,232.9L126.8,67.2c-3.4-2-6.9-3.2-10.9-3.2c-10.9,0-19.8,9-19.8,20H96v344h0.1c0,11,8.9,20,19.8,20  c4.1,0,7.5-1.4,11.2-3.4l278.1-165.5c6.6-5.5,10.8-13.8,10.8-23.1C416,246.7,411.8,238.5,405.2,232.9z"/>
                                </svg>
                            </i>
                            <p>Learn to Love
                                Eating for Health.
                                Eat to Thrive!</p>
                        </div>

                    </a>
                    <!-- /services__video -->

                    <!-- services__text -->
                    <div class="services__text">

	                    <?php the_field( 'hp-in-about' ) ?>

                        <a href="<?= get_permalink( $nutrition_page ); ?>" class="btn btn_2">learn more</a>

                    </div>
                    <!-- /services__text -->

                </div>
                <!-- /services__content -->

            </dd>
        </dl>

        <dl class="services__item">
            <dt class="services__topic"><?php the_field( 'hp-wr-title' ) ?></dt>
            <dd>
	            <?php the_field( 'hp-wr-advantages' ) ?>

                <!-- services__content -->
                <div class="services__item-frame">

                    <!-- services__video -->
                    <a href="#" class="services__video popup__open" data-popup="video" data-video="<?php the_field( 'hp-wr-video' ) ?>">
                        <img src="<?= get_template_directory_uri() ?>/assets/pic/img-002.jpg" alt="img"/>

                        <div>
                            <i>
                                <svg viewBox="0 0 512 512">
                                    <path d="M405.2,232.9L126.8,67.2c-3.4-2-6.9-3.2-10.9-3.2c-10.9,0-19.8,9-19.8,20H96v344h0.1c0,11,8.9,20,19.8,20  c4.1,0,7.5-1.4,11.2-3.4l278.1-165.5c6.6-5.5,10.8-13.8,10.8-23.1C416,246.7,411.8,238.5,405.2,232.9z"/>
                                </svg>
                            </i>
                            <p>Get stronger.
                                Be Healthier.
                                Look Younger.</p>
                        </div>

                    </a>
                    <!-- /services__video -->

                    <!-- services__text -->
                    <div class="services__text">

	                    <?php the_field( 'hp-wr-about' ) ?>

                        <a href="<?= get_permalink( $strength_page ); ?>" class="btn btn_2">learn more</a>

                    </div>
                    <!-- /services__text -->

                </div>
                <!-- /services__content -->

            </dd>
        </dl>

        <dl class="services__item">
            <dt class="services__topic"><?php the_field( 'hp-pl-title' ) ?></dt>
            <dd>
	            <?php the_field( 'hp-pl-advantages' ) ?>

                <!-- services__content -->
                <div class="services__item-frame">

                    <!-- services__video -->
                    <a href="#" class="services__video popup__open" data-popup="video" data-video="<?php the_field( 'hp-pl-video' ) ?>">
                        <img src="<?= get_template_directory_uri() ?>/assets/pic/img-003.jpg" alt="img"/>

                        <div>
                            <i>
                                <svg viewBox="0 0 512 512">
                                    <path d="M405.2,232.9L126.8,67.2c-3.4-2-6.9-3.2-10.9-3.2c-10.9,0-19.8,9-19.8,20H96v344h0.1c0,11,8.9,20,19.8,20  c4.1,0,7.5-1.4,11.2-3.4l278.1-165.5c6.6-5.5,10.8-13.8,10.8-23.1C416,246.7,411.8,238.5,405.2,232.9z"/>
                                </svg>
                            </i>
                            <p>See and feel
                                results in your
                                first session!</p>
                        </div>

                    </a>
                    <!-- /services__video -->

                    <!-- services__text -->
                    <div class="services__text">

	                    <?php the_field( 'hp-pl-about' ) ?>

                        <a href="<?= get_permalink( $pilates_page ); ?>" class="btn btn_2">learn more</a>

                    </div>
                    <!-- /services__text -->

                </div>
                <!-- /services__content -->

            </dd>
        </dl>

    </div>
    <!-- /services -->

    <!-- appointment-only -->
    <div class="appointment-only js-resize-section">

        <dl class="appointment-only__list">

            <dt class="appointment-only__list-topic"><?php the_field( 'hp-services-title' ) ?></dt>

            <dd>
	            <?php the_field( 'hp-services' ) ?>
            </dd>

        </dl>

        <!-- appointment-only__dedicated -->
        <div class="appointment-only__dedicated">

            <div class="appointment-only__dedicated-pic">
                <img src="<?= get_template_directory_uri() ?>/assets/pic/img-004.jpg" alt="img"/>
            </div>

            <div class="appointment-only__dedicated-text">
	            <?php the_field( 'hp-services-note' ) ?>
            </div>

        </div>
        <!-- /appointment-only__dedicated -->

        <div class="appointment-only__background">
            <svg viewBox="0 0 1440 635">
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
            <svg viewBox="0 0 1440 323">
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

    </div>
    <!-- /appointment-only -->

    <?php get_template_part('contents/content', 'review'); ?>

    <?php get_template_part('contents/content', 'instagram'); ?>

<?php get_footer(); ?>