<?php

// Proxy iut
// www-cache:3128

include_once 'config.php';

$data = file_get_contents("http://freegeoip.net/xml/".$_SERVER['REMOTE_ADDR'],0,$context);

if($data == FALSE){
  echo("cant reach freegeoip");
  header('HTTP/1.0 404 Not Found');
  die();
}



$data_xml = simplexml_load_string($data);

if($data_xml == FALSE){
  echo("cant read data from freegeoip");
  header('HTTP/1.0 404 Not Found');
  die();
}

$coord = [];

foreach ($data_xml as $key => $value) {

  if($key == "Latitude"){
    //array_push($coord,"lat" => (string) $value);
    $coord["lat"] =  (string) $value;
  }

  if($key == "Longitude"){
      //array_push($coord,"lon" => (string) $value);
      $coord["lon"] =  (string) $value;
  }

}



//var_dump($coord);
echo(json_encode($coord));

 ?>
