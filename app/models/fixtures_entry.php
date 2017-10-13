<?php

namespace WVVPlugin\Models;

class FixturesEntry {
    public $number;
    public $matchday;
    public $date;
    public $openingTime;
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
        return $this->scoreHome != 0 && $this->scoreAway != 0;
    }

    public function clubParticipates(string $clubname) {
        return $this->teamHome == $clubname || $this->teamAway == $clubname;
    }

    private function readValues(\SimpleXMLElement $fixtureElement) {
        $this->number = intval($fixtureElement->nr);
        $this->matchday = (string) $fixtureElement->spieltag;
        $this->date = (string) $fixtureElement->datum;
        $this->openingTime = (string) $fixtureElement->hallenoeffnung;
        $this->startTime = (string) $fixtureElement->spielbeginn;
        $this->teamHome = (string) $fixtureElement->heim;
        $this->teamAway = (string) $fixtureElement->gast;
        $this->scoreHome = intval($fixtureElement->sheim);
        $this->scoreAway = intval($fixtureElement->sgast);
        $this->setResults = (string) $fixtureElement->result;
        $this->venue = (string) $fixtureElement->halle;
    }
}
?>