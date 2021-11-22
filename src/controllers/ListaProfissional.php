<?php
session_start();
requireValidSession();
requireValidSessionPac();

$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];


$listaProfissionais = Agenda::listaProfissionais($user->codigo_profissional);



foreach($listaProfissionais as $Profissional){
    $Profissional->dataInicial = (new DateTime($Profissional->dataInicial))->format('d/m/Y');
}


$title = "Agenda do profissional";


loadTemplateView2('ListaProfissional', [
    'listaProfissionais' => $listaProfissionais,
    'title' => $title,
    ]);
