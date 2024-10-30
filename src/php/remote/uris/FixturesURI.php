<?php

namespace SAMSPlugin\Remote\URIs;

class FixturesURI {

    private $baseUrl;
    private $apiKey;
    private $matchSeriesId;
    private $teamId;

    public function __construct($baseUrl, $apiKey, $matchSeriesId, $teamId) {
        $this->validateArguments($baseUrl, $apiKey, $matchSeriesId, $teamId);
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
        $this->matchSeriesId = $matchSeriesId;
        $this->teamId = $teamId;
    }

    public function toString() {
        return rtrim($this->baseUrl, '/') . "/xml/matches.xhtml?apiKey=" 
        . $this->apiKey 
        ."&matchSeriesId=" 
        . $this->matchSeriesId 
        ."&teamId=" 
        . $this->teamId;
    }

    private function validateArguments($baseUrl, $apiKey, $matchSeriesId, $teamId) {
        if (($baseUrl == null) || ($apiKey == null) || ($matchSeriesId == null) || ($teamId == null)) {
            throw new \InvalidArgumentException("Base-URL, API-Key, MatchSeriesId and TeamID cannot be NULL");
        }
    }
}

?>