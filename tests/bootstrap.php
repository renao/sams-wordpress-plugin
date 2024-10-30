<?php
echo "Bootstraped!";

if ( file_exists( __DIR__ . '/../lib/autoload.php' ) ) {
    require_once __DIR__ . '/../lib/autoload.php'; // Pfad zur Composer-Autoload-Datei
} else {
    throw new Exception ("Autoload-Datei nicht gefunden");
}

// WordPress-Testumgebung initialisieren
$_tests_dir = getenv('WP_TESTS_DIR');

if ( ! $_tests_dir ) {
    $_tests_dir = '/var/www/html/wp-content/plugins/wordpress-tests-lib';
}

require_once $_tests_dir . '/src/functions.php';

// Manuelles Laden des Plugins
function _manually_load_plugin() {
    require dirname( dirname( __FILE__ ) ) . '/sams-plugin.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// WordPress-Testumgebung starten
require $_tests_dir . '/src/bootstrap.php';
?>