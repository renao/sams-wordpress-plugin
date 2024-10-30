<?php

namespace SAMSPlugin\Tests\Remote\URIs;

use PHPUnit\Framework\TestCase;
use SAMSPlugin\Remote\URIs\RankingURI;

final class RankingURITest extends TestCase {

    public function testComposeTableXMLURI() {

        $seriesId = "[some_match_series]";
        $apiKey = "[some_season]";
        $tableUri = new RankingURI($apiKey, $seriesId);

        $expected 
            = "https://dvv.sams-server.de/xml/rankings.xhtml?apiKey="
            . $apiKey
            . "&matchSeriesId="
            . $seriesId;
        $this->assertEquals($expected, $tableUri->toString());
    }

    public function testDoesNotAllowEmptyApiKey() {
        $this->expectException(InvalidArgumentException::class);

        new RankingURI(null, "some match series");
    }

    public function testDoesNotAllowEmptyMatchSeriesId() {
        $this->expectException(InvalidArgumentException::class);

        new RankingURI("some api key", null);
    }
}

?>