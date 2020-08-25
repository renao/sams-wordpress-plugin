<?php
// namespace SAMSPlugin\Integration;

use SAMSPlugin\SAMSFixturesRenderer;

function fetch_and_render_sams_fixtures( $atts ) {
    $a = shortcode_atts( array(
        'apikey' => 'asd',
        'matchseriesid' => '21416892',
        'teamid' => '21416933'
    ), $atts );
    return SAMSFixturesRenderer::fetchAndRender($a['apikey'], $a['matchseriesid'], $a['teamid']);
}
?>