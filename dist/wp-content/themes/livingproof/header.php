<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?= get_bloginfo( 'name' ) .' | '. get_bloginfo( 'description' ); ?></title>

    <meta name="keywords" content="nutritionist Midtown, NY/nutrition counseling Midtown, NY">

	<?php wp_head(); ?>

</head>
<body>

<!-- preload -->
<div class="preload">
    <div class="preload__wrap"></div>
</div>
<!-- /preload -->

<!-- site -->
<div class="site">

    <!-- site__header -->
    <header class="site__header">

        <!-- site__header-layout -->
        <div class="site__header-layout">

	        <?php get_template_part('contents/content', 'logo'); ?>

            <a href="#" id="mobile-menu-btn">
                <hr/><hr/><hr/><hr/>
            </a>

            <!-- mobile-menu -->
            <div id="mobile-menu">

                <!-- menu -->
                <nav class="menu">
                    <?php get_template_part('contents/content', 'menu'); ?>
                </nav>
                <!-- /menu -->

                <!-- header__contact -->
                <div class="header__contact">

	                <?php get_template_part('contents/content', 'contact-info'); ?>

                </div>
                <!-- /header__contact -->

                <!-- header__social -->
                <div class="header__social">

	                <?php get_template_part('contents/content', 'social'); ?>

                    <a  href="#subscribe" class="header__link anchor" data-margin="80">Get 3 free health tips a month</a>
                </div>
                <!-- /header__social -->

            </div>
            <!-- /mobile-menu -->

        </div>
        <!-- /site__header-layout -->

    </header>
    <!-- /site__header -->

    <!-- site__content -->
    <div class="site__content">