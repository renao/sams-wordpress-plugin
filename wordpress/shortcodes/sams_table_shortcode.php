<?php
// namespace SAMSPlugin\Integration;

use SAMSPlugin\SAMSTableRenderer;

function fetch_and_render_sams_table( $atts ) {
    $a = shortcode_atts( array(
        'apikey' => 'asd',
        'matchseriesid' => '21416892'
    ), $atts );

    return SAMSTableRenderer::fetchAndRender($a['apikey'], $a['matchseriesid']);
}
?>