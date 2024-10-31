<?php
namespace SAMSPlugin;

use SAMSPlugin\Remote\URIs\RankingURI;
use SAMSPlugin\Remote\XMLFetcher;
use SAMSPlugin\Models\Ranking;

class RankingFetcher {

    public static function fetch($baseUrl, $apiKey, $matchSeriesId) {
        $rankingUri = new RankingURI($baseUrl, $apiKey, $matchSeriesId);
        $fetcher = new XMLFetcher();
        $fetchedContent = $fetcher->fetch($rankingUri->toString());
        
        if (!is_wp_error($fetchedContent)) {
            $xmlContent = simplexml_load_string(wp_remote_retrieve_body($fetchedContent));    
            $ranking = new Ranking($xmlContent);
            return $ranking;
        } else {
            return __("SAMS Ranking | Error loading ranking", "sams-integration");
        }
    }
}

?>