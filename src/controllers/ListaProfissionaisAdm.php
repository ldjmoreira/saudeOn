<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);


$user = $_SESSION['user'];
//$pacInfo= $_SESSION['paciente'];




$listaProfissionais= Assets::profissionais_lista2();

foreach($listaProfissionais as $profissionais){
    $profissionais->dataAdmissao = (new DateTime($profissionais->dataAdmissao))->format('d/m/Y');
}


$title = "Profissionais de saúde";



loadTemplateView2('ListaProfissionaisAdm', [
    'listaProfissionais' => $listaProfissionais,
    'title' => $title,
    ]);
