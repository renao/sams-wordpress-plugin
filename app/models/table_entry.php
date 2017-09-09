<?php
class TableEntry {
    public $place;
    public $team_name;
    public $games;
    public $points;
    public $sets_pro;
    public $sets_con;
    public $balls_pro;
    public $balls_con;

    public function __construct(SimpleXMLElement $tableElement) {
        $this->readValues($tableElement);
    }

    private function readValues(SimpleXMLElement $tableElement) {
        $this->place = intval($tableElement->platz);
        $this->team_name = (string) $tableElement->team;
        $this->games = intval($tableElement->spiele);
        $this->sets_pro = intval($tableElement->plussaetze);
        $this->sets_con = intval($tableElement->minussaetze);
        $this->balls_pro = intval($tableElement->plusbaelle);
        $this->balls_con = intval($tableElement->minusbaelle);
        $this->points = intval($tableElement->dppunkte);
    }
}
?>