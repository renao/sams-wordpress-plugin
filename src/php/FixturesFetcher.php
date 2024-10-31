<?php
namespace SAMSPlugin;

use SAMSPlugin\Remote\URIs\FixturesURI;
use SAMSPlugin\Remote\XMLFetcher;
use SAMSPlugin\Models\Fixtures;

class FixturesFetcher {

    public static function fetch($baseUrl, $apiKey, $matchSeriesId, $teamId) {
        $fixturesUri = new FixturesURI($baseUrl, $apiKey, $matchSeriesId, $teamId);
        $fetcher = new XMLFetcher();
        $fetchedContent = $fetcher->fetch($fixturesUri->toString());

        if (!is_wp_error($fetchedContent)) {
            $xmlContent = simplexml_load_string(wp_remote_retrieve_body($fetchedContent));
            $fixtures = new Fixtures($xmlContent);
            return $fixtures;
        } else {
            return __("SAMS Fixtures | Error loading fixtures", "sams-integration");
        }
    }
}

?>