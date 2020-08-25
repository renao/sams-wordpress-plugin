<?php

namespace SAMSPlugin\Remote;

class XMLFetcher {

    public function fetch($xmlUri) {
        $xmlContent = file_get_contents($xmlUri);
        return simplexml_load_string($xmlContent);
    }
}
?>