<?php

use PHPUnit\Framework\TestCase;
use WVVPlugin\Models\FixturesEntry;
use WVVPlugin\Presenters\FixturesEntryPresenter;

final class FixturesEntryPresenterTest extends TestCase {

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
            <element><nr>1</nr><spieltag>1</spieltag><datum>23.09.2017</datum><hallenoeffnung>-</hallenoeffnung><spielbeginn>17:30</spielbeginn><heim>SG SV Werth/TuB Bocholt</heim><gast>VC Eintracht Geldern</gast><sheim>3</sheim><sgast>1</sgast><result>19:25, 25:23, 25:19, 25:14</result><halle>Langenberghalle, Bocholt</halle></element>
XML
            ));
        }
    }


?>