<?php
namespace SAMSPlugin;

use SAMSPlugin\Remote\URIs\FixturesURI;
use SAMSPlugin\Remote\XMLFetcher;
use SAMSPlugin\Models\SAMSFixtures;
use SAMSPlugin\Presenters\FixturesPresenter;

class SAMSFixturesRenderer {

    public static function fetchAndRender($apiKey, $matchSeriesId, $teamId) {
        $fixturesUri = new FixturesURI($apiKey, $matchSeriesId, $teamId);
        $fetcher = new XMLFetcher();
        $fetchedXml = $fetcher->fetch($fixturesUri->toString());
        if (\is_a($fetchedXml, "SimpleXMLElement")) {
            $fixtures = new SAMSFixtures($fetchedXml);
            return FixturesPresenter::render($fixtures);
        } else {
            return "Fixtures not found (MatchSeriesID: $matchSeriesId - TeamID: $teamId API-Key: " . $apiKey . ")";
        }
    }
}

?>