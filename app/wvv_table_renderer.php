<?php
namespace WVVPlugin;

use WVVPlugin\Remote\URIs\TableURI;
use WVVPlugin\Remote\XMLFetcher;
use WVVPlugin\Models\WVVTable;
use WVVPlugin\Presenters\TablePresenter;

class WVVTableRenderer {

    public static function fetchAndRender($season, $division) {
        $tableUri = new TableURI($season, $division);
        $fetcher = new XMLFetcher();
        $fetchedXml = $fetcher->fetch($tableUri->toString());
        if (\is_a($fetchedXml, "SimpleXMLElement")) {
            $table = new WVVTable($fetchedXml);
            return TablePresenter::render($table);
        } else {
            return "Table not found (Season: $season - Division $division)";
        }
    }
}

?>