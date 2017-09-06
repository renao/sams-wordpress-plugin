<?php

class TableURI {

    private $season;
    private $division;

    public function __construct($season_id, $division_id) {
        $this->validateArguments($season_id, $division_id);
        $this->season = $season_id;
        $this->division = $division_id;
    }

    public function to_string() {
        return "https://wvv.it4sport.de/data/vbnw/aufsteiger/public/tabelle_". $this->season . "_" . $this->division . ".xml";
    }

    private function validateArguments($season_id, $division_id) {
        if (($season_id == null) || ($division_id == null)) {
            throw new InvalidArgumentException("SEASON ID and DIVISION ID cannot be NULL");
        }
    }
}

?>