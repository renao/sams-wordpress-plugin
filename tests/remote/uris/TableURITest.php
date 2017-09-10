<?php

use PHPUnit\Framework\TestCase;
use WVVPlugin\Remote\URIs\TableURI;

final class TableURITest extends TestCase {

    public function testComposeTableXMLURI() {

        $division = "[some_division]";
        $season = "[some_season]";
        $tableUri = new TableURI($season, $division);

        $expected 
            = "https://wvv.it4sport.de/data/vbnw/aufsteiger/public/tabelle_"
            . $season
            . "_"
            . $division
            . ".xml";
        $this->assertEquals($expected, $tableUri->toString());
    }

    public function testDoesNotAllowEmptySeason() {
        $this->expectException(InvalidArgumentException::class);

        new TableURI(null, "some division");
    }

    public function testDoesNotAllowEmptyDivision() {
        $this->expectException(InvalidArgumentException::class);

        new TableURI("some season", null);
    }
}

?>