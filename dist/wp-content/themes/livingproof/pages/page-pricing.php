<?php

    /*
        Template Name: Price Page
    */

    get_header();

?>

    <!-- hero-pricing -->
    <div class="hero-pricing js-resize-section">

        <div class="hero-pricing__layout">
            <h1 class="hero-pricing__title">Pricing</h1>
        </div>

        <div class="hero-pricing__background">
            <img src="<?= get_template_directory_uri() ?>/assets/img/hero-pricing.jpg" alt="ing"/>
            <svg viewBox="0 0 1440 697" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <path d="M0,1290.55011 L1440,1290.55011 L1440,690.154912 C1303.62272,751.725035 1158.38626,785.910806 1004.29061,792.712225 C534.283754,801.754422 385.605595,594.706575 132.975413,594.706575 C88.1855401,594.706575 43.8604023,599.337515 0,608.599396 L0,1290.55011 Z" id="path-1"></path>
                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Pricing-page" transform="translate(0.000000, -273.000000)">
                        <g id="pricing-hero-img-with-mask" transform="translate(0.000000, -321.000000)">
                            <mask id="mask-2" fill="white">
                                <use xlink:href="#path-1"></use>
                            </mask>
                            <use id="pricing-mask1" fill="#FFFFFF" xlink:href="#path-1"></use>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

    </div>
    <!-- /hero-pricing -->

    <?php

        $premium_packages = get_field( 'premium-packages' );

        if ( $premium_packages ) {

    ?>

            <!-- premium-packages -->
            <section class="premium-packages">

                <h2 class="premium-packages__title">PREMIUM PACKAGES</h2>

                <!-- premium-packages__wrap -->
                <div class="premium-packages__wrap">


                    <?php foreach ( $premium_packages as $row ) {

                        $title = $row['premium-packages-title'];
                        $price = $row['premium-packages-price'];
                        $about = $row['premium-packages-about'];
                        $icon = $row['premium-packages-icon'];

                        ?>

                    <!-- premium-packages__item -->
                    <div class="premium-packages__item">

                        <div class="premium-packages__icon">
                            <img src="<?= $icon ?>" alt="<?= $title ?>"/>
                        </div>

                        <dl>
                            <dt>
	                            <?= $title ?>
                                <span>$<?= $price ?></span>
                            </dt>
                            <dd>
	                            <?= $about ?>
                            </dd>
                        </dl>

                        <a href="#" class="btn btn_3 popup__open" data-popup="schedule"
                           data-service="<?= $title ?>">SCHEDULE NOW</a>

                    </div>
                    <!-- /premium-packages__item -->

                    <?php } ?>

                </div>
                <!-- /premium-packages__wrap -->

            </section>
            <!-- /premium-packages -->

    <?php }

        $nutrition_args = array(
            'post_type'   => 'nutrition_programs',
            'posts_per_page' => 10,
            'order'       => 'DESC',
            'fields'      => 'ids',
            'post_status' => 'publish',
            'suppress_filters' => false
        );

        $nutrition_programs = get_posts( $nutrition_args );

        if ( $nutrition_programs ) {

    ?>

    <!-- nutrition-packages -->
    <section class="nutrition-packages">

        <h2 class="nutrition-packages__title">Nutrition services</h2>

        <!-- nutrition-packages__wrap -->
        <div class="nutrition-packages__wrap">

            <ul>

	        <?php foreach ( $nutrition_programs as $row ) {

		        $title = get_the_title( $row );
		        $price = get_field( 'program_price', $row );
		        $note = get_field( 'program_note', $row );
		        $content = wpautop( get_post_field('program_advantages', $row ) );

	            ?>

                <li class="nutrition-packages__item">

                    <dl>
                        <dt><?= $title; ?>
                            <span>$<?= $price; ?>

                            <?php if ( $note ) { ?>
                                <span><?= $note ?></span>
                            <?php } ?>

                            </span>
                        </dt>

                        <dd>
	                        <?= $content; ?>
                        </dd>
                    </dl>

                    <a href="#" class="btn btn_3 popup__open" data-popup="schedule-frame">SCHEDULE NOW</a>

                </li>

	        <?php } ?>

            </ul>

        </div>
        <!-- /nutrition-packages__wrap -->

    </section>
    <!-- nutrition-packages -->

    <?php }

        $pilates_args = array(
            'post_type'   => 'pilates_programs',
            'posts_per_page' => 10,
            'order'       => 'DESC',
            'fields'      => 'ids',
            'post_status' => 'publish',
            'suppress_filters' => false
        );

        $pilates_programs = get_posts( $pilates_args );

        if ( $pilates_programs ) {

	?>

    <!-- private-programs -->
    <section class="private-programs">

        <h2 class="private-programs__title">Private pilates programs nyc</h2>

        <!-- private-programs__wrap -->
        <div class="private-programs__wrap">

            <ul>

	            <?php foreach ( $pilates_programs as $row ) {

		            $title = get_the_title( $row );
		            $price = get_field( 'program_price', $row );
		            $note = get_field( 'program_note', $row );
		            $picture = get_the_post_thumbnail_url( $row );

		            ?>

                    <li class="private-programs__item">

                        <dl>
                            <dt><?= $title; ?></dt>
                            <dd>$<?= $price; ?><span>/session</span></dd>

                            <?php if ( $note ) { ?>

                            <dd>
	                            <?= $note; ?>
                            </dd>

                            <?php } ?>
                        </dl>

                        <div class="private-programs__picture">
                            <img src="<?= $picture; ?>" alt="<?= $title; ?>"/>
                        </div>

                        <a href="#" class="btn btn_4 popup__open" data-popup="schedule" data-service="<?= $title; ?>">SCHEDULE NOW</a>

                    </li>

	            <?php } ?>

            </ul>

        </div>
        <!-- /private-programs__wrap -->

    </section>
    <!-- /private-programs -->

    <?php }

        $hist_sessions = get_field( 'hist-sessions' );

        if ( $hist_sessions ) {

	?>

    <!-- strength-services -->
    <section class="strength-services">

        <h2 class="strength-services__title">HIST Sessions</h2>

        <!-- strength-services__wrap -->
        <div class="strength-services__wrap">

            <ul class="strength-services__list">

                <?php foreach ( $hist_sessions as $row ) {

                    $title = $row['hist-sessions-title'];
                    $icon = $row['hist-sessions-icon'];

                    ?>

                <!-- strength-services__item -->
                <li class="strength-services__item">

                    <div class="strength-services__icon">
                        <img src="<?= $icon ?>" alt="<?= $title ?>"/>
                    </div>

                    <h3><?= $title ?></h3>

                </li>
                <!-- /strength-services__item -->

                <?php } ?>

            </ul>

            <a href="#" class="btn btn_3 popup__open" data-popup="schedule" data-service="HIST Sessions">SCHEDULE NOW</a>

        </div>
        <!-- /strength-services__wrap -->

    </section>
    <!-- /strength-services -->

    <?php } ?>

<?php get_template_part('contents/content', 'review'); ?>

<?php get_footer(); ?>