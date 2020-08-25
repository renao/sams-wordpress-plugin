<?php
// namespace SAMSPlugin\Integration;

use SAMSPlugin\SAMSFixturesRenderer;

function fetch_and_render_sams_fixtures( $atts ) {
    $a = shortcode_atts( array(
        'apiKey' => '',
        'matchSeriesId' => '21416892',
        'teamId' => '21416933'
    ), $atts );

    return SAMSFixturesRenderer::fetchAndRender($a['apiKey'], $a['matchSeriesId'], $a['teamId']);
}
?>