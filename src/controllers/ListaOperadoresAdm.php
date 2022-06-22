<?php
session_start();
requireValidSession();


$user = $_SESSION['user'];
//$pacInfo= $_SESSION['paciente'];



$listaOperadores= Assets::operadores_lista2();

foreach($listaOperadores as $profissionais){
    $profissionais->start_date = (new DateTime($profissionais->start_date))->format('d/m/Y');
}




$title = "Lista de Operadores";



loadTemplateView2('ListaOperadoresAdm', [
    'listaOperadores' => $listaOperadores,
    'title' => $title,
    ]);
