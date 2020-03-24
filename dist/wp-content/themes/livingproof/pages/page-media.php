<?php

    /*
        Template Name: Media Page
    */

    get_header();

    $args = array(
        'post_type'   => 'media',
        'order'       => 'DESC',
        'fields'      => 'ids',
        'post_status' => 'publish',
        'suppress_filters' => false
    );

    $articles = get_posts( $args );
    $video = get_field( 'media_video' );

?>

    <!-- hero-inside -->
    <div class="hero-media js-resize-section">
        <div class="hero-media__layout">
            <h1 class="hero-media__title">Media</h1>
            <div class="hero-media__text">
                <p>Articles and contributions to online media by LivingProof staff</p>
            </div>
        </div>

        <div class="hero-media__background">
            <img src="<?= get_template_directory_uri() ?>/assets/img/hero-media.jpg" alt="img"/>
            <svg viewBox="0 0 1440 1192">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, -251.000000)" fill="#FFFFFF">
                        <g transform="translate(0.000000, -141.000000)">
                            <path d="M0.000187005982,827.393658 L0.000187005982,1583.54014 L1440,1583.54014 L1440,430.166754 C1334.89869,384.971617 1217.80957,380.350677 1088.73263,416.303935 C914.039974,460.674039 765.358405,684.757624 449.880583,767.173844 C298.682802,811.10494 148.72267,831.178211 0.000187005982,827.393658 Z" transform="translate(720.000094, 987.975064) scale(-1, 1) translate(-720.000094, -987.975064) "></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

    </div>
    <!-- /hero-inside -->

    <?php if ( $video ){ ?>

    <!-- video-content -->
    <div class="video-content">
        <iframe src="https://www.youtube.com/embed/<?= $video ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <!-- /video-content -->

    <?php } ?>

    <?php if ( $articles ) { ?>

    <!-- articles -->
    <section class="articles">

        <h2 class="articles__title">Articles and contributions to online media by Living Proof staff.</h2>

        <!-- articles__wrap -->
        <div class="articles__wrap">

            <ul>

                <?php
                foreach ( $articles as $row ) {
	                $media_category = get_the_terms( $row, 'media' );
                ?>

                <li class="articles__item">

                    <?php
                    foreach ( $media_category as $rows ) { ?>
                        <span class="articles__category"><?= $rows->name; ?></span>
                    <?php } ?>

                    <div class="articles__item-wrap">

                        <h3>
                            <a href="<?php the_field( 'media-link', $row ); ?>" target="_blank" rel="nofollow">
                                <?= get_the_title( $row ); ?>
                            </a>
                        </h3>

                        <div>

                            <a href="<?php the_field( 'media-link', $row ); ?>" class="articles__picture" target="_blank" rel="nofollow">
                                <img src="<?= get_the_post_thumbnail_url( $row ); ?>" alt="<?= get_the_title( $row ); ?>"/>
                            </a>

                            <div class="articles__content">
	                            <?= wpautop( get_post_field('post_content', $row ) ); ?>
                            </div>

                        </div>

                    </div>

                    <a href="<?php the_field( 'media-link', $row ); ?>" class="btn btn_3" target="_blank" rel="nofollow">read more</a>

                </li>

                <?php } ?>

            </ul>

        </div>
        <!-- /articles__wrap -->

    </section>
    <!-- /articles -->

    <?php } ?>

    <?php get_template_part('contents/content', 'instagram'); ?>

<?php get_footer(); ?>