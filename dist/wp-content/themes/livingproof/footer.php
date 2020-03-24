
        <!-- subscribe -->
        <div class="subscribe" id="subscribe">

            <!-- subscribe__wrap -->
            <div class="subscribe__wrap">

                <!-- subscribe__text -->
                <div class="subscribe__text">
                    <?php the_field( 'subscribe_description', 'options' ) ?>
                </div>
                <!-- /subscribe__text -->

                <?= do_shortcode( '[contact-form-7 id="4" title="Monthly Newsletter"]' ) ?>
                <div class="preload-wrap">
                    <div class="preload__wrap"></div>
                </div>
            </div>
            <!-- /subscribe__wrap -->

        </div>
        <!-- /subscribe -->

    </div>
    <!-- /site__content -->

    <!-- site__footer -->
    <footer class="site__footer">

        <!-- site__footer-layout -->
        <div class="site__footer-layout">

	        <?php get_template_part('contents/content', 'logo'); ?>

            <!-- footer__address -->
            <address class="footer__address">
                <a href="https://www.google.com.ua/maps/place/<?php the_field( 'address', 'options' ) ?>" target="_blank" rel="nofollow">
                    <?php the_field( 'address', 'options' ) ?>
                </a></address>
            <!-- /footer__address -->

            <!-- footer__contact -->
            <div class="footer__contact">
	            <?php get_template_part('contents/content', 'contact-info'); ?>
            </div>
            <!-- /footer__contact -->

            <!-- footer__social -->
            <div class="footer__social">
	            <?php get_template_part('contents/content', 'social'); ?>
            </div>
            <!-- /footer__social -->

        </div>
        <!-- /site__footer-layout -->

    </footer>
    <!-- /site__footer -->

        <!-- popup -->
        <div class="popup is-loading" data-action="<?php echo admin_url( 'admin-ajax.php' );?>">

            <!-- popup__wrap -->
            <div class="popup__wrap">

                <!-- popup__content -->
                <div class="popup__content popup__video popup_video">

                    <div class="preload__wrap"></div>

                    <span class="popup__close"></span>

                </div>
                <!-- /popup__content -->

		        <?php if( !is_page_template('pages/page-offer.php') ){ ?>

                    <!-- popup__content -->
                    <div class="popup__content popup__biography popup_biography">

                        <div class="preload__wrap"></div>

                        <span class="popup__close"></span>

                        <div class="popup__biography-content"></div>

                    </div>
                    <!-- /popup__content -->

                    <!-- popup__content -->
                    <div class="popup__content popup__schedule popup_schedule">

                        <span class="popup__close"></span>

                        <!-- popup__schedule-content -->
                        <div class="popup__schedule-content">

                            <div class="popup__schedule-title">Schedule a Consultation <br/> or Program</div>

                            <div class="popup__schedule-text">
                                <p>If you are ready to schedule a program or consultation, just fill out the form and include the name of the program in the subject box.</p>
                                <p>If not, perhaps you have additional questions not answered here on our site, or a unique set of circumstances you’d like to discuss with one of our staff? Please contact us with any and all inquiries.</p>
                            </div>

					        <?= do_shortcode( '[contact-form-7 id="396" title="Schedule Form"]' ) ?>

                            <div class="preload-wrap">
                                <div class="preload__wrap"></div>
                            </div>

                        </div>
                        <!-- /popup__schedule-content -->

                    </div>
                    <!-- /popup__content -->

		        <?php } ?>

                <!-- popup__content -->
                <div class="popup__content popup__schedule-frame popup_schedule-frame">

                    <span class="popup__close"></span>

                    <!-- popup__schedule-content -->
                    <div class="popup__schedule-frame-content">

                        <iframe src="https://app.acuityscheduling.com/schedule.php?owner=14735150" scrolling="yes" rel="nofollow"></iframe>

                    </div>
                    <!-- /popup__schedule-content -->

                </div>
                <!-- /popup__content -->

                <!-- popup__content -->
                <div class="popup__content popup__success popup_success-newsletter">

                    <span class="popup__close"></span>

                    <div class="popup__success-content">

                        <h3 class="popup__success-title">Thank you!</h3>

                        <p>You can now look forward to receiving our newsletter on the first of every month.</p>

                        <a href="#" class="btn btn_1 popup__cancel">CLOSE</a>

                    </div>

                </div>
                <!-- /popup__content -->

                <!-- popup__content -->
                <div class="popup__content popup__success popup_success">

                    <span class="popup__close"></span>

                    <div class="popup__success-content">

                        <h3 class="popup__success-title">Thank you!</h3>

                        <p>One of our associates will respond to you shortly.</p>

                        <a href="#" class="btn btn_1 popup__cancel">CLOSE</a>

                    </div>

                </div>
                <!-- /popup__content -->

            </div>
            <!-- /popup__wrap -->

        </div>
        <!-- /popup -->

    </div>

    <?php wp_footer(); ?>

</body>
</html>