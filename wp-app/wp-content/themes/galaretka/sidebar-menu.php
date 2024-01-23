<?php
$menu_name = 'Menu First';
if ( $menu_items = wp_get_nav_menu_items( 'Menu First' ) ) {

	$menu_list = '<ul>';
	$count     = 0;
	$submenu   = false;

	foreach ( $menu_items as $menu_item ) {
		$link  = $menu_item->url;
		$title = $menu_item->title;
		if ( ! $menu_item->menu_item_parent ) {
			$parent_id = $menu_item->ID;
			if ( ! empty( $menu_items[ $count + 1 ] ) && $menu_items[ $count + 1 ]->menu_item_parent == $parent_id ) {
				$menu_list .= '<li class="dropdown has_child"><a href="' . $link . '" >' . $title . '</a>';
			} else {
				$menu_list .= '<li class="no_child">' . "\n";
				$menu_list .= '<a href="' . $link . '">' . $title . '</a>' . "\n";
			}

		}
		if ( $parent_id == $menu_item->menu_item_parent ) {
			if ( ! $submenu ) {
				$submenu   = true;
				$menu_list .= '<ul class="dropdown-menu">' . "\n";
			}
			$menu_list .= '<li class="item">' . "\n";
			$menu_list .= '<a href="' . $link . '">' . $title . '</a>' . "\n";
			$menu_list .= '</li>' . "\n";
			if ( empty( $menu_items[ $count + 1 ] ) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ) {
				$menu_list .= '</ul>' . "\n";
				$submenu   = false;
			}
		}
		if ( empty( $menu_items[ $count + 1 ] ) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) {
			$menu_list .= '</li>' . "\n";
			$submenu   = false;
		}
		$count ++;
	}
	$menu_list .= '</ul>';
} else {
	$menu_list = '<li>Menu "' . $menu_name . '" not defined.</li>';
}
?>

    <div id="sidebar-menu" class="sidebar">

		<?php if ( ! dynamic_sidebar( 'menu' ) ) : ?>

            <section id="menu" class="widget widget_menu">
                <h2>Menu</h2>
                <div id="menu-list">
					<?php echo $menu_list; ?>
                </div>
            </section>

		<?php endif; ?>

    </div>

<?php
