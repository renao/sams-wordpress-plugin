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
        $table = new WVVTable($fetcher->fetch($tableUri->toString()));
        return TablePresenter::render($table);
    }
}

?>