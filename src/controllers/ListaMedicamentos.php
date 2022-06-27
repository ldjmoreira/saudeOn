<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);


////$user = $_SESSION['user'];
//$pacInfo= $_SESSION['paciente'];



$listaMedicamentos = Assets::medicamentos_lista();

foreach($listaMedicamentos as $medicamentos){
    $medicamentos->data = (new DateTime($medicamentos->data))->format('d/m/Y');
}


$title = "Medicamentos";


loadTemplateView2('ListaMedicamentos', [
    'listaMedicamentos' => $listaMedicamentos,
    'title' => $title,
    ]);
