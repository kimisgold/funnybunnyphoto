<?php

$before_widget = '<div class="widget %2$s">';
$after_widget = '</div>';
$before_title = '<h3>';
$after_title = '</h3>';

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Default Sidebar',
		'before_widget' => $before_widget,
		'after_widget' => $after_widget,
		'before_title' => $before_title,
		'after_title' => $after_title
	));
	register_sidebar(array(
		'name' => 'Home Sidebar',
		'before_widget' => $before_widget,
		'after_widget' => $after_widget,
		'before_title' => $before_title,
		'after_title' => $after_title
	));
}

if (function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'header_menu' => 'Header menu'
		)
	);
}

add_filter( 'wpcf7_form_class_attr', 'your_custom_form_class_attr' );

function your_custom_form_class_attr( $class ) {
	$class .= ' six columns offset-by-two';
	return $class;
}

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'orbit-custom', 960, 300 ); 
    }

wp_enqueue_script('modernizr.custom.40618', get_template_directory_uri() . '/js/modernizr.custom.40618.js',array(),'1.0',false);

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' )

?>