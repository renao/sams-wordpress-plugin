<?php
// namespace SAMSPlugin\Integration;

use SAMSPlugin\SAMSTableRenderer;

function fetch_and_render_sams_table( $atts ) {
    $a = shortcode_atts( array(
        'apiKey' => '',
        'matchSeriesId' => '21416892'
    ), $atts );

    return SAMSTableRenderer::fetchAndRender($a['apiKey'], $a['matchSeriesId']);
}
?>