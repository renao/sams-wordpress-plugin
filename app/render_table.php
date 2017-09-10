<?php

class RenderTable {

    public static function render() {
        $tableUri = new TableURI(2017, 201797);
        $fetcher = new XMLFetcher();
        return TablePresenter::render(new WVVTable($fetcher->fetch($tableUri->toString())));
    }
}

?>