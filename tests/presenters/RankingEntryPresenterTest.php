<?php

namespace SAMSPlugin\Tests\Presenters;

use PHPUnit\Framework\TestCase;
use SAMSPlugin\Models\TableEntry;
use SAMSPlugin\Presenters\TableEntryPresenter;

final class TableEntryPresenterTest extends TestCase {

    public function testRendersTableEntryHtmlFromTemplate() {
        $entry = new TestTableEntry();

        $rendered = RankingEntryPresenter::render($entry);
        $rawTemplate = file_get_contents(__DIR__ . "/../../app/templates/__ranking_entry.html");

        $this->assertNotNull($rendered);
        $this->assertNotEquals($rawTemplate, $rendered);
    }
}

class TestTableEntry extends RankingEntry {
    
        public function __construct() {
            parent::__construct(new SimpleXMLElement(<<<XML
            <ranking>
    <team>
        <id>21416933</id>
        <uuid>9db5cbb6-22d1-4b61-8448-6c3041b28f1e</uuid>
        <name>TuS Herten</name>
        <shortName>TuS Herten</shortName>
        <clubCode>TUSH</clubCode>
        <club>
            <name>TuS Herten</name>
            <shortName>TuSH</shortName>
        </club>
    </team>
    <place>4</place>
    <matchesPlayed>5</matchesPlayed>
    <wins>0</wins>
    <losses>0</losses>
    <points>13</points>
    <setPoints>0:0</setPoints>
    <setWinScore>12</setWinScore>
    <setLoseScore>1</setLoseScore>
    <setPointDifference>0</setPointDifference>
    <setQuotient>∞</setQuotient>
    <ballPoints>0:0</ballPoints>
    <ballWinScore>225</ballWinScore>
    <ballLoseScore>100</ballLoseScore>
    <ballPointDifference>0</ballPointDifference>
    <ballQuotient>∞</ballQuotient>
    <resultTypes>
        <matchResult>
            <result>3:0</result>
            <count>0</count>
        </matchResult>
        <matchResult>
            <result>3:1</result>
            <count>0</count>
        </matchResult>
        <matchResult>
            <result>3:2</result>
            <count>0</count>
        </matchResult>
        <matchResult>
            <result>2:3</result>
            <count>0</count>
        </matchResult>
        <matchResult>
            <result>1:3</result>
            <count>0</count>
        </matchResult>
        <matchResult>
            <result>0:3</result>
            <count>0</count>
        </matchResult>
    </resultTypes>
</ranking>
XML
            ));
        }
    }


?>