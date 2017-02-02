<?php



include_once 'config.php';


$data = file_get_contents("http://www.velostanlib.fr/service/carto",0,$context);

if($data == FALSE){
  echo("cant reach velostanlib");
  header('HTTP/1.0 404 Not Found');
  die();
}


$xml = new DOMDocument;
$xml->loadXML(utf8_encode($data));

if($xml == FALSE){
  echo("cant read data from velostanlib");
  header('HTTP/1.0 404 Not Found');
  die();
}

$xsl = new DOMDocument;
$xsl->load('xsl/station.xsl');

if($xsl == FALSE){
  echo("cant read xsl file");
  header('HTTP/1.0 404 Not Found');
  die();
}

// Configuration du transformateur
$proc = new XSLTProcessor;
$proc->importStylesheet($xsl); // attachement des règles xsl

if($proc == FALSE){
  echo("cant read import xsl file");
  header('HTTP/1.0 404 Not Found');
  die();
}

echo $proc->transformToXml($xml);

if($proc == FALSE){
  echo("cant read transform xml with the xsl given file");
  header('HTTP/1.0 404 Not Found');
  die();
}
