<?php

$instagram_switch = get_field( 'instagram_switch', 'options' );

if ( $instagram_switch == 1 ) :

require_once (TEMPLATEPATH .  '/contents/SimpleInstagram.php');

$access_token = get_field( 'instagram_token', 'options' );
$feed_url = get_field( 'instagram', 'options' );
$images_count = get_field( 'number_of_images', 'options' );

if ( !$images_count ) {
	$images_count = 15;
}

$refresh_interval = (int) get_field( 'refresh_interval' );

if ( ! $refresh_interval ) {
	$refresh_interval = 720;
}

if ( preg_match( '#instagram\.com/([^/]+)#', $feed_url, $matches ) ) {

	$feed_name = $matches[1];

	if ( ! empty( $feed_name ) ) {

		try {
			$SI = new SimpleInstagram($access_token);
			$images = $SI->get_media($images_count);
		} catch ( \Exception $e ) {
			$images = [ ];
		}

        if ( $images && count( $images ) > 0 ):

            if ( count( $images ) > $images_count ) {
                $images = array_slice( $images, 0, $images_count );
            }

            $images = array_chunk( $images, 1 );

		?>

        <!-- instagram-feed -->
        <div class="instagram-feed">

            <h2 class="instagram-feed__topic">
                Let’s connect on instagram <br/>
                <a href="<?= $feed_url ?>" rel="nofollow" target="_blank">@<?= esc_html( $feed_name ) ?></a>
                <a href="<?= $feed_url ?>" class="instagram-feed__icon" rel="nofollow" target="_blank">
                    <svg viewBox="0 0 512 512">
                        <g>
                            <path d="M505,257c0,35.8,0.1,71.6,0,107.5c-0.2,52-24.4,90.5-67.6,117.7C412.1,498,384,505,354.2,505   c-65.2,0-130.3,0.3-195.5-0.1c-45.3-0.3-84.3-16.3-115.2-49.9c-19.1-20.8-30.5-45.3-33.8-73.6c-0.7-6-0.8-11.9-0.8-17.9   c0-71.3-0.1-142.6,0-213.9C9.2,97.5,33.4,59,76.6,31.8C102.1,15.9,130.3,9,160.3,9c65,0,130-0.3,195,0.1   c45.5,0.3,84.6,16.4,115.5,50.2c18.9,20.7,30.2,45.2,33.4,73.2c1.3,11,0.7,22,0.8,32.9C505.1,196,505,226.5,505,257z M46,257   c0,36.7-0.1,73.3,0,110c0.1,25.2,9.3,46.9,26.5,64.9c23.1,24.1,51.9,35.8,85,36c65.7,0.4,131.3,0.1,197,0.1   c21.2,0,41.4-4.6,59.8-15.2c34.4-19.7,53.8-48.7,53.8-89.3c0-72.2,0-144.3,0-216.5c0-25-9.1-46.6-26.2-64.5   c-22.9-24.2-51.8-36.1-84.8-36.3C290.7,45.7,224.4,46,158,46c-20.7,0-40.3,4.9-58.3,15.1C65.4,80.9,45.9,109.9,46,150.5   C46,186,46,221.5,46,257z" />
                            <path d="M257.3,363c-64.6,0-116.4-51.6-116.3-116c0.1-62.7,52.6-114.1,116.7-114c64.4,0,116.4,51.7,116.3,115.5   C373.9,311.7,321.6,363,257.3,363z M257.3,326c43.9,0,79.7-34.9,79.7-77.8c0-43.1-35.5-78.2-79.3-78.2c-43.9,0-79.7,34.9-79.7,77.8   C178,290.9,213.5,326,257.3,326z" />
                            <path d="M363,123.6c0-14.2,10.9-25.6,24.5-25.6c13.6,0,24.5,11.5,24.5,25.6c0,13.9-10.9,25.3-24.3,25.4   C374.1,149.1,363,137.8,363,123.6z" />
                        </g>
                    </svg>
                </a>
            </h2>

            <div class="instagram-feed__swiper swiper-container">

                <div class="swiper-wrapper">

					<?php foreach ( $images as $slide ) { ?>

                        <a href="<?php echo esc_url( $slide[0]->link ) ?>"
                           class="instagram-feed__slide swiper-slide"
                           target="_blank"
                           title="<?php echo esc_attr( $slide[0]->caption ) ?>">
                            <img src="<?=esc_url( $slide[0]->imageLowResolutionUrl)?>" alt="<?php echo esc_attr( $slide[0]->caption ) ?>"/>
                        </a>

					<?php } ?>

                </div>

            </div>

        </div>
        <!-- /instagram-feed -->

	<?php endif; } };

endif;