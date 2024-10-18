<?php
namespace SAMSPlugin;

use SAMSPlugin\Remote\URIs\RankingURI;
use SAMSPlugin\Remote\XMLFetcher;
use SAMSPlugin\Models\Ranking;
use SAMSPlugin\Presenters\RankingPresenter;

class RankingRenderer {

    public static function fetchAndRender($apiKey, $matchSeriesId) {
        $tableUri = new RankingURI($apiKey, $matchSeriesId);
        $fetcher = new XMLFetcher();
        $fetchedXml = $fetcher->fetch($tableUri->toString());
        if (\is_a($fetchedXml, "SimpleXMLElement")) {
            $table = new Ranking($fetchedXml);
            return RankingPresenter::render($table);
        } else {
            return "Ranking not found (Match Series ID: $matchSeriesId - API Key $apiKey)";
        }
    }
}

?>