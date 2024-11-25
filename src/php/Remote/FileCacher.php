<?php

namespace SAMSPlugin\Remote;

class FileCacher {

    private $uri;
    private $cacheFileName;
    private $invalidationTimeInSeconds;

    public function __construct($uri, $invalidationTimeInSeconds = 300) {
        $this->uri = $uri;
        $this->cacheFileName = __DIR__ . '/' . rawurlencode($uri) . '.cache';
        $this->invalidationTimeInSeconds = $invalidationTimeInSeconds;
    }

    public function loadCache() {
        if ($this->needsRefresh()) {
            $this->refreshCache();
        }

        return $this->loadFileCache();
    }

    private function needsRefresh() {
        return !file_exists($this->cacheFileName) || $this->cacheOutdated();
    }
    
    private function refreshCache() {
        $remoteContent = file_get_contents($this->uri);
        file_put_contents($this->cacheFileName, $remoteContent);
    }

    private function loadFileCache() {
        return file_get_contents($this->cacheFileName);
    }

    private function cacheOutdated() {
        $modified = filemtime($this->cacheFileName);
        $now = time();

        return 
            $modified != false 
            && ($now - $modified) >= $this->invalidationTimeInSeconds;
    }
}
?>