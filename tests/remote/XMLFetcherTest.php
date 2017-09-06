<?php

use PHPUnit\Framework\TestCase;

final class XMLFetcherTest extends TestCase {

    /*
     * TODO: Mock XML URIs out here.
     */

    public function testFetchesXMLFromURI() {
        $valid_xml_uri = "https://wvv.it4sport.de/data/vbnw/aufsteiger/public/tabelle_2016_301.xml";
        $xml_fetcher = new XMLFetcher();
        $this->assertTrue($xml_fetcher->read_from_uri($valid_xml_uri));
    }

    public function testCurrentXMLServesXMLReaderObject() {
        $valid_xml_uri = "https://wvv.it4sport.de/data/vbnw/aufsteiger/public/tabelle_2016_301.xml";
        $xml_fetcher = new XMLFetcher();
        $xml_fetcher->read_from_uri($valid_xml_uri);
        $this->assertInstanceOf(XMLReader::class, $xml_fetcher->current_xml);
    }

    // public function testReturnsFalseIfURIIsInvalid() {
    //    $invalid_xml_uri = "https://invalid/no.xml";
    //    $xml_fetcher = new XMLFetcher();
    //    $this->assertEquals(true, $xml_fetcher->read_from_uri($invalid_xml_uri));
    // }
}

?>