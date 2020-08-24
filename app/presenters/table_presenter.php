<?php

namespace WVVPlugin\Presenters;

use WVVPlugin\Models\WVVTable;

class TablePresenter {

    public static function render(WVVTable $table) {
        $htmlBody = file_get_contents(__DIR__ . "/../templates/table.html");

        if (count($table->tableEntries) > 0) {
            $entriesHtml = "";
            foreach ($table->tableEntries as $entry) {
                $entriesHtml .= TableEntryPresenter::render($entry);
            }

            return str_replace("{{%table_entries}}", $entriesHtml, $htmlBody);
        }
    }
}

?>