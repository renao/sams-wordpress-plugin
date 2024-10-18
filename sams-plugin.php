<?php
/*
Plugin Name:    SAMS Plugin
Plugin URI:     https://github.com/renao/sams-wordpress-plugin
Description:    Integrate rankings and fixtures from the official german volleyball results service SAMS.
Author:         René Siemer
Authors URI:    https://github.com/renao
License:        GPLv3
License URI:    https://www.gnu.org/licenses/gpl-3.0.html
Text Domain:    sams-plugin
Version:        0.2.0

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