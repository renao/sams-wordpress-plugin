<?php

namespace SAMSPlugin\Remote;

class TransientCacher {

    private $uri;
    private $cacheKey;
    private $invalidationTimeInSeconds;

    public function __construct($uri, $invalidationTimeInSeconds = 300) {
        $this->uri = $uri;
        $this->cacheKey = 'sams-plugin__' . rawurlencode($uri);
        $this->invalidationTimeInSeconds = $invalidationTimeInSeconds;
    }

    public function loadCache() {
        $content = get_transient($this->cacheKey);

        if ($content === false) {
            $remoteContent = wp_remote_get($this->uri);
            
            if (is_wp_error($remoteContent)) {
                return $remoteContent;
            }
            
            set_transient($this->cacheKey, $remoteContent, $this->invalidationTimeInSeconds);
            $content = $remoteContent;
        }
        return $content;
    }
}

?>