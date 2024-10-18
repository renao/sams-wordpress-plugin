<?php

namespace SAMSPlugin\Tests\Remote\URIs;

use PHPUnit\Framework\TestCase;
use SAMSPlugin\Remote\URIs\FixturesURI;

final class FixturesURITest extends TestCase {

    public function testComposeFixturesXMLURI() {

        $apiKey = "[some_api_key]";
        $matchSeriesId="[some_match_series_id]";
        $teamId = "[some_team_id]";
        $fixturesUri = new FixturesURI($apiKey, $matchSeriesId, $teamId);

        $expected
            = "https://dvv.sams-server.de/xml/matches.xhtml?apiKey="
            . $apiKey 
            . "&matchSeriesId="
            . $matchSeriesId
            . "&teamId="
            . $teamId;
            $this->assertEquals($expected, $fixturesUri->toString());
    }

    public function testDoesNotAllowEmptyApiKey() {
        $this->expectException(InvalidArgumentException::class);

        new FixturesURI(null, "some match series", "some team");
    }

    public function testDoesNotAllowEmptyMatchSeriesId() {
        $this->expectException(InvalidArgumentException::class);

        new FixturesURI("some api key", null, "some team");
    }

    public function testDoesNotAllowEmptyDivision() {
        $this->expectException(InvalidArgumentException::class);

        new FixturesURI("some api key", "some match series", null);
    }
}

?>