<?php

session_start();
$user = $_SESSION['user'];    

//-------------------
$opts = array('http' =>
array(
  'method'  => 'POST',
  'header'  => "Content-Type: text/xml\r\n",
  'content' => "",
  'timeout' => 60
)
);
//----------
$context  = stream_context_create($opts);
$url = IP_SERVIDOR_IN .'/saindo?'.$user->id_Op;

$xml = file_get_contents($url, false, $context); // metodo post



session_destroy();
header('Location: login.php');
