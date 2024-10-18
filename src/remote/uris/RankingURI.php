<?php

namespace SAMSPlugin\Remote\URIs;

class RankingURI {

    private $apiKey;
    private $matchSeries;

    public function __construct($apiKey, $matchSeriesId) {
        $this->validateArguments($apiKey, $matchSeriesId);
        $this->apiKey = $apiKey;
        $this->matchSeries = $matchSeriesId;
    }

    public function toString() {
        return "https://dvv.sams-server.de/xml/rankings.xhtml?apiKey=" 
        . $this->apiKey 
        . "&matchSeriesId=" 
        . $this->matchSeries;
    }

    private function validateArguments($apiKey, $matchSeriesId) {
        if (($apiKey == null) || ($matchSeriesId == null)) {
            throw new \InvalidArgumentException("apiKey and matchSeriesId cannot be NULL");
        }
    }
}

?>