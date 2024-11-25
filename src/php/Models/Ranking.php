<?php

namespace SAMSPlugin\Models;

class Ranking {
    public $rankingEntries = [];

    public function __construct(\SimpleXMLElement $rankingXml) {
        foreach ($rankingXml->children() as $elementName => $elementNode) {
            if ($elementNode->getName() == "ranking") {
                array_push($this->rankingEntries, $this->createEntry($elementNode));
            }
        }
    }

    private function createEntry(\SimpleXMLElement $rankingElement) {
        return new RankingEntry($rankingElement);
    }
}

?>