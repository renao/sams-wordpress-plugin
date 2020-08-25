<?php

use PHPUnit\Framework\TestCase;
use SAMSPlugin\Models\FixturesEntry;

final class FixturesEntryTest extends TestCase {

    // public function testCreatesFromXmlWithResult() {
    //     $simpleXml = new SimpleXMLElement($this->withResultXml);
    //     $entry = new FixturesEntry($simpleXml);
// 
    //     $this->assertEquals(4, $entry->number);
    //     $this->assertEquals(1, $entry->matchday);
    //     $this->assertEquals("23.09.2017", $entry->date);
    //     $this->assertEquals("-", $entry->openingTime);
    //     $this->assertEquals("18:00", $entry->startTime);
    //     $this->assertEquals("TuS Herten", $entry->teamHome);
    //     $this->assertEquals("SG Langenfeld", $entry->teamAway);
    //     $this->assertEquals(3, $entry->scoreHome);
    //     $this->assertEquals(0, $entry->scoreAway);
    //     $this->assertEquals("25:22, 25:22, 25:17", $entry->setResults);
    //     $this->assertEquals("Knappenhalle, Herten", $entry->venue);
    // }

    public function testCreatesFromXmlWithoutResult() {
        $simpleXml = new SimpleXMLElement($this->withoutResultXml);
        $entry = new FixturesEntry($simpleXml);

        $this->assertEquals(1, $entry->matchday);
        $this->assertEquals("05.09.2020", $entry->date);
        $this->assertEquals("18:00", $entry->startTime);
        $this->assertEquals("TuS Herten", $entry->teamHome);
        $this->assertEquals("VV Humann Essen", $entry->teamAway);
        $this->assertEquals(0, $entry->scoreHome);
        $this->assertEquals(0, $entry->scoreAway);
        $this->assertEquals(null, $entry->setResults);
        $this->assertEquals("Knappenhalle (Paschenbergstr. 95, 45699 Herten)", $entry->venue);
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

    private $emptyElement = <<<XML
    <element/>
XML;

    private $withResultXml = <<<XML
XML;

    private $withoutResultXml = <<<XML
    <match>
    <id>22089353</id>
    <uuid>63e8b2bf-5d69-4b94-8db9-703cbb5f0d92</uuid>
    <number>1</number>
    <date>05.09.2020</date>
    <time>18:00</time>
    <delayPossible>true</delayPossible>
    <decidingMatch>false</decidingMatch>
    <indefinitelyRescheduled>false</indefinitelyRescheduled>
    <host>
        <id>21416933</id>
        <uuid>9db5cbb6-22d1-4b61-8448-6c3041b28f1e</uuid>
        <name>TuS Herten</name>
        <club>TuS Herten</club>
    </host>
    <team>
        <number>1</number>
        <id>21416933</id>
        <uuid>9db5cbb6-22d1-4b61-8448-6c3041b28f1e</uuid>
        <seasonTeamId>21416933</seasonTeamId>
        <name>TuS Herten</name>
        <shortName>TuS Herten</shortName>
        <clubCode>TUSH</clubCode>
        <club>
            <name>TuS Herten</name>
            <shortName>TuSH</shortName>
        </club>
    </team>
    <team>
        <number>2</number>
        <id>21416917</id>
        <uuid>d55a7cf8-d90a-4154-9853-53ba9c51ecc3</uuid>
        <seasonTeamId>21416917</seasonTeamId>
        <name>VV Humann Essen</name>
        <shortName>VVH Essen</shortName>
        <clubCode>VVHE</clubCode>
        <club>
            <name>VV Humann Essen</name>
            <shortName>VVHE</shortName>
        </club>
    </team>
    <matchSeries>
        <id>21416892</id>
        <uuid>d31b86a6-151d-415e-910a-f3d4bc628785</uuid>
        <allSeasonId>15f3b50c-a2ad-49f9-bc89-430d4d002204</allSeasonId>
        <name>Regionalliga West Frauen</name>
        <shortName>RLW F</shortName>
        <type>League</type>
        <updated>2020-08-18 20:46:53.441</updated>
        <structureUpdated>2020-08-09 10:33:08.627</structureUpdated>
        <resultsUpdated>2020-03-01 07:21:48.143</resultsUpdated>
        <season>
            <id>21416321</id>
            <uuid>78530bef-a391-400f-b475-473d48ee3e00</uuid>
            <name>2020/21</name>
        </season>
        <hierarchy>
            <id>21416891</id>
            <uuid>2a4e86fa-7fb3-42af-b683-dadc97be7aad</uuid>
            <name>Regionalliga West</name>
            <shortName>RL West</shortName>
            <hierarchyLevel>2</hierarchyLevel>
        </hierarchy>
        <fullHierarchy>
            <hierarchy>
                <id>21416891</id>
                <name>Regionalliga West</name>
                <shortName>RL West</shortName>
                <hierarchyLevel>2</hierarchyLevel>
            </hierarchy>
            <hierarchy>
                <id>21416611</id>
                <name>Regionalliga</name>
                <shortName>RL</shortName>
                <hierarchyLevel>1</hierarchyLevel>
            </hierarchy>
            <hierarchy>
                <id>21416610</id>
                <name>Deutscher Volleyball-Verband</name>
                <shortName>DVV</shortName>
                <hierarchyLevel>0</hierarchyLevel>
            </hierarchy>
        </fullHierarchy>
        <association>
            <name>Regionalbereich West</name>
            <shortName>RB W</shortName>
        </association>
    </matchSeries>
    <location>
        <id>15140213</id>
        <name>Knappenhalle</name>
        <street>Paschenbergstr. 95</street>
        <extraField>-</extraField>
        <postalCode>45699</postalCode>
        <city>Herten</city>
        <note>-</note>
    </location>
    <referees> </referees>
</match>
XML;
}

?>