<?php

class XMLFetcher {
    public $current_xml;

    public function read_from_uri($xml_uri) {
        $this->current_xml = new XMLReader();
        return $this->current_xml->open($xml_uri);
    }
}
?>