<?php
/*
Plugin Name: SAMS Plugin
Description: Integrate rankings and fixtures from the official german volleyball service SAMS.
Author: Renão
Website: https://github.com/renao

Version: 0.2
*/
$autoload_file_path = __DIR__ . '/vendor/autoload.php';
if ( file_exists($autoload_file_path) ) {
    require_once $autoload_file_path;
} else {
    throw new Exception('Autoload file missing', $autoload_file_path);
}



use SAMSPlugin\Shortcodes\SAMSFixtureShortcode;
use SAMSPlugin\Shortcodes\SAMSTableShortcode;

add_shortcode( 'samsfixtures', array(new SAMSFixtureShortcode(), 'fetch_and_render_sams_fixtures'));
add_shortcode( 'samstable', array(new SAMSTableShortcode(), 'fetch_and_render_sams_table') );

?>