<?php

use PHPUnit\Framework\TestCase;
use WVVPlugin\Remote\URIs\FixturesURI;

final class FixturesURITest extends TestCase {

    public function testComposeFixturesXMLURI() {

        $division = "[some_division]";
        $season = "[some_season]";
        $fixturesUri = new FixturesURI($season, $division);

        $expected 
            = "https://wvv.it4sport.de/data/vbnw/aufsteiger/public/spielplan_"
            . $season
            . "_"
            . $division
            . ".xml";
        $this->assertEquals($expected, $fixturesUri->toString());
    }

    public function testDoesNotAllowEmptySeason() {
        $this->expectException(InvalidArgumentException::class);

        new FixturesURI(null, "some division");
    }

    public function testDoesNotAllowEmptyDivision() {
        $this->expectException(InvalidArgumentException::class);

        new FixturesURI("some season", null);
    }
}

?>