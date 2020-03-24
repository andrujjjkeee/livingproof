<?php get_header(); ?>

    <?php get_template_part( '/contents/content', 'blog-header'); ?>

    <!-- site__wrap -->
    <div class="search-result">

	    <?php
	    if ( have_posts() ) :

            get_search_form(); ?>

            <!-- blog -->
            <ul class="blog">

		   <?php while ( have_posts() ) : the_post(); ?>

               <!-- blog__item -->
               <li class="blog__item">

                   <dl class="blog__item-article">
                       <dt><a href="<?= get_permalink( $row ); ?>"><?= get_the_title($row); ?></a></dt>

                       <dd>
                           <p>By <?= get_the_title( get_field( 'post_author', $row ) ) ?> | <time datetime="<?= get_the_time('Y-m-d', $row); ?>"><?= get_the_time('M j, Y', $row); ?></time></p>

                           <p><?php the_excerpt_max_charlength( get_the_excerpt( $row ) ); ?></p>

                       </dd>

                   </dl>

                   <div>

                       <a href="<?= get_permalink( $row ); ?>" class="blog__item-picture">
                           <img src="<?= get_the_post_thumbnail_url($row); ?>" alt="<?= get_the_title($row); ?>" />
                       </a>

                       <a href="<?= get_permalink( $row ); ?>" class="btn btn_3">read more</a>

                   </div>

               </li>
               <!-- /blog__item -->

		    <?php   endwhile; ?>

            </ul>
            <!-- /blog -->

	    <?php else : ?>

            <div class="search-result__error">

                <div class="search-result__error-title">Oops!</div>

                <p>Couldn't find what you're looking for!</p>

                <div class="search-result__error-call"><span>Try again</span></div>

	            <?php get_search_form(); ?>

            </div>

	    <?php endif; ?>

    </div>
    <!-- /site__wrap -->

<?php get_footer();