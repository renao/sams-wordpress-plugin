<?php

namespace SAMSPlugin\Shortcodes;

use SAMSPlugin\RankingRenderer;

class RankingShortcode {
    function fetch_and_render_sams_table( $atts ) {
        $a = shortcode_atts( array(
            'apikey' => 'asd',
            'matchseriesid' => '21416892'
        ), $atts );
    
        return RankingRenderer::fetchAndRender($a['apikey'], $a['matchseriesid']);
    }
}
?>