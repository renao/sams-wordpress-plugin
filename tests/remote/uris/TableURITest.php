<?php

use PHPUnit\Framework\TestCase;

final class TableURITest extends TestCase {

    public function testComposeTableXMLURI() {

        $division = "[some_division]";
        $season = "[some_season]";
        $table_uri = new TableURI($season, $division);

        $expected 
            = "https://wvv.it4sport.de/data/vbnw/aufsteiger/public/tabelle_"
            . $season
            . "_"
            . $division
            . ".xml";
        $this->assertEquals($expected, $table_uri->to_string());
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