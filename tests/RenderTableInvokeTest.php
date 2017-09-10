<?php

use PHPUnit\Framework\TestCase;
use WVVPlugin\RenderTable;

final class RenderTableInvokeTest extends TestCase {

    public function testTryTheFullStack() {
        RenderTable::render();
    }
}

?>