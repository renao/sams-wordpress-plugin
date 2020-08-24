<?php

use PHPUnit\Framework\TestCase;
use WVVPlugin\Presenters\FixturesPresenter;
use WVVPlugin\Models\WVVFixtures;

final class FixturesPresenterTest extends TestCase {

    public function testRendersFixturesWithEntries() {
        $fixtures = new TestFixtures();

        $rendered = FixturesPresenter::render($fixtures, "TuS Herten");
        $rawTemplate = file_get_contents(__DIR__ . "/../../app/templates/fixtures.html");

        $this->assertNull($rendered);
        $this->assertNotEquals($rawTemplate, $rendered);
    }
}

class TestFixtures extends WVVFixtures {
    
        public function __construct() {
            parent::__construct(new SimpleXMLElement(<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<spiele><element><nr>10</nr><spieltag>2</spieltag><datum>-</datum><hallenoeffnung>-</hallenoeffnung><spielbeginn>-</spielbeginn><heim>VC Eintracht Geldern</heim><gast>TuS Herten</gast><sheim>0</sheim><sgast>0</sgast><result/><halle>Sporthalle Am Bollwerk, Geldern</halle></element><element><nr>1</nr><spieltag>1</spieltag><datum>23.09.2017</datum><hallenoeffnung>-</hallenoeffnung><spielbeginn>17:30</spielbeginn><heim>SG SV Werth/TuB Bocholt</heim><gast>VC Eintracht Geldern</gast><sheim>3</sheim><sgast>1</sgast><result>19:25, 25:23, 25:19, 25:14</result><halle>Langenberghalle, Bocholt</halle></element><element><nr>3</nr><spieltag>1</spieltag><datum>23.09.2017</datum><hallenoeffnung>-</hallenoeffnung><spielbeginn>16:00</spielbeginn><heim>FCJ Köln II</heim><gast>USC Münster II</gast><sheim>1</sheim><sgast>3</sgast><result>9:25, 25:23, 23:25, 23:25</result><halle>Sportzentrum Weiden, Köln</halle></element></spiele>
XML
            ));
        }
    }


?>