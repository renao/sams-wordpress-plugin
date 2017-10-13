<?php
namespace WVVPlugin;

use WVVPlugin\Remote\URIs\FixturesURI;
use WVVPlugin\Remote\XMLFetcher;
use WVVPlugin\Models\WVVFixtures;
use WVVPlugin\Presenters\FixturesPresenter;

class WVVFixturesRenderer {

    public static function fetchAndRender($season, $division, $club) {
        $fixturesUri = new FixturesURI($season, $division);
        $fetcher = new XMLFetcher();
        $fetchedXml = $fetcher->fetch($fixturesUri->toString());
        if (\is_a($fetchedXml, "SimpleXMLElement")) {
            $fixtures = new WVVFixtures($fetchedXml);
            return FixturesPresenter::render($fixtures, $club);
        } else {
            return "Fixtures not found (Season: $season - Division $division with Club-Filter: " . $club . ")";
        }
    }
}

?>