<?php

namespace SAMSPlugin\Models;

class RankingEntry {
    public $place;
    public $teamName;
    public $games;
    public $points;
    public $setsPro;
    public $setsCon;
    public $ballsPro;
    public $ballsCon;

    public function __construct(\SimpleXMLElement $rankingElement) {
        $this->readValues($rankingElement);
    }

    private function readValues(\SimpleXMLElement $rankingElement) {
        $this->place = intval($rankingElement->place);
        $this->teamName = (string) ($rankingElement->team->name);
        $this->games = intval($rankingElement->matchesPlayed);
        $this->setsPro = intval($rankingElement->setWinScore);
        $this->setsCon = intval($rankingElement->setLoseScore);
        $this->ballsPro = intval($rankingElement->ballWinScore);
        $this->ballsCon = intval($rankingElement->ballLoseScore);
        $this->points = intval($rankingElement->points);
    }
}
?>