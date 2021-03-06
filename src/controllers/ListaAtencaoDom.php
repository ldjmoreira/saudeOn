<?php
session_start();
requireValidSession();
requireValidSessionPac();

$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];



$listaAtencaoDom = Agenda::listaAtencaoDom($pacInfo->id_pac);

foreach($listaAtencaoDom as $AtencaoDom){
    $AtencaoDom->data = (new DateTime($AtencaoDom->data))->format('d/m/Y');
}

$title = "Solicitação de atenção domiciliar";


loadTemplateView2('ListaAtencaoDom', [
    'listaAtencaoDom' => $listaAtencaoDom,
    'title' => $title,
    ]);
