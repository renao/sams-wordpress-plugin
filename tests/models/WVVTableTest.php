<?php

use PHPUnit\Framework\TestCase;

final class WVVTableTest extends TestCase {

    public function testCreateAndFillTable() {
        $tableXml = new SimpleXmlElement($this->validXml);
        $table = new WVVTable($tableXml);

        $this->assertEquals(2, count($table->tableEntries));
        $this->assertEquals("SG Mondorf", $table->tableEntries[0]->teamName);
        $this->assertEquals("TVA Fischenich II", $table->tableEntries[1]->teamName);
    }

    private $validXml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
    <tabellen>
        <element>
            <platz>1</platz>
            <team>SG Mondorf</team>
            <spiele>18</spiele>
            <plussaetze>48</plussaetze>
            <minussaetze>18</minussaetze>
            <plusbaelle>1542</plusbaelle>
            <minusbaelle>1368</minusbaelle>
            <dppunkte>45</dppunkte>
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
        <element>
            <platz>2</platz>
            <team>TVA Fischenich II</team>
            <spiele>18</spiele>
            <plussaetze>49</plussaetze>
            <minussaetze>22</minussaetze>
            <plusbaelle>1620</plusbaelle>
            <minusbaelle>1454</minusbaelle>
            <dppunkte>44</dppunkte>
            <dpplatz>2</dpplatz>
            <dpsiege>15</dpsiege>
            <dpniederlagen>3</dpniederlagen>
            <dpgewinn3031>13</dpgewinn3031>
            <dpgewinn30>4</dpgewinn30>
            <dpgewinn31>9</dpgewinn31>
            <dpgewinn32>2</dpgewinn32>
            <dpgewinn20>0</dpgewinn20>
            <dpgewinn21>0</dpgewinn21>
            <dpniederlage1303>2</dpniederlage1303>
            <dpniederlage03>0</dpniederlage03>
            <dpniederlage13>2</dpniederlage13>
            <dpniederlage23>1</dpniederlage23>
            <dpniederlage12>0</dpniederlage12>
            <dpniederlage02>0</dpniederlage02>
        </element>
    </tabellen>
XML;
}

?>