<?php

namespace SAMSPlugin\Models;

class FixturesEntry {
    public $matchday;
    public $date;
    public $startTime;
    public $teamHome;
    public $teamAway;
    public $scoreHome;
    public $scoreAway;
    public $setResults;
    public $venue;

    public function __construct(\SimpleXMLElement $fixtureElement) {
        $this->readValues($fixtureElement);
    }

    public function hasResult() {
        return isset($this->scoreHome)
            && isset($this->scoreAway)
            && ($this->scoreHome != 0 
                || $this->scoreAway != 0);
    }

    private function readValues(\SimpleXMLElement $fixtureElement) {
        $this->matchday = (string) $fixtureElement->number;
        $this->date = (string) $fixtureElement->date;
        $this->startTime = (string) $fixtureElement->time;
        // $this->scoreHome = intval($fixtureElement->sheim);
        // $this->scoreAway = intval($fixtureElement->sgast);
        // $this->setResults = (string) $fixtureElement->result;
        $this->venue = (string) $fixtureElement->halle;
        $this->teamHome = (string) $fixtureElement->team[0]->name;
        $this->teamAway = (string) $fixtureElement->team[1]->name;

        $this->venue = $this->composeLocationName($fixtureElement->location);
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