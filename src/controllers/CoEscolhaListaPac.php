<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);
$exception = null;

if(count($_POST) > 0) {

    $pacienteSelec = new Paciente(['id' =>$_POST['id']]);

    try {
        $Selec= $pacienteSelec->checkLogin();
        $STRING="sensor-" . $_POST['id'];
        $_SESSION['paciente'] = $Selec; //contem informações Id,name,dataNasc
        $_SESSION['sensor'] = $_POST[$STRING];
        addSuccessMsg('Usuário selecionado com sucesso!');
        header("Location: EscolhidoConcentrador.php");    
        
    } catch(AppException $e) {
        $exception = $e;
    }   
}else if (isset($_GET['update'])) {
    $listasPaciente = Paciente::paciente_ListaConcentradorById($_GET['update']);
}else {

    $listasPaciente = Paciente::paciente_ListaConcentrador();
}






foreach($listasPaciente as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}



addSuccessMsg('Selecione o paciente e digite a identificação do monitor de sinais vitais ');

$title = "Associar paciente ao concentrador";


loadTemplateView2('ConexaoPaciente', [
    'listasPaciente' => $listasPaciente,
    'title' => $title,
    ]);
