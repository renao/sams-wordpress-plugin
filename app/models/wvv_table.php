<?php

namespace WVVPlugin\Models;

class WVVTable {
    public $tableEntries = [];

    public function __construct(\SimpleXMLElement $tableXml) {
        foreach ($tableXml->children() as $elementName => $elementNode) {
            array_push($this->tableEntries, $this->createEntry($elementNode));
        }
    }

    private function createEntry(\SimpleXMLElement $tableElement) {
        return new TableEntry($tableElement);
    }
}

?>