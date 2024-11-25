<?php

namespace SAMSPlugin\Remote\URIs;

class RankingURI {

    private $apiKey;
    private $matchSeries;
    private $baseUrl;

    public function __construct($baseUrl, $apiKey, $matchSeriesId) {
        $this->validateArguments($baseUrl, $apiKey, $matchSeriesId);

        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
        $this->matchSeries = $matchSeriesId;
    }

    public function toString() {
        return rtrim($this->baseUrl, '/') . "/xml/rankings.xhtml?apiKey=" 
        . $this->apiKey 
        . "&matchSeriesId=" 
        . $this->matchSeries;
    }

    private function validateArguments($baseUrl, $apiKey, $matchSeriesId) {
        if (($baseUrl == null) || ($apiKey == null) || ($matchSeriesId == null)) {
            throw new \InvalidArgumentException("apiKey and matchSeriesId cannot be NULL");
        }
    }
}

?>