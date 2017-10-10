<?php

use PHPUnit\Framework\TestCase;
use WVVPlugin\WVVTableRenderer;

final class RenderTableInvokeTest extends TestCase {

    public function testTryTheFullStack() {
        echo WVVTableRenderer::fetchAndRender("2017", "201797");
    }
}

?>