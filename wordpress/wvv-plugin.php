<?php
/*
Plugin Name: WVV Plugin
*/

require_once("autoload.php");

require_once plugin_dir_path( __FILE__ ) . 'shortcodes/wvv_table_shortcode.php';
require_once plugin_dir_path( __FILE__ ) . 'shortcodes/wvv_fixtures_shortcode.php';
add_shortcode( 'wvvtable', 'fetch_and_render_wvv_table' );
add_shortcode( 'wvvfixtures', 'fetch_and_render_wvv_fixtures');

?>