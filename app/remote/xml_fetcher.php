<?php

class XMLFetcher {

    public function fetch($xmlUri) {
        return new SimpleXMLElement($xmlUri, null, true);
    }
}
?>