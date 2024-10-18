<?php

namespace SAMSPlugin\Presenters;

use SAMSPlugin\Models\Fixtures;

class FixturesPresenter {

    public static function render(Fixtures $fixtures) {
        $htmlBody = file_get_contents(__DIR__ . "/../templates/fixtures.html");
        
        if (count($fixtures->fixturesEntries) > 0) {
            $entriesHtml = "";
            foreach ($fixtures->fixturesEntries as $entry) {
                $entriesHtml .= FixturesEntryPresenter::render($entry);
            }

            return str_replace("{{%table_entries}}", $entriesHtml, $htmlBody);
        }
    }
}

?>