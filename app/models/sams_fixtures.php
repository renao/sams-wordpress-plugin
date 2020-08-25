<?php

namespace SAMSPlugin\Models;

class SAMSFixtures {
    public $fixturesEntries = [];

    public function __construct(\SimpleXMLElement $fixturesXml) {
        foreach ($fixturesXml->children() as $elementName => $elementNode) {
            array_push($this->fixturesEntries, $this->createEntry($elementNode));
        }
    }

    private function createEntry(\SimpleXMLElement $fixtureElement) {
        return new FixturesEntry($fixtureElement);
    }
}

?>