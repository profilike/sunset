<?php
	/*
		This is template for sidebar

		@package sunsettheme
	*/
	if( ! is_active_sidebar('sunset-sidebar') ){
		return;
	}

?>

<aside id="secondery" class="widget_area" rol="complementary">
	
	<div class="visible-xs">
	<?php 
		wp_nav_menu(array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'nav navbar-nav navbar-collapse',
			'walker'         => new Sunset_Walker_Nav_Primary
		));
	?>
	</div>

	<?php dynamic_sidebar( 'sunset-sidebar' ); ?>

</aside>