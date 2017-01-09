<?php 

/**********************************************
	REMOVE GENERATOR VERSION NUMBER
*********************************************/

/* remove version string from js and css */
function sunset_remove_wp_version_strings( $scr ){
	global $wp_version;
	parse_str( parse_url($src, PHP_URL_QUERY), $query );
	if(!empty( $query['ver']) && $query['ver'] === $wp_version ){
		$src = remove_query_arg( 'ver', $scr);
	}
	return $scr;
}
add_filter('script_loader_scr', 'sunset_remove_wp_version_strings');
add_filter('style_loader_scr', 'sunset_remove_wp_version_strings');

/* remove metateg generator from header */
function sunset_remove_meta_version(){
	return '';
}
add_filter('the_generator', 'sunset_remove_meta_version');