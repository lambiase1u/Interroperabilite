<?php

ob_start();





for ($i=01; $i <30 ; $i++) {
  $xml = new DOMDocument;
  $xml->load("http://www.velostanlib.fr/service/stationdetails/nancy/".$i);

  $xsl = new DOMDocument;
  $xsl->load('xsl/station_details.xsl');

  // Configuration du transformateur
  $proc = new XSLTProcessor;
  $proc->setParameter(null, 'id', $i);
  $proc->importStylesheet($xsl); // attachement des règles xsl

  echo $proc->transformToXml($xml);
}





 ?>
