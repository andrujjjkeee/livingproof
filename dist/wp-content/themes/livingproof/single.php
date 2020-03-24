<?php

/*
	Template Name: Single Page
*/

get_header();

    $post_item_category = get_the_terms( $post->ID, 'category' );

    //Social Share Data
    $s_title = get_the_title();
    $s_text = get_the_excerpt();
    $s_image = get_the_post_thumbnail_url();
    $s_url = get_permalink();

    setPostViews( get_the_ID() );

    $authorID = get_field( 'post_author' );

    $firstImageDisplay = get_field( 'post_first_image' );

?>

	<?php get_template_part( '/contents/content', 'blog-header'); ?>

	<!-- site__wrap -->
	<div class="site__wrap">

		<!-- site__content-wrap -->
		<div class="site__content-wrap">

			<article class="blog-article">

				<h1><?= get_the_title(); ?></h1>

                <?php if ( $firstImageDisplay ) { ?>

                <img src="<?= wp_get_attachment_image_src(get_post_thumbnail_id(),'full')[0]; ?>" alt="<?= get_the_title(); ?>" />

	            <?php } ?>

				<div class="blog-article__info">By <?= get_the_title( get_field( 'post_author' ) ) ?> | <time datetime="<?= get_the_time('Y-m-d'); ?>"><?= get_the_time('F jS, Y'); ?></time></div>

				<?= wpautop( get_post_field('post_content' ) ); ?>

			</article>

			<!-- blog-article-info -->
			<div class="blog-article-info">

				<div class="social social-share">
					<a href="#" class="social__item s_google"
                       data-social='{"title": "<?= $s_title ?>", "image": "<?= $s_image ?>", "text": "<?= $s_text ?>", "url": "<?= $s_url ?>"}'>
						<svg viewBox="0 0 32 20">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g transform="translate(-160.000000, -31.000000)">
									<g>
										<path d="M179.311026,39.4521959 C179.389091,39.956471 179.42957,40.4733774 179.42957,41 C179.42957,44.5950253 177.955968,47.7479596 175.131163,49.5104936 C173.616119,50.4539448 171.83122,51 169.919104,51 C164.441044,51 160,46.5227361 160,41 C160,35.4772639 164.441044,31 169.919104,31 C172.436467,31 174.733127,31.9473377 176.482366,33.5058298 L173.865735,36.2817723 C172.798843,35.3742713 171.423546,34.8253012 169.919104,34.8253012 C166.537241,34.8253012 163.794356,37.5895841 163.794356,41 C163.794356,44.4104159 166.537241,47.1737272 169.919104,47.1737272 C171.821582,47.1737272 173.52167,46.3002332 174.645424,44.9273222 C175.046351,44.4376215 175.275728,43.9139137 175.28633,43.2813836 L169.92585,43.2813836 L169.92585,39.457054 L175.842424,39.457054 C175.84146,39.4531675 175.840496,39.4502526 175.840496,39.4463661 L175.84917,39.4521959 L179.311026,39.4521959 Z M192,39.2097746 L192,41.9225612 L188.004216,41.9225612 L188.004216,45.9509328 L185.314339,45.9509328 L185.314339,41.9225612 L181.318556,41.9225612 L181.318556,39.2097746 L185.314339,39.2097746 L185.314339,35.181403 L188.004216,35.181403 L188.004216,39.2097746 L192,39.2097746 Z"></path>
									</g>
								</g>
							</g>
						</svg>
					</a>
					<a href="#" class="social__item s_facebook"
                       data-social='{"title": "<?= $s_title ?>", "image": "<?= $s_image ?>", "text": "<?= $s_text ?>", "url": "<?= $s_url ?>"}'>
                        <svg viewBox="0 0 20 20">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g transform="translate(-268.000000, -31.000000)">
									<g >
										<path d="M286.896191,31 L269.103809,31 C268.494129,31 268,31.4941269 268,32.1038049 L268,49.8961202 C268,50.5057232 268.494129,51 269.103809,51 L278.682668,51 L278.682668,43.2549317 L276.07624,43.2549317 L276.07624,40.2365162 L278.682668,40.2365162 L278.682668,38.0105472 C278.682668,35.4273591 280.260373,34.0207385 282.564809,34.0207385 C283.668692,34.0207385 284.617384,34.1028682 284.893823,34.1395867 L284.893823,36.8392252 L283.295586,36.8399745 C282.042354,36.8399745 281.799636,37.4354896 281.799636,38.3093913 L281.799636,40.2365162 L284.788613,40.2365162 L284.399469,43.2549317 L281.799636,43.2549317 L281.799636,51 L286.896191,51 C287.505796,51 288,50.5057232 288,49.8961202 L288,32.1038049 C288,31.4941269 287.505796,31 286.896191,31"></path>
									</g>
								</g>
							</g>
						</svg>
					</a>
					<a href="#" class="social__item s_twitter"
                       data-social='{"title": "<?= $s_title ?>", "image": "<?= $s_image ?>", "text": "<?= $s_text ?>", "url": "<?= $s_url ?>"}'>
                        <svg viewBox="0 0 25 20">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g transform="translate(-312.000000, -31.000000)" fill-rule="nonzero">
									<g>
										<path d="M337,33.35 C336.089069,33.75 335.076923,34 334.064777,34.15 C335.12753,33.55 335.937247,32.55 336.291498,31.35 C335.279352,31.95 334.216599,32.35 333.052632,32.6 C332.091093,31.6 330.775304,31 329.307692,31 C326.473684,31 324.196356,33.25 324.196356,36.05 C324.196356,36.45 324.246964,36.85 324.348178,37.2 C320.097166,37 316.301619,35 313.771255,31.9 C313.366397,32.65 313.11336,33.55 313.11336,34.45 C313.11336,36.2 314.024291,37.75 315.390688,38.65 C314.530364,38.6 313.771255,38.4 313.062753,38 C313.062753,38 313.062753,38.05 313.062753,38.05 C313.062753,40.5 314.834008,42.55 317.161943,43 C316.757085,43.1 316.301619,43.2 315.795547,43.2 C315.441296,43.2 315.137652,43.15 314.834008,43.1 C315.491903,45.1 317.364372,46.55 319.591093,46.6 C317.819838,47.95 315.643725,48.75 313.214575,48.75 C312.809717,48.75 312.404858,48.75 312,48.7 C314.327935,50.2 317.010121,51 319.894737,51 C329.307692,51 334.469636,43.3 334.469636,36.6 C334.469636,36.4 334.469636,36.15 334.469636,35.95 C335.431174,35.25 336.291498,34.4 337,33.35 Z"></path>
									</g>
								</g>
							</g>
						</svg>
					</a>
				</div>

				<?php if ( $post_item_category ) { ?>

				<ul class="blog-tags">

					<?php foreach ( $post_item_category as $row ) { ?>

                        <li><a href="<?= get_category_link( $row -> term_id ) ?>" <?= $active ?>>
								<?= $row -> name ?>
                            </a></li>

					<?php } ?>

				</ul>

                <?php } ?>

			</div>
			<!-- /blog-article-info -->

			<!-- blog-author -->
			<article class="blog-author">

				<h3 class="blog-author__title"><span>About the Author:</span> <?= get_the_title( $authorID ) ?></h3>

				<!-- blog-author__photo -->
				<div class="blog-author__photo">
                    <img src="<?= get_the_post_thumbnail_url($authorID); ?>" alt="<?= get_the_title($authorID); ?>" />
				</div>
				<!-- /blog-author__photo -->

				<!-- blog-author__text -->
				<div class="blog-author__text">
					<?= wpautop( get_post_field('post_content', $authorID ) ); ?>
				</div>
				<!-- /blog-author__text -->

			</article>
			<!-- /blog-author -->

            <?php

            $category_id = '';

            if ( class_exists('WPSEO_Primary_Term' ) ){

	            $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
	            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
	            $term = get_term( $wpseo_primary_term );

	            if (is_wp_error($term)) {
		            $category_id = $post_item_category[0] -> term_id;
	            } else {
		            $category_id = $term -> term_id;
	            }
            }
            else {
	            $category_id = $post_item_category[0]->term_id;
            }

            $args = array(
                'post_type'     => 'post',
                'paged'         => 1,
                'posts_per_page'=> 3,
                'orderby'       => 'date',
                'order'         => 'DESC',
                'fields'        => 'ids',
                'post_status'   => 'publish',
                'suppress_filters' => false,
                'category'      => $category_id
            );

            $posts = get_posts( $args );

            if( $posts ) { ?>

			<!-- blog-top-articles -->
			<div class="blog-top-articles">

				<h3 class="blog-top-articles__title">Related Posts</h3>

				<div class="blog-top-articles__row">

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

			</div>
			<!-- /blog-top-articles -->

            <?php } ?>

		</div>
		<!-- /site__content-wrap -->

		<?php get_template_part( '/contents/content', 'aside'); ?>

	</div>
	<!-- /site__wrap -->

<?php get_footer(); ?>
