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
	
	<?php dynamic_sidebar( 'sunset-sidebar' ); ?>

</aside>