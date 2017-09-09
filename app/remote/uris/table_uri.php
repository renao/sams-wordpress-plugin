<?php

class TableURI {

    private $season;
    private $division;

    public function __construct($seasonId, $divisionId) {
        $this->validateArguments($seasonId, $divisionId);
        $this->season = $seasonId;
        $this->division = $divisionId;
    }

    public function toString() {
        return "https://wvv.it4sport.de/data/vbnw/aufsteiger/public/tabelle_". $this->season . "_" . $this->division . ".xml";
    }

    private function validateArguments($seasonId, $divisionId) {
        if (($seasonId == null) || ($divisionId == null)) {
            throw new InvalidArgumentException("SEASON ID and DIVISION ID cannot be NULL");
        }
    }
}

?>