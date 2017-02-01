<?php

// Proxy iut 
// www-cache:3128


/*
 *  Creation du fichier html a partir d'un XSL

$proc=new XsltProcessor;
$proc->importStylesheet(DOMDocument::load("test.xsl")); //load script
echo $proc->transformToXML(DOMDocument::load("test.xml")); //load your file

*/
//$_SERVER['REMOTE_ADDR'];
$data = file_get_contents("http://ip-api.com/xml/");

$data_xml = simplexml_load_string($data);

    $coord = [];

foreach ($data_xml as $key => $value) {

  if($key == "lat"){
    //array_push($coord,"lat" => (string) $value);
    $coord["lat"] =  (string) $value;
  }

  if($key == "lon"){
      //array_push($coord,"lon" => (string) $value);
      $coord["lon"] =  (string) $value;
  }

}



var_dump($coord);
//echo(json_encode($coord));

 ?>
