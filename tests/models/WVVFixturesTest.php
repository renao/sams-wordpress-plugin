<?php

use PHPUnit\Framework\TestCase;
use WVVPlugin\Models\WVVFixtures;

final class WVVFixturesTest extends TestCase {

    public function testCreateAndFillEntries() {
        $fixturesXml = new SimpleXmlElement($this->validXml);
        $fixtures = new WVVFixtures($fixturesXml);

        $this->assertEquals(2, count($fixtures->fixturesEntries));
        $this->assertEquals("VC Eintracht Geldern", $fixtures->fixturesEntries[0]->teamHome);
        $this->assertEquals("SG SV Werth/TuB Bocholt", $fixtures->fixturesEntries[1]->teamHome);
    }

    private $validXml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<spiele>
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
    <element>
        <nr>1</nr>
        <spieltag>1</spieltag>
        <datum>23.09.2017</datum>
        <hallenoeffnung>-</hallenoeffnung>
        <spielbeginn>17:30</spielbeginn>
        <heim>SG SV Werth/TuB Bocholt</heim>
        <gast>VC Eintracht Geldern</gast>
        <sheim>3</sheim>
        <sgast>1</sgast>
        <result>19:25, 25:23, 25:19, 25:14</result>
        <halle>Langenberghalle, Bocholt</halle>
    </element>
</spiele>
XML;
}

?>