<?php

use PHPUnit\Framework\TestCase;
use WVVPlugin\Models\FixturesEntry;

final class FixturesEntryTest extends TestCase {

    public function testCreatesFromXmlWithResult() {
        $simpleXml = new SimpleXMLElement($this->withResultXml);
        $entry = new FixturesEntry($simpleXml);

        $this->assertEquals(4, $entry->number);
        $this->assertEquals(1, $entry->matchday);
        $this->assertEquals("23.09.2017", $entry->date);
        $this->assertEquals("-", $entry->openingTime);
        $this->assertEquals("18:00", $entry->startTime);
        $this->assertEquals("TuS Herten", $entry->teamHome);
        $this->assertEquals("SG Langenfeld", $entry->teamAway);
        $this->assertEquals(3, $entry->scoreHome);
        $this->assertEquals(0, $entry->scoreAway);
        $this->assertEquals("25:22, 25:22, 25:17", $entry->setResults);
        $this->assertEquals("Knappenhalle, Herten", $entry->venue);
    }

    public function testCreatesFromXmlWithoutResult() {
        $simpleXml = new SimpleXMLElement($this->withoutResultXml);
        $entry = new FixturesEntry($simpleXml);

        $this->assertEquals(10, $entry->number);
        $this->assertEquals(2, $entry->matchday);
        $this->assertEquals("-", $entry->date);
        $this->assertEquals("-", $entry->openingTime);
        $this->assertEquals("-", $entry->startTime);
        $this->assertEquals("VC Eintracht Geldern", $entry->teamHome);
        $this->assertEquals("TuS Herten", $entry->teamAway);
        $this->assertEquals(0, $entry->scoreHome);
        $this->assertEquals(0, $entry->scoreAway);
        $this->assertEquals(null, $entry->setResults);
        $this->assertEquals("Sporthalle Am Bollwerk, Geldern", $entry->venue);
    }

    public function testHasResult() {
        $entry = new FixturesEntry(new SimpleXMLElement($this->emptyElement));
        // scores not set.
        $this->assertFalse($entry->hasResult());

        // score's all zero.
        $entry->scoreHome = 0;
        $entry->scoreAway = 0;
        $this->assertFalse($entry->hasResult());

        // one score tie is zero
        $entry->scoreHome = 0;
        $entry->scoreAway = 3;
        $this->assertTrue($entry->hasResult());

        // valid score.
        $entry->scoreHome = 2;
        $entry->scoreAway = 3;
        $this->assertTrue($entry->hasResult());
    }

    public function testclubParticipates() {
        $entry = new FixturesEntry(new SimpleXMLElement($this->emptyElement));

        $lookup = "some club";
        $this->assertFalse($entry->clubParticipates($lookup));

        $entry->teamHome = "some other club";
        $entry->teamAway = "another one";

        $this->assertFalse($entry->clubParticipates($lookup));

        $entry->teamAway = $lookup;

        $this->assertTrue($entry->clubParticipates($lookup));
    }
    
    private $emptyElement = <<<XML
    <element/>
XML;

    private $withResultXml = <<<XML
    <element>
        <nr>4</nr>
        <spieltag>1</spieltag>
        <datum>23.09.2017</datum>
        <hallenoeffnung>-</hallenoeffnung>
        <spielbeginn>18:00</spielbeginn>
        <heim>TuS Herten</heim>
        <gast>SG Langenfeld</gast>
        <sheim>3</sheim>
        <sgast>0</sgast>
        <result>25:22, 25:22, 25:17</result>
        <halle>Knappenhalle, Herten</halle>
    </element>
XML;
    private $withoutResultXml = <<<XML
    <element>
        <nr>10</nr>
        <spieltag>2</spieltag>
        <datum>-</datum>
        <hallenoeffnung>-</hallenoeffnung>
        <spielbeginn>-</spielbeginn>
        <heim>VC Eintracht Geldern</heim>
        <gast>TuS Herten</gast>
        <sheim>0</sheim>
        <sgast>0</sgast>
        <result/>
        <halle>Sporthalle Am Bollwerk, Geldern</halle>
    </element>
XML;
}

?>