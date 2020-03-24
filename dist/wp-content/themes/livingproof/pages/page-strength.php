<?php

    /*
        Template Name: Strength Page
    */

    get_header();

    $contact_page = 21;

    $trainer = get_field('strength-trainers' );

?>

    <!-- hero-strength -->
    <div class="hero-strength js-resize-section">

        <div class="hero-strength__layout">
            <h1 class="hero-strength__title">Strength</h1>
            <div class="hero-strength__text">
                <p>High Intensity Strength Training Studio, NYC</p>
            </div>
        </div>

        <div class="hero-strength__background">
            <img src="<?= get_template_directory_uri() ?>/assets/img/hero-strength.jpg" alt="img"/>
            <svg viewBox="0 0 1440 861">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, -182.000000)" fill="#FFFFFF">
                        <g transform="translate(0.000000, 30.000000)">
                            <path d="M0,1012.87384 L1440,1012.87384 L1440,248.154912 C1303.62272,309.725035 1158.38626,343.910806 1004.29061,350.712225 C534.283754,359.754422 385.605595,152.706575 132.975413,152.706575 C88.1855401,152.706575 43.8604023,157.337515 0,166.599396 L0,1012.87384 Z"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

    </div>
    <!-- /hero-strength -->

    <!-- about-us -->
    <div class="about-us about-us_2">

        <!-- about-us__goals -->
        <div class="about-us__goals">

            <dl>
                <dt><?php the_field('mtc-title') ?></dt>

                <dd>

                    <div class="about-us__goals-pic">
                        <img src="<?= get_template_directory_uri() ?>/assets/pic/img-021.jpg" alt="img"/>
                    </div>

                    <div class="about-us__goals-text">

	                    <?php the_field('mtc-about') ?>

                        <a href="<?= get_permalink( $contact_page ); ?>" class="btn btn_2"><span>Contact us</span></a>

                    </div>

                </dd>

            </dl>

            <dl>
                <dt><?php the_field('hist-title') ?></dt>

                <dd>

                    <div class="about-us__goals-pic">
                        <img src="<?= get_template_directory_uri() ?>/assets/pic/img-022.jpg" alt="img"/>
                    </div>

                    <div class="about-us__goals-text">

	                    <?php the_field('hist-about') ?>

                        <a href="#" class="btn btn_2 popup__open" data-popup="schedule" data-service="HIST Sessions"><span>SCHEDULE</span></a>

                    </div>

                </dd>

            </dl>

        </div>
        <!-- /about-us__goals -->

    </div>
    <!-- /about-us -->

    <!-- benefits -->
    <section class="benefits">

        <div class="benefits__wrap">

            <dl class="benefits__title">
                <dt><h2>The Benefits of HIST</h2></dt>
                <dd>With just 1-2 weekly 20 minute HIST sessions, these are the types of benefits you can look
                    forward to:</dd>
            </dl>

            <div class="benefits__tabs tabs">

                <dl>

                    <dt class="tabs__item benefits__item">Increased</dt>
                    <dd class="benefits__content">
	                    <?php the_field('benefits-increased') ?>
                    </dd>

                </dl>

                <dl>

                    <dt class="tabs__item benefits__item">Decreased</dt>
                    <dd class="benefits__content">
	                    <?php the_field('benefits-decreased') ?>
                    </dd>

                </dl>

            </div>

        </div>

        <img src="<?= get_template_directory_uri() ?>/assets/img/benefits-background.png" alt="img" class="benefits__background"/>

    </section>
    <!-- /benefits -->

    <!-- facility -->
    <div class="facility">

        <!-- facility__wrap -->
        <div class="facility__wrap">

            <!-- facility__title -->
            <dl class="facility__title">
                <dt><h2>OUR FACILITIES</h2></dt>
                <dd>
                    <p>Your workout will be intense, but you’ll only be here for a little while. These are hallmarks of our approach. While you’re here, however, you’ll be comfortable, and that’s also part of the efficiency equation. Your focus will be the work, without distractions.</p>
                </dd>
            </dl>
            <!-- facility__title -->

            <div class="facility__content">

                <div class="facility__tabs tabs">

                    <dl>

                        <dt class="tabs__item facility__tab-btn">Studio</dt>
                        <dd>
	                        <?php the_field('studio-about') ?>
                        </dd>

                    </dl>

                    <dl>

                        <dt class="tabs__item facility__tab-btn">Equipment</dt>
                        <dd>
	                        <?php the_field('equipment-about') ?>
                        </dd>

                    </dl>

                </div>

            </div>

        </div>
        <!-- /facility__wrap -->

        <div class="facility__background">
            <img src="<?= get_template_directory_uri() ?>/assets/img/facilities-background.jpg" alt="img" />
            <svg viewBox="0 0 1440 471">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, -2734.000000)" fill="#FFFFFF">
                        <path d="M0.562523812,3204.3543 L1441,3204.3543 L1441,2786.60293 C1327.66195,2774.81973 1210.9898,2779.33494 1090.98356,2800.14854 C910.974207,2831.36896 769.830735,2858 498.191645,2858 C317.098918,2858 151.222545,2816.79291 0.562523812,2734.37873 L0.562523812,3204.3543 Z"></path>
                    </g>
                </g>
            </svg>
        </div>

    </div>
    <!-- /facility -->

    <?php if ( $trainer ) { ?>

        <!-- personal-trainer -->
        <section class="personal-trainer">

            <h2 class="personal-trainer__title">Meet our personal trainers</h2>

            <div class="personal-trainer__wrap">

                <ul>

                    <?php foreach ( $trainer as $row ) { ?>

                        <li class="personal-trainer__item">

                            <h3 class="personal-trainer__name"><?= get_the_title( $row ); ?></h3>

                            <div class="personal-trainer__post">
                                <?php
                                $position = get_field( 'posts', $row );
                                foreach ( $position as $item ) {
                                    echo '<span>'. $item .'</span>';
                                } ?>
                            </div>

                            <div class="personal-trainer__photo">
                                <img src="<?= get_the_post_thumbnail_url( $row ); ?>" alt="<?= get_the_title( $row ); ?>"/>
                            </div>

                            <a href="#" class="btn btn_2 popup__open" data-popup="biography" data-id="<?= $row ?>"><span>see the Bio</span></a>

                        </li>

                    <?php } ?>

                </ul>

            </div>

        </section>
        <!-- /personal-trainer -->

    <?php } ?>

    <?php get_template_part('contents/content', 'instagram'); ?>

<?php get_footer(); ?>