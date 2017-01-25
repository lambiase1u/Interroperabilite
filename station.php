<?php

$data = file_get_contents("http://www.velostanlib.fr/service/carto");
$station = simplexml_load_string($data);

foreach ($station as  $key => $val){
    var_dump($val);
}


