<?php
class TableEntry {
    public $place;
    public $teamName;
    public $games;
    public $points;
    public $setsPro;
    public $setsCon;
    public $ballsPro;
    public $ballsCon;

    public function __construct(SimpleXMLElement $tableElement) {
        $this->readValues($tableElement);
    }

    private function readValues(SimpleXMLElement $tableElement) {
        $this->place = intval($tableElement->platz);
        $this->teamName = (string) $tableElement->team;
        $this->games = intval($tableElement->spiele);
        $this->setsPro = intval($tableElement->plussaetze);
        $this->setsCon = intval($tableElement->minussaetze);
        $this->ballsPro = intval($tableElement->plusbaelle);
        $this->ballsCon = intval($tableElement->minusbaelle);
        $this->points = intval($tableElement->dppunkte);
    }
}
?>