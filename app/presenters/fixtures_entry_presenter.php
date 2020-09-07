<?php

namespace SAMSPlugin\Presenters;

use SAMSPlugin\Models\FixturesEntry;

class FixturesEntryPresenter {

    public static function render(FixturesEntry $fixturesEntry) {
        $htmlBody = file_get_contents(__DIR__ . "/../templates/__fixtures_entry.html");

        return str_replace(
            FixturesEntryPresenter::$entryTemplateKeys,
            FixturesEntryPresenter::getFormattedEntryValues($fixturesEntry),
            $htmlBody);
    }

    private static function getFormattedEntryValues($fixtureEntry) {
        return array(
            $fixtureEntry->date,
            $fixtureEntry->startTime,
            FixturesEntryPresenter::getFormattedFixtureName($fixtureEntry),
            $fixtureEntry->venue,
            FixturesEntryPresenter::getFormattedResult($fixtureEntry)
        );
    }

    private static function getFormattedFixtureName($fixtureEntry) {
        return $fixtureEntry->teamHome . " - " . $fixtureEntry->teamAway;
    }

    private static function getFormattedResult($fixtureEntry) {
        return ($fixtureEntry->hasResult())
            ? $fixture->score
            : "";
    }

    private static $entryTemplateKeys = array(
        "{{%date}}",
        "{{%time}}",
        "{{%fixtureName}}",
        "{{%venue}}",
        "{{%gameResult}}"
    );
}

?>