<?php
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
add_filter('xmlrpc_enabled', '__return_false');

add_filter('the_content', 'do_shortcode');
add_filter('wpcf7_form_elements', 'do_shortcode');
add_filter( 'the_content', 'wpautop' );

// Добавляем превью-картинки
if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );

// Register Menu
register_nav_menus( array( 'menu' => 'menu' ) );

// Functions Area
function add_files() {

	// scripts
	wp_deregister_script('jquery');

	wp_register_script('jquery', get_template_directory_uri() . '/assets/js/vendors/jquery-3.3.1.min.js',false, false, true);
	wp_register_script('swiper-js', get_template_directory_uri() . '/assets/js/vendors/swiper.jquery.min.js',false, false, true);
	wp_register_script('main-script', get_template_directory_uri() . '/assets/js/common.min.js', false, false, true);

	// styles
	wp_register_style('preload', get_template_directory_uri() . '/assets/css/preload.css' );
	wp_register_style('main-styles', get_template_directory_uri() . '/assets/css/common.css' );
	wp_register_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper.min.css' );

	// enqueue
	wp_enqueue_style( 'preload' );

	wp_enqueue_script('jquery');

	if (!is_home()){
		wp_enqueue_style( 'swiper-css' );
		wp_enqueue_script('swiper-js');
	}

	wp_enqueue_style( 'main-styles' );

	if (is_front_page()){
		wp_enqueue_style('index-style', get_template_directory_uri() . '/assets/css/index.css' );
	};

	if (is_home() || is_single() || is_search() || is_category() ){
		wp_enqueue_style('blog-style', get_template_directory_uri() . '/assets/css/blog-page.css' );
	};

	if ( is_single() ){
		wp_enqueue_script('social_share', get_template_directory_uri() . '/assets/js/vendors/socialShare.js',false, false, true);
	};

	if (is_page_template('pages/page-nutrition.php')){
		wp_enqueue_style('strength-style', get_template_directory_uri() . '/assets/css/nutrition-page.css' );
	};

	if (is_page_template('pages/page-strength.php')){
		wp_enqueue_style('strength-style', get_template_directory_uri() . '/assets/css/strength-page.css' );
	};

	if (is_page_template('pages/page-pilates.php')){
		wp_enqueue_style('pilates-style', get_template_directory_uri() . '/assets/css/pilates-page.css' );
	};

	if (is_page_template('pages/page-pricing.php')){
		wp_enqueue_style('pricing-style', get_template_directory_uri() . '/assets/css/pricing-page.css' );
	};

	if (is_page_template('pages/page-contacts.php')){
		wp_enqueue_style('contact-style', get_template_directory_uri() . '/assets/css/contact-page.css' );
		wp_enqueue_script('google_map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key='. get_field( 'map-key', 'options' ) .'&signed_in=false',false, false, true );
	};

	if (is_page_template('pages/page-media.php')){
		wp_enqueue_style('media-style', get_template_directory_uri() . '/assets/css/media-page.css' );
	};

	if (is_page_template('pages/page-offer.php')){
		wp_enqueue_style('offer-style', get_template_directory_uri() . '/assets/css/offer-page.css' );
	};

	wp_enqueue_script('main-script');

}

add_action( 'wp_enqueue_scripts', 'add_files' );

// Custom Logo
add_theme_support( 'custom-logo' );

function add_logo() {

	$logo_img = '';

	if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
		$logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
			'class'    => 'custom-logo',
			'itemprop' => 'logo',
		) );
	}

	echo $logo_img;

};

// Format Phone
function format_phone( $country, $phone ) {
	$function = 'format_phone_' . $country;

	if( function_exists( $function ) ) {
		return $function( $phone );
	}

	return $phone;
}

function format_phone_us( $phone ) {

	if(!isset($phone{3})) { return ''; }

	$phone = preg_replace("/[^0-9]/", "", $phone);

	$length = strlen($phone);

	switch($length) {
		case 7:
			return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
			break;
		case 10:
			return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
			break;
		case 11:
			return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2) $3-$4", $phone);
			break;
		default:
			return $phone;
			break;
	}

}

// Format Phone
function the_excerpt_max_charlength( $text ) {

	$charlength = 75;

	$subex = mb_substr( $text, 0, $charlength - 5 );
	$exwords = explode( ' ', $subex );
	$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
	if ( $excut < 0 ) {
		echo mb_substr( $subex, 0, $excut );
	} else {
		echo $subex;
	}

}

// Add GoogleMap KEY
function my_acf_init() {
	$key = get_field( 'map-key', 'options' );
	acf_update_setting('google_api_key', $key );
}

add_action( 'acf/init', 'my_acf_init' );

// Most Viewed Posts
function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0";
	}
	return $count;
}

function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

add_filter('manage_posts_columns', 'posts_column_views');

add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);

function posts_column_views($defaults){
	$defaults['post_views'] = __('Views');
	return $defaults;
}

function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
		echo getPostViews(get_the_ID());
	}
}