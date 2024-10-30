<?php
namespace SAMSPlugin;

use SAMSPlugin\Remote\URIs\FixturesURI;
use SAMSPlugin\Remote\XMLFetcher;
use SAMSPlugin\Models\Fixtures;
use SAMSPlugin\Presenters\FixturesPresenter;

class FixturesFetcher {

    public static function fetch($baseUrl, $apiKey, $matchSeriesId, $teamId) {
        $fixturesUri = new FixturesURI($baseUrl, $apiKey, $matchSeriesId, $teamId);
        $fetcher = new XMLFetcher();
        $fetchedXml = $fetcher->fetch($fixturesUri->toString());
        if (\is_a($fetchedXml, "SimpleXMLElement")) {
            $fixtures = new Fixtures($fetchedXml);
            return $fixtures;
        } else {
            return "Fixtures not found (MatchSeriesID: $matchSeriesId - TeamID: $teamId)";
        }
    }
}

?>