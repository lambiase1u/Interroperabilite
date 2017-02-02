<?php

$id = $_GET['id'];

$var = [];

if(isset($id)){
  $data = file_get_contents("http://www.velostanlib.fr/service/stationdetails/nancy/".$id);

  $data_xml = simplexml_load_string($data);


  $var['available'] = (string) $data_xml->available;
  $var['total'] = (string) $data_xml->total;


}else{
  echo("probleme avec le parametre ID ");
}


echo(json_encode($var));


 ?>
