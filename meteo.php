<?php

ob_start();
include 'location.php';

ob_end_clean();
//var_dump($meteo_xml);


$opts = array('http' => array('proxy'=> 'tcp://www-cache:3128', 'request_fulluri'=> true));
$context = stream_context_create($opts);


//$data = file_get_contents("http://www.infoclimat.fr/public-api/gfs/xml?_ll=".$coord["lat"].",".$coord["lon"]."&_auth=ARsDFFIsBCZRfFtsD3lSe1Q8ADUPeVRzBHgFZgtuAH1UMQNgUTNcPlU5VClSfVZkUn8AYVxmVW0Eb1I2WylSLgFgA25SNwRuUT1bPw83UnlUeAB9DzFUcwR4BWMLYwBhVCkDb1EzXCBVOFQoUmNWZlJnAH9cfFVsBGRSPVs1UjEBZwNkUjIEYVE6WyYPIFJjVGUAZg9mVD4EbwVhCzMAMFQzA2JRMlw5VThUKFJiVmtSZQBpXGtVbwRlUjVbKVIuARsDFFIsBCZRfFtsD3lSe1QyAD4PZA%3D%3D&_c=19f3aa7d766b6ba91191c8be71dd1ab2"/*,0,$context*/);
//$data_xml = simplexml_load_string($data)




// CHargement du source XML
$xml = new DOMDocument;
$xml->load("http://www.infoclimat.fr/public-api/gfs/xml?_ll=".$coord["lat"].",".$coord["lon"]."&_auth=BB4CFQB%2BBiRTfltsUiRQeQJqAzYIflRzVipXNAhtVyoJYl8%2BD29XMV4wB3pXeAM1UXwDYAE6AzMKYVUtAXNTMgRuAm4AawZhUzxbPlJ9UHsCLANiCChUc1Y0VzYIYVcqCWtfOA9uVyteOAdsV3kDMFFrA3wBIQM6Cm1VOgFqUzAEZQJiAGsGYVM4WyZSfVBhAjkDagg1VDpWNVc5CGNXNwlpX2gPPVdjXjMHe1dvAzVRZANiAToDMwpsVTsBc1MvBB4CFQB%2BBiRTfltsUiRQeQJkAz0IYw%3D%3D&_c=a723f9f2f9456d5e7e355cfe59422b51");

$xsl = new DOMDocument;
$xsl->load('xsl/meteo.xsl');

// Configuration du transformateur
$proc = new XSLTProcessor;
$proc->importStylesheet($xsl); // attachement des règles xsl

echo $proc->transformToXml($xml);




 ?>
