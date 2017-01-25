<?php

$data = file_get_contents("http://ip-api.com/xml");

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


echo(json_encode($coord));



 ?>
