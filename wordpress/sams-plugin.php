<?php
/*
Plugin Name: SAMS Plugin
*/

require_once("autoload.php");

require_once plugin_dir_path( __FILE__ ) . 'shortcodes/sams_table_shortcode.php';
require_once plugin_dir_path( __FILE__ ) . 'shortcodes/sams_fixtures_shortcode.php';
add_shortcode( 'samstable', 'fetch_and_render_sams_table' );
add_shortcode( 'samsfixtures', 'fetch_and_render_sams_fixtures');

?>