<?php

    /*
        Template Name: Nutrition Page
    */

    get_header();

    $nutrition_page_about = get_field( 'nutrition_page_about' );
    $nutrition_page_video = get_field( 'nutrition_page_video' );

    $about_metabolic = get_field( 'about_metabolic' );

    $title_food_therapy = get_field( 'title_food_therapy' );
    $about_food_therapy = get_field( 'about_food_therapy' );

    $about_food_therapy = get_field( 'about_food_therapy' );

    $trainer = get_field('nutrition_trainer' );

    $nutrition_programs = get_field('nutrition_programs' );
    $about_nutrition_programs = get_field('about_nutrition' );

?>

    <!-- hero-nutrition -->
    <div class="hero-nutrition js-resize-section">

        <div class="hero-nutrition__layout">
            <div class="hero-nutrition__text">
	            <?= wpautop( get_post_field('post_content' ) ); ?>
            </div>
        </div>

        <div class="hero-nutrition__background">
            <img src="<?= get_template_directory_uri() ?>/assets/img/hero-nutrition.jpg" alt="img"/>
            <svg viewBox="0 0 1440 687">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, -312.000000)" fill="#FFFFFF">
                        <g transform="translate(720.000000, 470.000000) scale(-1, 1) translate(-720.000000, -470.000000) translate(0.000000, -59.000000)">
                            <path d="M0,842.981594 L0,1057.45563 L1439.99981,1057.45563 L1439.99981,409.430724 C1334.8985,364.235587 1217.80938,359.614647 1088.73245,395.567905 C914.039787,439.938009 765.358218,700.345561 449.880396,782.76178 C298.682615,826.692876 148.722483,846.766148 0,842.981594 Z"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

    </div>
    <!-- /hero-nutrition -->

    <!-- nutrition-about -->
    <div class="nutrition-about">

        <a href="#" class="nutrition-about__video popup__open" data-popup="video" data-video="<?= $nutrition_page_video ?>">
            <img src="<?= get_template_directory_uri() ?>/assets/pic/img-045.jpg" alt="img">

            <i>
                <svg viewBox="0 0 512 512">
                    <path d="M405.2,232.9L126.8,67.2c-3.4-2-6.9-3.2-10.9-3.2c-10.9,0-19.8,9-19.8,20H96v344h0.1c0,11,8.9,20,19.8,20  c4.1,0,7.5-1.4,11.2-3.4l278.1-165.5c6.6-5.5,10.8-13.8,10.8-23.1C416,246.7,411.8,238.5,405.2,232.9z"></path>
                </svg>
            </i>
        </a>

        <?= $nutrition_page_about ?>

    </div>
    <!-- /nutrition-about -->

    <?php if ( $about_metabolic ) { ?>

    <!-- healthy metabolism -->
    <section class="healthy-metabolism js-resize-section">

        <div class="healthy-metabolism__text">

            <?= $about_metabolic ?>

        </div>

        <div class="healthy-metabolism__background">
            <svg viewBox="0 0 1440 560">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, -855.000000)" fill="#FFFFFF">
                        <g transform="translate(0.000000, 855.000000)">
                            <path d="M0,450.803207 C232.713944,523.601069 421.177145,560 565.389603,560 C781.708289,560 896.213339,473.522827 1090.08987,450.803207 C1219.34089,435.656794 1335.9776,453.797796 1440,505.226213 L1440,0 L0,0 L0,450.803207 Z"></path>
                        </g>
                    </g>
                </g>
            </svg>
            <img src="<?= get_template_directory_uri() ?>/assets/img/healthy-metabolism-background.jpg" alt="background"/>
            <svg viewBox="0 0 1440 606">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, -2013.000000)" fill="#FFFFFF">
                        <g transform="translate(0.000000, 855.000000)">
                            <path d="M0,1763.21801 L1440.43748,1763.21801 L1440.43748,1210.60293 C1327.09942,1164.22565 1210.42728,1151.44381 1090.42104,1172.25742 C910.411683,1203.47783 769.268211,1282 497.629121,1282 C316.536394,1282 150.660021,1240.79291 0,1158.37873 L0,1763.21801 Z"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

    </section>
    <!-- /healthy metabolism -->

    <?php }

    if ( $about_food_therapy ) { ?>

    <!-- food-therapy -->
    <section class="food-therapy">

        <h2><?= $title_food_therapy ?></h2>

        <!-- food-therapy__wrap -->
        <div class="food-therapy__wrap">

            <div class="food-therapy__text">

                <div>

                    <?= $about_food_therapy ?>

                </div>

                <a href="#" class="btn btn_2 popup__open" data-popup="schedule-frame"><span>SCHEDULE NOW</span></a>

            </div>

            <div class="food-therapy__picture">
                <img src="<?= get_template_directory_uri() ?>/assets/pic/img-031.jpg" alt="img"/>
            </div>

        </div>
        <!-- /food-therapy__wrap -->

    </section>
    <!-- /food-therapy -->

    <?php }

    if ( $trainer ) { ?>

    <!-- personal-trainer -->
    <section class="personal-trainer">

        <h2 class="personal-trainer__title">meet our Nutritionist</h2>

        <div class="personal-trainer__wrap">

            <ul>

                <?php foreach ( $trainer as $row ) { ?>

                <li class="personal-trainer__item">

                    <h3 class="personal-trainer__name"><?= get_the_title( $row ); ?></h3>

                    <div class="personal-trainer__post">
                        <?php
                        $position = get_field( 'posts', $row -> ID );
                        foreach ( $position as $item ) {
                            echo '<span>'. $item .'</span>';
                        } ?>
                    </div>

                    <div class="personal-trainer__photo">
                        <img src="<?= get_the_post_thumbnail_url( $row ); ?>" alt="<?= get_the_title( $row ); ?>"/>
                    </div>

                    <a href="#" class="btn btn_2 popup__open" data-popup="biography" data-id="<?= $row -> ID ?>"><span>see the Bio</span></a>

                </li>

                <?php } ?>

            </ul>

        </div>

    </section>
    <!-- /personal-trainer -->

    <?php } ?>

    <!-- nutrition-programs -->
    <section class="nutrition-programs js-resize-section">

        <div class="nutrition-programs__text">

            <?= $about_nutrition_programs ?>

        </div>

        <div class="nutrition-programs__background">
            <svg viewBox="0 0 1440 785" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, -3008.000000)" fill="#FFFFFF">
                        <g transform="translate(719.500000, 3987.500000) scale(1, -1) translate(-719.500000, -3987.500000) translate(-1.000000, 3008.000000)">
                            <path d="M1,1958.39782 L1441,1958.39782 L1441,1416.92951 C1283.24462,1383.00412 1148.72898,1327.10817 1037.45308,1249.24168 C870.539222,1132.44193 618.902046,1167.88948 439.392809,1249.24168 C319.719985,1303.47647 173.589048,1419.01642 1,1595.86151 L1,1958.39782 Z"></path>
                        </g>
                    </g>
                </g>
            </svg>
            <img src="<?= get_template_directory_uri() ?>/assets/img/nutrition-programs-background.jpg" alt="background"/>
            <svg viewBox="0 0 1440 811" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, -4156.000000)" fill="#FFFFFF">
                        <g transform="translate(719.500000, 3987.500000) scale(1, -1) translate(-719.500000, -3987.500000) translate(-1.000000, 3008.000000)">
                            <path d="M1,474 C188.092563,536.300319 330.591767,574.007705 428.49761,587.122158 C580.330867,607.460169 894.150849,558.889951 1078.91263,629.727131 C1206.55033,678.663087 1327.24612,739.019336 1441,810.795878 L1441,0.431357334 L1,0.431357334 L1,474 Z" ></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

    </section>
    <!-- /nutrition-programs -->

    <?php if ( $nutrition_programs ) { ?>

    <!-- programs -->
    <section class="programs">

        <!-- programs__catalog -->
        <ul class="programs__catalog">

        <?php foreach ( $nutrition_programs as $row ) {

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

                    <a href="#" class="btn btn_4 popup__open" data-popup="schedule-frame"><span>SCHEDULE NOW</span></a>

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

<?php get_footer(); ?>