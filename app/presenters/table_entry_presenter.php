<?php

namespace SAMSPlugin\Presenters;

use SAMSPlugin\Models\TableEntry;

class TableEntryPresenter {

    public static function render(TableEntry $tableEntry) {
        $htmlBody = file_get_contents(__DIR__ . "/../templates/__table_entry.html");

        return str_replace(
            TableEntryPresenter::$entryTemplateKeys,
            TableEntryPresenter::getFormattedEntryValues($tableEntry),
            $htmlBody);
    }

    private static function getFormattedEntryValues($tableEntry) {
        return array(
            $tableEntry->place,
            $tableEntry->teamName,
            $tableEntry->games,
            TableEntryPresenter::getFormattedBalls($tableEntry),
            TableEntryPresenter::getFormattedSets($tableEntry),
            $tableEntry->points
        );
    }

    private static function getFormattedSets($tableEntry) {
        return $tableEntry->setsPro . ":" . $tableEntry->setsCon;
    }

    private static function getFormattedBalls($tableEntry) {
        return $tableEntry->ballsPro . ":" . $tableEntry->ballsCon;
    }

    private static $entryTemplateKeys = array(
        "{{%place}}",
        "{{%teamName}}",
        "{{%games}}",
        "{{%balls}}",
        "{{%sets}}",
        "{{%points}}"
    );
}

?>