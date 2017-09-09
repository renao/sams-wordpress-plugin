<?php

use PHPUnit\Framework\TestCase;

final class TableEntryPresenterTest extends TestCase {

    public function testRendersTableEntryHtmlFromTemplate() {
        $entry = new TestTableEntry();

        $rendered = TableEntryPresenter::render($entry);
        $rawTemplate = file_get_contents(__DIR__ . "/../../app/templates/__table_entry.html");

        $this->assertNotNull($rendered);
        $this->assertNotEquals($rawTemplate, $rendered);
    }
}

class TestTableEntry extends TableEntry {
    
        public function __construct() {
            parent::__construct(new SimpleXMLElement(<<<XML
            <element>
                <platz>4</platz>
                <team>TuS Herten Volleyball</team>
                <spiele>5</spiele>
                <plussaetze>12</plussaetze>
                <minussaetze>1</minussaetze>
                <plusbaelle>225</plusbaelle>
                <minusbaelle>100</minusbaelle>
                <dppunkte>13</dppunkte>
                <dpplatz>1</dpplatz>
                <dpsiege>15</dpsiege>
                <dpniederlagen>3</dpniederlagen>
                <dpgewinn3031>14</dpgewinn3031>
                <dpgewinn30>7</dpgewinn30>
                <dpgewinn31>7</dpgewinn31>
                <dpgewinn32>1</dpgewinn32>
                <dpgewinn20>0</dpgewinn20>
                <dpgewinn21>0</dpgewinn21>
                <dpniederlage1303>2</dpniederlage1303>
                <dpniederlage03>1</dpniederlage03>
                <dpniederlage13>1</dpniederlage13>
                <dpniederlage23>1</dpniederlage23>
                <dpniederlage12>0</dpniederlage12>
                <dpniederlage02>0</dpniederlage02>
            </element>
XML
            ));
        }
    }


?>