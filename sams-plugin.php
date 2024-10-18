<?php
/*
Plugin Name: SAMS Plugin
Description: Integrate rankings and fixtures from the official german volleyball service SAMS.
Author: Renão
Website: https://github.com/renao

Version: 0.2
*/
namespace SAMSPlugin;

$autoload_file_path = __DIR__ . '/lib/autoload.php';
if ( file_exists($autoload_file_path) ) {
    require_once $autoload_file_path;
} else {
    throw new Exception('Autoload file missing', $autoload_file_path);
}

use SAMSPlugin\Shortcodes\FixturesShortcode;
use SAMSPlugin\Shortcodes\RankingShortcode;

add_shortcode( 'samsfixtures', array(new FixturesShortcode(), 'fetch_and_render_sams_fixtures'));
add_shortcode( 'samstable', array(new RankingShortcode(), 'fetch_and_render_sams_table') );

?>