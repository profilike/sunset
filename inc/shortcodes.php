<?php 

/**********************************************
SHORTCODE OPTIONS
*********************************************/

function sunset_tooltip( $atts, $content = null ) {

	// [tooltip placement = "top" title="This is the title"]This is the content[/tooltip]

	// get the attributes
	$atts = shortcode_atts(
		array(
			'placement' => 'top',
			'title' => '',
		),
		$atts, 
		'tooltip'
	);
	$title = ( $atts['title'] == '' ? $content : $atts['title'] );

	return '<span class="sunset-tooltip" data-toggle="tooltip" data-placement="' . $atts['placement'] . '" title="' . $title . '">' . $content . '</span>';

}

add_shortcode( 'tooltip', 'sunset_tooltip' );


function sunset_popover( $atts, $content = null ){

	// [popover title="Popover title" placement="top" trigger="click" content="This is Popover content"]This is the clickable content[/popover]

	// get the attributes
	$atts = shortcode_atts(
		array(
			'placement' => 'top',
			'title' => '',
			'trigger' => 'click',
			'content' => '',
		),
		$atts, 
		'popover'
	);

	return '<span class="sunset-popover" data-toggle="popover" data-placement="' . $atts['placement'] . '" title="' . $atts['title'] . '" data-trigger="' . $atts['trigger'] . '" data-content="' .$atts['content']. '"  >' . $content . '</span>';

}

add_shortcode( 'popover', 'sunset_popover' );

/**********************************************
CONTACT FORM SHORTCODE
*********************************************/

function sunset_contact_form( $atts, $content = null ) {

	// [contact_form]

	// get the attributes
	$atts = shortcode_atts(
		array(),	
		$atts, 
		'contact_form'
	);
	ob_start();
	include 'templates/contact-form.php';
	return ob_get_clean();
}

add_shortcode( 'contact_form', 'sunset_contact_form' );