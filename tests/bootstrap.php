<?php
// WP_TESTS_PHPUNIT_POLYFILLS_PATH definieren
if ( file_exists( __DIR__ . '/../vendor/autoload.php' ) ) {
    require_once __DIR__ . '/../vendor/autoload.php'; // Pfad zur Composer-Autoload-Datei
}

// WP_TESTS_PHPUNIT_POLYFILLS_PATH definieren
define( 'WP_TESTS_PHPUNIT_POLYFILLS_PATH', __DIR__ . '/../vendor/yoast/phpunit-polyfills/autoload.php' );


// WordPress-Testumgebung initialisieren
$_tests_dir = getenv('WP_TESTS_DIR');

if ( ! $_tests_dir ) {
    $_tests_dir = '/var/www/html/wp-content/plugins/wordpress-tests-lib';
}

require_once $_tests_dir . '/includes/functions.php';

// Manuelles Laden des Plugins
function _manually_load_plugin() {
    require dirname( dirname( __FILE__ ) ) . '/sams-plugin.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// WordPress-Testumgebung starten
require $_tests_dir . '/includes/bootstrap.php';
?>