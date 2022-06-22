<?php
session_start();
requireValidSession(true);


$user = $_SESSION['user'];

$listasPaciente = Paciente::paciente_concentrador();


foreach($listaspaciente as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}


loadTemplateView2('ListaProntuario', [
    'listasPaciente' => $listasPaciente,
    ]);
