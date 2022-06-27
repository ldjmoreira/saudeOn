<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);


$user = $_SESSION['user'];

$listasConcentrador = Paciente::paciente_concentrador2();


foreach($listasConcentrador as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}

$title = "Escolha o paciente";

loadTemplateView2('EscolhaPaciente', [
    'listasConcentrador' => $listasConcentrador,
    'title' => $title,
    ]);
