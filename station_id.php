<?php


include_once 'config.php';

$id = $_GET['id'];

$var = [];

if(isset($id)){

  if($id > 0 && $id < 30){
    $data = file_get_contents("http://www.velostanlib.fr/service/stationdetails/nancy/".$id,0,$context);

    if($data == FALSE){
      echo("cant reach velostanlib");
      header('HTTP/1.0 404 Not Found');
      die();
    }


    $data_xml = simplexml_load_string($data);

    if($data_xml == FALSE){
      echo("cant read data from the xml file");
      header('HTTP/1.0 404 Not Found');
      die();
    }

    $var['available'] = (string) $data_xml->available;
    $var['total'] = (string) $data_xml->total;

  }else{
    echo('id must be beetween 1 and 29');
  }


}else{
  echo("cant find id parameter ");
  header('HTTP/1.0 404 Not Found');
  die();
}


echo(json_encode($var));


 ?>
