<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);


////$user = $_SESSION['user'];
//$pacInfo= $_SESSION['paciente'];



$listaInstituicao = Assets::instituicao_lista();






$title = "Instituições";


loadTemplateView2('ListaInstituicao', [
    'listaInstituicao' => $listaInstituicao,
    'title' => $title,
    ]);
