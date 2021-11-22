<?php
session_start();
requireValidSession();


////$user = $_SESSION['user'];
//$pacInfo= $_SESSION['paciente'];



$listaSolicitacao = Assets::solicitacao_lista();

foreach($listaSolicitacao as $solicitacao){
    $solicitacao->data = (new DateTime($solicitacao->data))->format('d/m/Y');
}


$title = "Perfil de solicitação";


loadTemplateView2('ListaSolicitacao', [
    'listaSolicitacao' => $listaSolicitacao,
    'title' => $title,
    ]);
