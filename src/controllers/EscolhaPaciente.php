<?php
session_start();
requireValidSession(true);
$exception = null;

if( isset($_GET['id'])) {

    $pacienteSelec = new Paciente($_GET);

    try {
        $Selec= $pacienteSelec->checkLogin();

        $_SESSION['paciente'] = $Selec; //contem informações Id,name,dataNasc

        if(isset($_SESSION['site'])) {
        $urlgetsession =$_SESSION['site'];
        addSuccessMsg('Usuário selecionado com sucesso!');
        header("Location: {$urlgetsession}");    
        unset($_SESSION['site']);

        }
    } catch(AppException $e) {
        $exception = $e;
    }   
}

$user = $_SESSION['user'];

$listasPaciente = Paciente::paciente_Lista();



foreach($listasPaciente as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}



$title = "Escolha o paciente";


loadTemplateView2('EscolhaPaciente', [
    'listasPaciente' => $listasPaciente,
    'title' => $title,
    ]);
