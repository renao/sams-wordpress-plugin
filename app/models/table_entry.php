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

    public function __construct(DOMNodeList $xml_nodes) {
        $this->InitMap();

        foreach ($xml_nodes as $node) {
            $this->map_if_needed($node);
        }
    }

    private function map_if_needed(DOMElement $element) {
        $nodeName = $element->tagName;

        switch($element->tagName) {
            case "platz":
                $this->place = $element->nodeValue;
                break;
            case "team":
                $this->team_name = $element->nodeValue;
                break;
            case "spiele":
                $this->games = $element->nodeValue;
                break;
            case "plussaetze":
                $this->sets_pro = $element->nodeValue;
                break;
            case "minussaetze":
                $this->sets_con = $element->nodeValue;
                break;
            case "plusbaelle":
                $this->balls_pro = $element->nodeValue;
                break;
            case "minusbaelle":
                $this->balls_con = $element->nodeValue;
                break;
            case "dppunkte":
                $this->points = $element->nodeValue;
                break;
        }
    }

    private $XmlPropertyMap;

    private function InitMap() {
        $this->XmlPropertyMap = [
            "platz" => $this->place,
            "team" => $this->team_name
        ];
    }
}
?>