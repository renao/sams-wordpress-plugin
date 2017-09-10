<?php

class XMLFetcher {

    public function fetch($xmlUri) {
        // $xml = simplexml_load_file($xmlUri);
        return new SimpleXMLElement($xmlUri, null, true);
    }
}
?>