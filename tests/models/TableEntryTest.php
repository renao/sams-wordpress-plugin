<?php

use PHPUnit\Framework\TestCase;

final class TableEntryTest extends TestCase {

    public function testCreatesAndSetsProperties() {
        $entry_xml = new DOMDocument();
        $entry_xml->appendChild(new DOMElement("platz", 1));
        $entry_xml->appendChild(new DOMElement("team", "TuS Herten Volleyball"));
        $entry_xml->appendChild(new DOMElement("spiele", 5));
        $entry_xml->appendChild(new DOMElement("plussaetze", 12));
        $entry_xml->appendChild(new DOMElement("minussaetze", 1));
        $entry_xml->appendChild(new DOMElement("plusbaelle", 225));
        $entry_xml->appendChild(new DOMElement("minusbaelle", 100));
        $entry_xml->appendChild(new DOMElement("dppunkte", 13));

        $entry = new TableEntry($entry_xml->childNodes);

        $this->assertEquals(1, $entry->place);
        $this->assertEquals("TuS Herten Volleyball", $entry->team_name);
        $this->assertEquals(12, $entry->sets_pro);
        $this->assertEquals(1, $entry->sets_con);
        $this->assertEquals(225, $entry->balls_pro);
        $this->assertEquals(100, $entry->balls_con);
        $this->assertEquals(5, $entry->games);
        $this->assertEquals(13, $entry->points);
    }
}

?>