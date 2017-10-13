<?php
// namespace WVVPlugin\Integration;

use WVVPlugin\WVVFixturesRenderer;

function fetch_and_render_wvv_fixtures( $atts ) {
    $a = shortcode_atts( array(
        'season' => '2017',
        'division' => '201797',
        'club' => 'TuS Herten'
    ), $atts );

    return WVVFixturesRenderer::fetchAndRender($a['season'], $a['division'], $a['club']);
}
?>