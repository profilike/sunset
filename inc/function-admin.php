<?php 

/**********************************************
ADMIN PAGE
*********************************************/

function sunset_add_admin_page(){

	// Generate Sunset Admin Page
	add_menu_page('Sunset Theme Options', 'Sunset', 'manage_options', 'alecadd_sunset', 'sunset_theme_create_page', 'dashicons-palmtree', 110);

	//Generate Sunset Admin Sub Pages
	add_submenu_page( 'alecadd_sunset', 'Sunset Sidebar Options', 'Sidebar', 'manage_options', 'alecadd_sunset', 'sunset_theme_create_page' );
	add_submenu_page( 'alecadd_sunset', 'Sunset Theme Options', 'Theme Options', 'manage_options', 'alecadd_sunset_theme', 'sunset_theme_support_page' );
	add_submenu_page( 'alecadd_sunset', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'alecadd_sunset_css', 'sunset_theme_settings_page' );	
	
	//Activate custom settings
	add_action( 'admin_init', 'sunset_custom_settings');

}

add_action('admin_menu', 'sunset_add_admin_page');

function sunset_custom_settings(){
	//*****************
	//Sidebar Options
	//*****************
	register_setting( 'sunset-settings-group', 'profile_picture' );
	register_setting( 'sunset-settings-group', 'first_name' );
	register_setting( 'sunset-settings-group', 'last_name' );
	register_setting( 'sunset-settings-group', 'user_description' );
	register_setting( 'sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler' );
	register_setting( 'sunset-settings-group', 'facebook_handler' );
	register_setting( 'sunset-settings-group', 'gplus_handler' );
	//$id, $title, $callback, $page
	add_settings_section( 'sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options', 'alecadd_sunset');
	//$id, $title, $callback, $page, $section, $args 
	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'sunset_sidebar_profile', 'alecadd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-name', 'Full Name', 'sunset_sidebar_name', 'alecadd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'sunset_sidebar_description', 'alecadd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'sunset_sidebar_twitter', 'alecadd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'sunset_sidebar_facebook', 'alecadd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-gplus', 'Google+ handler', 'sunset_sidebar_gplus', 'alecadd_sunset', 'sunset-sidebar-options');

	//*********************
	//Theme Support Options
	//*********************

	register_setting( 'sunset-theme-support', 'post_formats' );
	register_setting( 'sunset-theme-support', 'custom_header' );
	register_setting( 'sunset-theme-support', 'custom_background' );

	add_settings_section('sunset-theme-options', 'Theme Options', 'sunset_theme_options','alecadd_sunset_theme');

	add_settings_field('post-formats', 'Post Formats', 'sunset_post_formats', 'alecadd_sunset_theme', 'sunset-theme-options' );
	add_settings_field('custom-header', 'Custom Header', 'sunset_custom_header', 'alecadd_sunset_theme', 'sunset-theme-options' );
	add_settings_field('custom-background', 'Custom Background', 'sunset_custom_background', 'alecadd_sunset_theme', 'sunset-theme-options' );

}

//Post Formats Callback Function

function sunset_theme_options(){
	echo 'Activate and Deactivate specific Theme Support Options';
}

function sunset_post_formats(){
	$options = get_option('post_formats');
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ($formats as $format){
		$checked = ( @$options[$format] == 1 ? 'checked' : '');
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'>'.$format.'</label><br>';
	}
	echo $output;
}

function sunset_custom_header(){
	$options = get_option('custom_header');
	$checked = ( @$options == 1 ? 'checked' : '');
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'>Activate the Custom Header</label>';
}
function sunset_custom_background(){
	$options = get_option('custom_background');
	$checked = ( @$options == 1 ? 'checked' : '');
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'>Activate the Custom Background</label>';
}

// Sidebar Options Functions
function sunset_sidebar_options(){
	echo 'Customize your Sidebar Information';
}

function sunset_sidebar_profile(){
	$picture = esc_attr(get_option('profile_picture'));
	if(empty($picture)){
		echo '<input type="hidden" name="profile_picture" value="" id="profile-picture" />
				<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button" />';
	}else{
		echo '<input type="hidden" name="profile_picture" value="'.$picture.'" id="profile-picture" />
				<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button" />
		 		<input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
	}
	
}

function sunset_sidebar_name(){
	$first_name = esc_attr(get_option('first_name'));
	echo '<input type="text" name="first_name" value="'.$first_name.'" placeholder="First Name" />';
	$last_name = esc_attr(get_option('last_name'));
	echo '<input type="text" name="last_name" value="'.$last_name.'" placeholder="Last Name" />';
}
function sunset_sidebar_description(){
	$description = esc_attr(get_option('user_description'));
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" />';
	echo '<p class="description">Write something smart"</p>';
}

function sunset_sidebar_twitter(){
	$twitter = esc_attr(get_option('twitter_handler'));
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" />';
	echo '<p class="description">Input your Twitter username without @ character</p>';
}
function sunset_sidebar_facebook(){
	$facebook = esc_attr(get_option('facebook_handler'));
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function sunset_sidebar_gplus(){
	$gplus = esc_attr(get_option('gplus_handler'));
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}

//Sanitization settings
function sunset_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

//Template submenu functions
function sunset_theme_create_page(){
	require_once ( get_template_directory() . '/inc/templates/sunset-admin.php');
}

function sunset_theme_support_page(){
	require_once ( get_template_directory() . '/inc/templates/sunset-theme-support.php');
}

function sunset_theme_settings_page(){

}