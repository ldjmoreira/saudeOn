<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);


////$user = $_SESSION['user'];
//$pacInfo= $_SESSION['paciente'];



$listaAdmcuidado = Assets::Admcuidado_lista();

foreach($listaAdmcuidado as $cuidado){
    $cuidado->created_at = (new DateTime($cuidado->created_at))->format('d/m/Y');
}



$title = "Cuidados";


loadTemplateView2('ListaCuidadosAdm', [
    'listaAdmcuidado' => $listaAdmcuidado,
    'title' => $title,
    ]);
