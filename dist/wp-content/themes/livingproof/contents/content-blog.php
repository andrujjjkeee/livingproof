<?php get_template_part( '/contents/content', 'blog-header'); ?>

<!-- site__wrap -->
<div class="site__wrap">

    <!-- site__content-wrap -->
    <div class="site__content-wrap">

        <!-- blog -->
        <ul class="blog">

	        <?php foreach ( $posts as $post ) {

		        $postID = $post->ID;

	            $title = $post -> post_title;
	            $image = get_the_post_thumbnail_url( $postID );
	            $permalink = get_permalink( $postID );
	            $excerpt = get_field( 'post_preview_text', $postID );
	            $author = get_the_title( get_field( 'post_author', $postID ) );

	            ?>

                <!-- blog__item -->
                <li class="blog__item">

                    <dl class="blog__item-article">
                        <dt><a href="<?= $permalink ?>"><?= $title ?></a></dt>

                        <dd>
                            <?php if ( $author ) { ?>
                            <p>By <?= $author ?> | <?php } ?> <time datetime="<?= get_the_time('Y-m-d', $postID ); ?>"><?=get_the_time('F jS, Y', $postID ); ?></time></p>

                            <p><?php the_excerpt_max_charlength( $excerpt ); ?></p>

                        </dd>

                    </dl>

                    <div>

	                    <?php if ( $image ) { ?>
                        <a href="<?= $permalink ?>" class="blog__item-picture">
                            <img src="<?= $image ?>" alt="<?= $title ?>" />
                        </a>
	                    <?php } ?>

                        <a href="<?= $permalink ?>" class="btn btn_3">read more</a>

                    </div>

                </li>
                <!-- /blog__item -->

	        <?php } ?>

        </ul>
        <!-- /blog -->

        <?= get_the_posts_pagination() ?>

    </div>
    <!-- /site__content-wrap -->

	<?php get_template_part( '/contents/content', 'aside'); ?>

</div>
<!-- /site__wrap -->