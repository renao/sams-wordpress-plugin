<?php

namespace SAMSPlugin\Models;

class SAMSTable {
    public $tableEntries = [];

    public function __construct(\SimpleXMLElement $tableXml) {
        foreach ($tableXml->children() as $elementName => $elementNode) {
            if ($elementNode->getName() == "ranking") {
                array_push($this->tableEntries, $this->createEntry($elementNode));
            }
        }
    }

    private function createEntry(\SimpleXMLElement $tableElement) {
        return new TableEntry($tableElement);
    }
}

?>