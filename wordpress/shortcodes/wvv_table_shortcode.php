<?php
// namespace WVVPlugin\Integration;

use WVVPlugin\WVVTableRenderer;

function fetch_and_render_wvv_table( $atts ) {
    $a = shortcode_atts( array(
        'season' => '2017',
        'division' => '201797',
    ), $atts );

    return WVVTableRenderer::fetchAndRender($a['season'], $a['division']);
}
?>