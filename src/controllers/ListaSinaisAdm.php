<?php
session_start();
requireValidSession();
requireValidSessionPac();


$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];



$listaSinaisAdm= Assets::sinaisVitais_lista($pacInfo->id_pac);

foreach($listaSinaisAdm as $sinaisAdm){
    $sinaisAdm->data = (new DateTime($sinaisAdm->data))->format('d/m/Y');
}


foreach($listaSinaisAdm as $sinaisAdm){

    if($sinaisAdm->tipo == '2') {
        $sinaisAdm->tipo = "Pressão Arterial Sistólica";
    }elseif ($sinaisAdm->tipo == '3') {
        $sinaisAdm->tipo = "Frequência Cardiaca";
    }elseif ($sinaisAdm->tipo == '4') {
        $sinaisAdm->tipo = "Temperatura Corporal";
    }elseif ($sinaisAdm->tipo == '5') {
        $sinaisAdm->tipo = "Saturação de Oxigenio";
    }elseif ($sinaisAdm->tipo == '6') {
        $sinaisAdm->tipo = "Frequencia respiratória";
    }elseif ($sinaisAdm->tipo == '7') {
        $sinaisAdm->tipo = "Pressão Arterial Diastólica";
    }
}

$title = "Alarmes sinais vitais";

loadTemplateView2('ListaSinaisAdm', [
    'listaSinaisAdm' => $listaSinaisAdm,
    'title' => $title,
    ]);
