<?php

use PHPUnit\Framework\TestCase;
use SAMSPlugin\Remote\URIs\TableURI;

final class TableURITest extends TestCase {

    public function testComposeTableXMLURI() {

        $seriesId = "[some_match_series]";
        $apiKey = "[some_season]";
        $tableUri = new TableURI($apiKey, $seriesId);

        $expected 
            = "https://dvv.sams-server.de/xml/rankings.xhtml?apiKey="
            . $apiKey
            . "&matchSeriesId="
            . $seriesId;
        $this->assertEquals($expected, $tableUri->toString());
    }

    public function testDoesNotAllowEmptyApiKey() {
        $this->expectException(InvalidArgumentException::class);

        new TableURI(null, "some match series");
    }

    public function testDoesNotAllowEmptyMatchSeriesId() {
        $this->expectException(InvalidArgumentException::class);

        new TableURI("some api key", null);
    }
}

?>