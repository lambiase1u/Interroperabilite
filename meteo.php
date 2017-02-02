<?php

include_once 'config.php';

ob_start();
include 'location.php';

ob_end_clean();



$data = file_get_contents("http://www.infoclimat.fr/public-api/gfs/xml?_ll=".$coord["lat"].",".$coord["lon"]."&_auth=ARsDFFIsBCZRfFtsD3lSe1Q8ADUPeVRzBHgFZgtuAH1UMQNgUTNcPlU5VClSfVZkUn8AYVxmVW0Eb1I2WylSLgFgA25SNwRuUT1bPw83UnlUeAB9DzFUcwR4BWMLYwBhVCkDb1EzXCBVOFQoUmNWZlJnAH9cfFVsBGRSPVs1UjEBZwNkUjIEYVE6WyYPIFJjVGUAZg9mVD4EbwVhCzMAMFQzA2JRMlw5VThUKFJiVmtSZQBpXGtVbwRlUjVbKVIuARsDFFIsBCZRfFtsD3lSe1QyAD4PZA%3D%3D&_c=19f3aa7d766b6ba91191c8be71dd1ab2",0,$context);

if($data == FALSE){
  echo("cant reach infoclimat");
  header('HTTP/1.0 404 Not Found');
  die();
}

// CHargement du source XML
$xml = new DOMDocument;
$xml->loadXML(utf8_encode($data));

if($xml == FALSE){
  echo("cant read data from infoclimat");
  header('HTTP/1.0 404 Not Found');
  die();
}

$xsl = new DOMDocument;
$xsl->load('xsl/meteo.xsl');

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




 ?>
