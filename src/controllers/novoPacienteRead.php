<?php
//not used
session_start();
requireValidSession(true);

$exception = null;
$userData = [];
$paciente = Paciente::getOne(['id' => $_GET['update']]);
//$concentrador = Concentrador::getOne(['concentrador' => $_GET['concentrador']]);
$userData = array_merge($paciente->getValues(), ['concentrador' => $_GET['concentrador']]); 





loadTemplateView3('novoPacienteRead','leftPaciente',$userData +['exception' => $exception]);