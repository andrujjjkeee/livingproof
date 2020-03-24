<!-- site__aside -->
<aside class="site__aside">

    <section class="site__aside-item">

        <dt class="site__aside-topic">Search</dt>

	    <?php get_search_form(); ?>

    </section>

	<?php

    $args = array (
        'meta_key'          => 'post_views_count',
        'orderby'           => 'post_views_count',
        'paged'             => 1,
        'posts_per_page'    => 3,
        'order'             => 'DESC',
        'post_status'       => 'publish',
        'suppress_filters'  => true,
    );

    $populargb = get_posts( $args );

	if( $populargb ) { ?>

        <!-- site__aside-item -->
        <section class="site__aside-item">

            <h3 class="site__aside-topic">Top Articles</h3>

            <div class="blog-top-articles">

            <?php foreach ( $posts as $row ) { ?>

                <!-- blog-top-articles__item -->
                <a href="<?= get_permalink($row); ?>" class="blog-top-articles__item">

                    <!-- blog-top-articles__pic -->
                    <div class="blog-top-articles__pic">
                        <img src="<?= get_the_post_thumbnail_url($row); ?>" alt="<?= get_the_title($row); ?>"/>
                    </div>
                    <!-- /blog-recent__pic -->

                    <h3 class="blog-top-articles__topic"><?= get_the_title($row); ?></h3>
                </a>
                <!-- /blog-top-articles__item -->

			<?php } ?>

            </div>

        </section>
        <!-- /site__aside-item -->

	<?php } ?>

	<?php

	$category = get_terms( array (
		'taxonomy' => 'category',
		'hide_empty' => false,
	) );

	if( $category ) { ?>

        <!-- site__aside-item -->
        <section class="site__aside-item">

            <h3 class="site__aside-topic">Tags</h3>

            <ul class="blog-tags">

				<?php

				foreach ( $category as $row ) {
					$active = '';

					if( $row -> term_id === get_queried_object() -> term_id ) {
						$active = 'class="active"';
					}

					?>

                    <li><a href="<?= get_category_link( $row -> term_id ) ?>" <?= $active ?>>
							<?= $row -> name ?>
                        </a></li>

				<?php } ?>

            </ul>

        </section>
        <!-- /site__aside-item -->

	<?php } ?>

</aside>
<!-- /site__aside -->
