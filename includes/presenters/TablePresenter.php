<?php

namespace SAMSPlugin\Presenters;

use SAMSPlugin\Models\SAMSTable;

class TablePresenter {

    public static function render(SAMSTable $table) {
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