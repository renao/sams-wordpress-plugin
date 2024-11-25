<?php

namespace SAMSPlugin\Remote;

use SAMSPlugin\Remote\TransientCacher;

class XMLFetcher {

    public function fetch($xmlUri) {
        $cacher = new TransientCacher($xmlUri);
        $cachedContent = $cacher->loadCache();
        return $cachedContent;
    }
}
?>