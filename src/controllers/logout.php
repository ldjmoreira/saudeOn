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
$url = 'http://127.0.0.1:8401/saindo?'.$user->id_Op;

$xml = file_get_contents($url, false, $context); // metodo post

session_destroy();
header('Location: login.php');
