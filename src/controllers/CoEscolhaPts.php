<?php
session_start();
requireValidSession(true);


$user = $_SESSION['user'];

//$listaPTS = Paciente::paciente_pts();

$listaPTS = Paciente::paciente_Lista();

foreach($listaPTS  as $PTS){
    $PTS->dataAdmissao = (new DateTime($PTS->dataAdmissao))->format('d/m/Y');
    if($PTS->end_date){
        $PTS->end_date = (new DateTime($PTS->end_date))->format('d/m/Y');
    }
}

$title = "PTS";

loadTemplateView2('EscolhaPaciente', [
    'listaPTS' => $listaPTS,
    'title' => $title,
    ]);
