<?php
/*
Plugin Name: SAMS Plugin
Description: Integrate rankings and fixtures from the official german volleyball service SAMS.
Author: Renão
Website: https://github.com/renao

Version: 0.2
*/

require_once __DIR__ . '/vendor/autoload.php';

use SAMSPlugin\Shortcodes\SAMSFixtureShortcode;
use SAMSPlugin\Shortcodes\SAMSTableShortcode;

add_shortcode( 'samstable', array(new SAMSTableShortcode(), 'fetch_and_render_sams_table') );
add_shortcode( 'samsfixtures', array(new SAMSFixtureShortcode(), 'fetch_and_render_sams_fixtures'));

?>