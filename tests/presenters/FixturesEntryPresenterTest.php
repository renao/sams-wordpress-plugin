<?php

namespace SAMSPlugin\Tests\Presenters;

use PHPUnit\Framework\TestCase;
use SAMSPlugin\Models\FixturesEntry;
use SAMSPlugin\Presenters\FixturesEntryPresenter;

class FixturesEntryPresenterTest extends TestCase {

    public function testRendersFixturesEntryHtmlFromTemplate() {
        $entry = new TestFixturesEntry();

        $rendered = FixturesEntryPresenter::render($entry);
        $rawTemplate = file_get_contents(__DIR__ . "/../../app/templates/__fixtures_entry.html");

        $this->assertNotNull($rendered);
        $this->assertNotEquals($rawTemplate, $rendered);
    }
}

class TestFixturesEntry extends FixturesEntry {
    
        public function __construct() {
            parent::__construct(new SimpleXMLElement(<<<XML
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
            
XML
            ));
        }
    }


?>