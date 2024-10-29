<?php

namespace SAMSPlugin\Presenters;

use SAMSPlugin\Models\Ranking;

class RankingPresenter {

    public static function render(Ranking $ranking) {
        $htmlBody = file_get_contents(__DIR__ . "/../templates/ranking.html");

        if (count($ranking->rankingEntries) > 0) {
            $entriesHtml = "";
            foreach ($ranking->rankingEntries as $entry) {
                $entriesHtml .= RankingEntryPresenter::render($entry);
            }

            return str_replace("{{%table_entries}}", $entriesHtml, $htmlBody);
        }
    }
}

?>