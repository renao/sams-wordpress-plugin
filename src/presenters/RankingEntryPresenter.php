<?php

namespace SAMSPlugin\Presenters;

use SAMSPlugin\Models\RankingEntry;

class RankingEntryPresenter {

    public static function render(RankingEntry $rankingEntry) {
        $htmlBody = file_get_contents(__DIR__ . "/../templates/__ranking_entry.html");

        return str_replace(
            RankingEntryPresenter::$entryTemplateKeys,
            RankingEntryPresenter::getFormattedEntryValues($rankingEntry),
            $htmlBody);
    }

    private static function getFormattedEntryValues($rankingEntry) {
        return array(
            $rankingEntry->place,
            $rankingEntry->teamName,
            $rankingEntry->games,
            RankingEntryPresenter::getFormattedBalls($rankingEntry),
            RankingEntryPresenter::getFormattedSets($rankingEntry),
            $rankingEntry->points
        );
    }

    private static function getFormattedSets($rankingEntry) {
        return $rankingEntry->setsPro . ":" . $rankingEntry->setsCon;
    }

    private static function getFormattedBalls($rankingEntry) {
        return $rankingEntry->ballsPro . ":" . $rankingEntry->ballsCon;
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