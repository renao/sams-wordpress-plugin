<?php

namespace SAMSPlugin\Models;

class FixturesEntry {
    public $date;
    public $startTime;
    public $teamHome;
    public $teamAway;
    public $score;
    public $setResults;
    public $venue;

    public function __construct(\SimpleXMLElement $fixtureElement) {
        $this->readValues($fixtureElement);
    }

    public function hasResult() {
        return isset($this->score) && ($this->score != "");
    }

    private function readValues(\SimpleXMLElement $fixtureElement) {
        $this->date = (string) $fixtureElement->date;
        $this->startTime = (string) $fixtureElement->time;
        $this->teamHome = (isset($fixtureElement->team[0]->name))
            ? (string) $fixtureElement->team[0]->name
            : "";
        $this->teamAway = (isset($fixtureElement->team[1]->name))
        ? (string) $fixtureElement->team[1]->name
        : "";
        $this->venue = $this->composeLocationName($fixtureElement->location);
        $this->score = (string) $fixtureElement->results->setPoints;
    }

    private function composeLocationName($locationNode) {
        return $locationNode->name 
        . "<br>" 
        . $locationNode->street
        . "<br>"
        . $locationNode->postalCode
        . " "
        . $locationNode->city;
    }
}
?>