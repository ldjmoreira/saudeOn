<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession();
requireValidSessionPac();


$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];

$getEmergencia = Paciente::getEmergencia($_GET['view']);



 //   $getEmergencia->dataCiencia = (new DateTime($emergencia->dataCiencia))->format('d/m/Y');






loadTemplateView2('Historico', [
    'getEmergencia' => $getEmergencia,
    'title' => $title,
    ]);
