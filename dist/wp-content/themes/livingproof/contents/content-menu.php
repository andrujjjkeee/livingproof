<ul>

	<?php

	$locations = get_nav_menu_locations();
	$menu_items = wp_get_nav_menu_items( $locations[ 'menu' ] );

	foreach ( (array)$menu_items as $key => $menu_item ) {

		if( $post -> ID == $menu_item -> object_id ){
			$active = 'class="active"';
		} else {
			$active = '';
		} ?>

    <li <?php echo $active; ?>>

        <a href="<?= $menu_item->url; ?>" class="menu__item"><?= $menu_item->title; ?></a>

    </li>

	<?php }; ?>

</ul>