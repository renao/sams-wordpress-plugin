<?php

namespace SAMSPlugin\Tests\Presenters;

use PHPUnit\Framework\TestCase;
use SAMSPlugin\Models\Fixtures;
use SAMSPlugin\Presenters\FixturesPresenter;

class FixturesPresenterTest extends TestCase {

    public function testRendersFixturesWithEntries() {
        $fixtures = new TestFixtures();

        $rendered = FixturesPresenter::render($fixtures, "TuS Herten");
        $rawTemplate = file_get_contents(__DIR__ . "/../../app/templates/fixtures.html");

        $this->assertNotNull($rendered);
        $this->assertNotEquals($rawTemplate, $rendered);
    }
}

class TestFixtures extends Fixtures {
    
        public function __construct() {
            parent::__construct(new SimpleXMLElement(<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<matches xmlns="http://sams-server.de/api/xml/ns/matches" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://sams-server.de/api/xml/ns/matches matches.xsd">
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
<match>
<id>22089503</id>
<uuid>5acf6403-3e0a-4a73-a1e3-3cdbdaa6aa4a</uuid>
<number>71</number>
<date>20.09.2020</date>
<time>17:00</time>
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
<name>TuS Herten Volleyball</name>
<shortName>TuS Herten</shortName>
<clubCode>TUSH</clubCode>
<club>
<name>TuS Herten</name>
<shortName>TuSH</shortName>
</club>
</team>
<team>
<number>2</number>
<id>21979465</id>
<uuid>0233ecfe-571b-4af3-ae21-2f4220beaef9</uuid>
<seasonTeamId>21979465</seasonTeamId>
<name>SV Wachtberg</name>
<shortName>Wachtberg</shortName>
<clubCode>SVW</clubCode>
<club>
<name>SV Wachtberg</name>
<shortName/>
</club>
</team>
<matchSeries>
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
</matches>

XML
            ));
        }
    }


?>