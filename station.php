<?php

header('Access-Control-Allow-Origin: *');  

$data = file_get_contents("http://www.velostanlib.fr/service/carto");
$data_xml = simplexml_load_string($data);


$xml = new DOMDocument;
$xml->load("http://www.velostanlib.fr/service/carto");

$xsl = new DOMDocument;
$xsl->load('xsl/station.xsl');

// Configuration du transformateur
$proc = new XSLTProcessor;
$proc->importStylesheet($xsl); // attachement des règles xsl

echo $proc->transformToXml($xml);
