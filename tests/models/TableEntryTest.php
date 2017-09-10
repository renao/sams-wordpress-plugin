<?php

use PHPUnit\Framework\TestCase;
use WVVPlugin\Models\TableEntry;

final class TableEntryTest extends TestCase {

    public function testCreatesAndSetsProperties() {
        $simpleXml = new SimpleXMLElement($this->validXml);
        $entry = new TableEntry($simpleXml);

        $this->assertEquals(1, $entry->place);
        $this->assertEquals("TuS Herten Volleyball", $entry->teamName);
        $this->assertEquals(12, $entry->setsPro);
        $this->assertEquals(1, $entry->setsCon);
        $this->assertEquals(225, $entry->ballsPro);
        $this->assertEquals(100, $entry->ballsCon);
        $this->assertEquals(5, $entry->games);
        $this->assertEquals(13, $entry->points);
    }

    private $validXml = <<<XML
            <element>
                <platz>1</platz>
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
XML;
}

?>