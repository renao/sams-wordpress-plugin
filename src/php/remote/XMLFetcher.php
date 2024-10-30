<?php

namespace SAMSPlugin\Remote;

use SAMSPlugin\Remote\FileCacher;

class XMLFetcher {

    public function fetch($xmlUri) {
        $cacher = new FileCacher($xmlUri);
        $xmlContent = $cacher->loadCache();
        return simplexml_load_string($xmlContent);
    }
}
?>