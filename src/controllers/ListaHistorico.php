<?php
session_start();
requireValidSession();
requireValidSessionPac();

$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];

$listaEmergencia = Paciente::getListaEmergencia($pacInfo->id_pac);


//foreach($listaEmergencia as $emergencia){
//    $emergencia->dataCiencia = (new DateTime($emergencia->dataCiencia))->format('Y-m-d H:i:s');
//
//}

//foreach($listaEmergencia as $emergencia){
 //   $emergencia->dataCiencia = (new DateTime($emergencia->dataCiencia))->format('d/m/Y');

//}




$title = "Histórico de emergências";

loadTemplateView2('ListaHistorico', [
    'listaEmergencia' => $listaEmergencia,
    'title' => $title,
    ]);
