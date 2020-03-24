<?php

    $args = array(
        'post_type'   => 'review',
        'order'       => 'DESC',
        'fields'      => 'ids',
        'post_status' => 'publish',
        'suppress_filters' => false
    );

    $review = get_posts( $args );

    if ( $review ) { ?>

        <!-- review -->
        <div class="review">

            <h2 class="review__title">What our clients are saying</h2>

            <!-- review__wrap -->
            <div class="review__wrap">

                <div class="review__swiper swiper-container">

                    <div class="swiper-wrapper">

                        <?php foreach ( $review as $row ) { ?>

                            <div class="review__item swiper-slide">

                                <div>

                                    <div class="review__item-head">
                                        <span><?= get_the_title( $row ); ?></span>
                                        <div class="review__mark">
			                                <?php $mark = get_field( 'mark', $row );
			                                for ( $n = 0; $n < $mark; $n++  ){ ?>
                                                <svg viewBox="0 0 27 26">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g>
                                                            <polygon points="13.3699162 0.00010001885 10.3278034 9.95197556 0 10.0719982 8.44720635 16.0631273 5.36764135 26 13.6300838 19.7538228 22.0543195 25.7799585 18.7135882 15.9231009 27 9.70692938 16.6721966 9.86695954"></polygon>
                                                        </g>
                                                    </g>
                                                </svg>
			                                <?php } ?>
                                        </div>
                                    </div>

                                    <div class="review__item-content">
		                                <?= wpautop( get_post_field('post_content', $row ) ); ?>
                                    </div>

                                </div>

	                            <?php $post_item_category = get_the_terms( $row, 'reviews' ); ?>

	                            <?php if ( $post_item_category ) {
		                            foreach ( $post_item_category as $term ) { ?>

                                        <div class="review__logo">
                                            <img src="<?= the_field( 'picture', $term->taxonomy.'_'.$term->term_id ) ?>"
                                                 alt="<?= $term -> name ?>"/>
                                        </div>

		                            <?php } } ?>

                            </div>

                        <?php } ?>

                    </div>

                </div>

            </div>
            <!-- /review__wrap -->

        </div>
        <!-- /review -->

<?php } ?>