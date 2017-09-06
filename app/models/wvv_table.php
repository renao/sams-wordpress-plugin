<?php

class WVVTable {
    public $table_entries = [];

    public function __construct(XMLReader $xml_content) {
        prepare_from_xml($xml_content);
    }

    private function prepare_from_xml($xml_content) {
        $xml_content::moveToAttribute("tabellen");
        update_table_from_xml($xml_content::readInnerXML());
    }

    private function update_table_from_xml($elements_xml) {
        $this->table_entries = [];
        $dom = new DOMDocument();
        $dom->loadXML($elements_xml);

        foreach ($dom->getElementByTagName("element") as $entry) {
            array_push($this->table_entries, createEntry($entry));
        }
    }

    private function createEntry($entry_xml) {
        return new TableEntry($entry_xml);
    }
}

?>