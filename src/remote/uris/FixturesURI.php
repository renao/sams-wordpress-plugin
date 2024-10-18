<?php

namespace SAMSPlugin\Remote\URIs;

class FixturesURI {

    private $apiKey;
    private $matchSeriesId;
    private $teamId;

    public function __construct($apiKey, $matchSeriesId, $teamId) {
        $this->validateArguments($apiKey, $matchSeriesId, $teamId);
        $this->apiKey = $apiKey;
        $this->matchSeriesId = $matchSeriesId;
        $this->teamId = $teamId;
    }

    public function toString() {
        return "https://dvv.sams-server.de/xml/matches.xhtml?apiKey=" 
        . $this->apiKey 
        ."&matchSeriesId=" 
        . $this->matchSeriesId 
        ."&teamId=" 
        . $this->teamId;
    }

    private function validateArguments($apiKey, $matchSeriesId, $teamId) {
        if (($apiKey == null) || ($matchSeriesId == null) || ($teamId == null)) {
            throw new \InvalidArgumentException("API-Key, MatchSeriesId and TeamID cannot be NULL");
        }
    }
}

?>