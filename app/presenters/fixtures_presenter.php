<?php

namespace WVVPlugin\Presenters;

use WVVPlugin\Models\WVVFixtures;

class FixturesPresenter {

    public static function render(WVVFixtures $fixtures, string $club) {
        $htmlBody = file_get_contents(__DIR__ . "/../templates/fixtures.html");

        if (count($fixtures->fixturesEntries > 0)) {
            $entriesHtml = "";
            foreach ($fixtures->fixturesEntries as $entry) {
                if (isset($club) && $entry->clubParticipates($club)) {
                    $entriesHtml .= FixturesEntryPresenter::render($entry);
                }
            }

            return str_replace("{{%table_entries}}", $entriesHtml, $htmlBody);
        }
    }
}

?>