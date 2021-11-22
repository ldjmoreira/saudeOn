<?php
session_start();
requireValidSession();


////$user = $_SESSION['user'];
//$pacInfo= $_SESSION['paciente'];



$listaInstituicao = Assets::instituicao_lista();






$title = "Instituições";


loadTemplateView2('ListaInstituicao', [
    'listaInstituicao' => $listaInstituicao,
    'title' => $title,
    ]);
