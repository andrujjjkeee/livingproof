<?php

	// logo
	add_action( 'login_head', 'my_custom_login_logo' );

	function my_custom_login_logo(){
	echo '<style type="text/css">
		h1 a { background-image:url( '.get_bloginfo('template_directory').'/assets/img/logo.svg) !important;
    	height: 52px !important; width: 170px !important; background-size: 100% !important; }
		</style>';
}

	// delete from admin panel
	add_action( 'admin_menu', 'remove_menus' );

	function remove_menus(){

		remove_menu_page( 'edit-comments.php' );

	}

	// Register Options
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Site Settings',
			'menu_title'	=> 'Site Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'redirect' => true,
			'post_id' => 'options'
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Contact Information',
			'menu_title'	=> 'Contact Information',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Social',
			'menu_title'	=> 'Social',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Subscribe Description',
			'menu_title'	=> 'Subscribe Description',
			'parent_slug'	=> 'theme-general-settings',
		));

	}

	// Register Custom Post Type
	add_action('init', 'custom_post_type', 0);

	function custom_post_type() {

		/* reviews posts  */
		$review_labels = array(
			'name' => 'Reviews',
			'singular_name' => 'Reviews',
			'menu_name' => 'Reviews',
			'all_items' => 'All Reviews',
			'add_new_item' => 'Add Review',
			'add_new' => 'Add Review',
			'edit_item' => 'Edit',
			'update_item' => 'Update',
			'search_items' => 'Search'
		);
		$review_args = array(
			'labels' => $review_labels,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'menu_icon'   => 'dashicons-format-status',
			'rewrite' => array(
				'with_front' => true
			)
		);
		register_post_type('review', $review_args);

		/* reviews taxonomy  */
		function create_taxonomy_reviews_category() {
			register_taxonomy(
				'reviews',
				array('review'),
				array(
					'label' => __( 'Review\'s category' ),
					'public' => true,
					'show_ui'=>true,
					'hierarchical' => true,
					'query_var' => true,
					'rewrite' => array(
						'with_front' => true
					)
				)
			);
		};
		add_action( 'init', 'create_taxonomy_reviews_category' );

		/* staff posts  */
		$staff_labels = array(
			'name' => 'Staff',
			'singular_name' => 'Staff',
			'menu_name' => 'Staff',
			'all_items' => 'All Personal',
			'add_new_item' => 'Add Person',
			'add_new' => 'Add Person',
			'edit_item' => 'Edit',
			'update_item' => 'Update',
			'search_items' => 'Search'
		);
		$staff_args = array(
			'labels' => $staff_labels,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'menu_icon'   => 'dashicons-businessman',
			'rewrite' => array(
				'with_front' => true
			)
		);
		register_post_type('staff', $staff_args);

		/* media posts  */
		$media_labels = array(
			'name' => 'Media',
			'singular_name' => 'Media',
			'menu_name' => 'Media',
			'all_items' => 'All Articles',
			'add_new_item' => 'Add Article',
			'add_new' => 'Add Article',
			'edit_item' => 'Edit',
			'update_item' => 'Update',
			'search_items' => 'Search'
		);
		$media_args = array(
			'labels' => $media_labels,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'menu_icon'   => 'dashicons-admin-site',
			'rewrite' => array(
				'with_front' => true
			)
		);
		register_post_type('media', $media_args);

		/* media taxonomy  */
		function create_taxonomy_media_category() {
			register_taxonomy(
				'media',
				array('media'),
				array(
					'label' => __( 'Review\'s media' ),
					'public' => true,
					'show_ui'=>true,
					'hierarchical' => true,
					'query_var' => true,
					'rewrite' => array(
						'with_front' => true
					)
				)
			);
		};
		add_action( 'init', 'create_taxonomy_media_category' );

		/* media programs  */
		$nutrition_programs_labels = array(
			'name' => 'Nutrition Programs',
			'singular_name' => 'Nutrition Programs',
			'menu_name' => 'Nutrition Programs',
			'all_items' => 'All Programs',
			'add_new_item' => 'Add Program',
			'add_new' => 'Add Program',
			'edit_item' => 'Edit',
			'update_item' => 'Update',
			'search_items' => 'Search'
		);
		$nutrition_programs_args = array(
			'labels' => $nutrition_programs_labels,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'menu_icon'   => 'dashicons-tag',
			'rewrite' => array(
				'with_front' => true
			)
		);
		register_post_type('nutrition_programs', $nutrition_programs_args);

		/* pilates programs  */
		$pilates_programs_labels = array(
			'name' => 'Pilates Programs',
			'singular_name' => 'Pilates Programs',
			'menu_name' => 'Pilates Programs',
			'all_items' => 'All Programs',
			'add_new_item' => 'Add Program',
			'add_new' => 'Add Program',
			'edit_item' => 'Edit',
			'update_item' => 'Update',
			'search_items' => 'Search'
		);
		$pilates_programs_args = array(
			'labels' => $pilates_programs_labels,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'menu_icon'   => 'dashicons-tag',
			'rewrite' => array(
				'with_front' => true
			)
		);
		register_post_type('pilates_programs', $pilates_programs_args);

	}

	// delete content
	function remove_content_editor() {
		if( 15 == get_the_ID() ) {
			remove_post_type_support('page', 'editor');
		}
		if( 19 == get_the_ID() ) {
			remove_post_type_support('page', 'editor');
		}
		if( 23 == get_the_ID() ) {
			remove_post_type_support('page', 'editor');
		}
	}

	add_action( 'admin_head', 'remove_content_editor');

    // Prevent Update Plugins
    add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

    function filter_plugin_updates( $update ) {
        global $DISABLE_UPDATE;

        if( !is_array($DISABLE_UPDATE) || count($DISABLE_UPDATE) == 0 ){  return $update;  }

        foreach( $update->response as $name => $val ){
            foreach( $DISABLE_UPDATE as $plugin ){
                if( stripos($name,$plugin) !== false ){
                    unset( $update->response[ $name ] );
                }
            }
        }

        return $update;
    }