<?php

include_once "constants.php";
include_once "functions.php";
include_once TEMPLATEPATH . "/lib/helper.php";

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'dinamo', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) ) require_once($locale_file);

$preset_widgets = array (
	'primary_widget_area'  		=> array( 'search', 'pages', 'categories', 'archives' ),
	'secondary_widget_area'  	=> array( 'links', 'meta' )
);
if ( isset( $_GET['activated'] ) ) update_option( 'sidebars_widgets', $preset_widgets );

// Initialization
add_action( 'init', 'theme_widgets_init' );
add_action( 'init', 'js_libs_init');

?>
