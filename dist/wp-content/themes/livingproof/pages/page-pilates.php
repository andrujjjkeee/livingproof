<?php

    /*
        Template Name: Pilates Page
    */

    get_header();

    $pilates_title = get_field( 'pilates_title' );
    $pilates_about = get_field( 'pilates_about' );

    $pilates_video = get_field( 'pilates_video' );

    $pilates_partners = get_field( 'pilates_partners' );

    $our_studio = get_field( 'our_studio' );

    $pilates_program = get_field( 'pilates_program' );

    $trainer = get_field('pilates_instructors' );

    $contact_page = 21;

?>

    <!-- hero-pilates -->
    <div class="hero-pilates js-resize-section">
        <div class="hero-pilates__layout">
            <h1 class="hero-pilates__title">Pilates</h1>
        </div>

        <div class="hero-pilates__background">
            <img src="<?= get_template_directory_uri() ?>/assets/img/hero-pilates.jpg" alt="img"/>
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
    <!-- /hero-pilates -->

    <!-- about-pilates -->
    <div class="about-pilates">

        <!-- about-pilates__content -->
        <div class="about-pilates__content">

	        <?= wpautop( get_post_field('post_content' ) ); ?>

        </div>
        <!-- /about-pilates__content -->

        <!-- about-pilates__video -->
        <a href="#" class="about-pilates__video popup__open" data-popup="video" data-video="<?= $pilates_video ?>">
            <img src="<?= get_template_directory_uri() ?>/assets/pic/img-047.jpg" alt="img"/>

            <i>
                <svg viewBox="0 0 512 512">
                    <path d="M405.2,232.9L126.8,67.2c-3.4-2-6.9-3.2-10.9-3.2c-10.9,0-19.8,9-19.8,20H96v344h0.1c0,11,8.9,20,19.8,20  c4.1,0,7.5-1.4,11.2-3.4l278.1-165.5c6.6-5.5,10.8-13.8,10.8-23.1C416,246.7,411.8,238.5,405.2,232.9z"/>
                </svg>
            </i>
        </a>
        <!-- /about-pilates__video -->

    </div>
    <!-- /about-pilates -->

    <!-- pilates-advantage -->
    <section class="pilates-advantage">

        <dl>
            <dt><h2><?= $pilates_title ?></h2></dt>

            <dd>

                <div class="pilates-advantage__pic">
                    <img src="<?= get_template_directory_uri() ?>/assets/pic/img-030.jpg" alt="img"/>
                </div>

                <div class="pilates-advantage__text">

	                <?= $pilates_about ?>

                    <a href="<?= get_permalink( $contact_page ); ?>" class="btn btn_2"><span>Contact us</span></a>

                </div>

            </dd>

        </dl>

    </section>
    <!-- /pilates-advantage -->

    <!-- pilates-partners -->
    <section class="pilates-partners">

        <!-- pilates-partners__wrap -->
        <div class="pilates-partners__wrap">

            <?= $pilates_partners ?>

        </div>
        <!-- /pilates-partners__wrap -->

        <img src="<?= get_template_directory_uri() ?>/assets/img/pilates-partners-background.png" alt="img" class="pilates-partners__background">

    </section>
    <!-- /pilates-partners -->

    <!-- our-studio -->
    <section class="our-studio js-resize-section">

        <div class="our-studio__content">

	        <?= $our_studio ?>

        </div>

        <div class="our-studio__background">
            <img src="<?= get_template_directory_uri() ?>/assets/img/facilities-background.jpg" alt="img">
            <svg viewBox="0 0 1440 641" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, -2381.000000)" fill="#FFFFFF">
                        <g transform="translate(-1.000000, 1810.000000)">
                            <path d="M1,1211.23352 L1441.43748,1211.23352 C1441.14721,784.547518 1441.00139,571.204527 1441,571.204548 C1272.29552,573.784131 1100.31748,596.476242 925,639.280883 C636.333333,709.760294 328.333333,698.79808 1,606.39424 L1,1211.23352 Z"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

    </section>
    <!-- /our-studio -->

    <?php if ( $pilates_program ) { ?>

    <!-- programs -->
    <section class="programs">

        <h2 class="programs__title">Private pilates programs nyc</h2>

        <!-- programs__catalog -->
        <ul class="programs__catalog">

	        <?php foreach ( $pilates_program as $row ) {

		        $title = get_the_title( $row );
		        $price = get_field( 'program_price', $row );
		        $note = get_field( 'program_note', $row );
		        $content = wpautop( get_post_field('post_content', $row ) );

		        ?>

                <!-- programs__item -->
                <li class="programs__item">

                    <!-- programs__item-info -->
                    <div class="programs__info">

                        <h3 class="programs__topic"><?= $title; ?></h3>
                        <div class="programs__price">$<?= $price; ?></div>

				        <?php if ( $note ) { ?>

                            <div class="programs__text">
						        <?= $note; ?>
                            </div>

				        <?php } ?>

                        <a href="#" class="btn btn_4 popup__open" data-popup="schedule" data-service="<?= $title; ?>"><span>SCHEDULE NOW</span></a>

                    </div>
                    <!-- /programs__item-info -->

                    <!-- programs__item-info -->
                    <div class="programs__content">
				        <?= $content; ?>
                    </div>

                </li>
                <!-- /programs__item -->

	        <?php } ?>

        </ul>
        <!-- /programs__catalog -->

    </section>
    <!-- /programs -->

    <?php } ?>

    <?php if ( $trainer ) { ?>

    <!-- personal-trainer -->
    <section class="personal-trainer">

        <h2 class="personal-trainer__title">Meet our Pilates Instructors</h2>

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