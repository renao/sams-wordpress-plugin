<?php

namespace SAMSPlugin\Models;

class TableEntry {
    public $place;
    public $teamName;
    public $games;
    public $points;
    public $setsPro;
    public $setsCon;
    public $ballsPro;
    public $ballsCon;

    public function __construct(\SimpleXMLElement $tableElement) {
        $this->readValues($tableElement);
    }

    private function readValues(\SimpleXMLElement $tableElement) {
        $this->place = intval($tableElement->place);
        $this->teamName = (string) ($tableElement->team->name);
        $this->games = intval($tableElement->matchesPlayed);
        $this->setsPro = intval($tableElement->setWinScore);
        $this->setsCon = intval($tableElement->setLoseScore);
        $this->ballsPro = intval($tableElement->ballWinScore);
        $this->ballsCon = intval($tableElement->ballLoseScore);
        $this->points = intval($tableElement->points);
    }
}
?>