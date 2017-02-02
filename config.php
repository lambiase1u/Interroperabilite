<?php

$opts = array('http' => array('proxy'=> 'tcp://www-cache:3128', 'request_fulluri'=> true));
$context = stream_context_create($opts);

 ?>
