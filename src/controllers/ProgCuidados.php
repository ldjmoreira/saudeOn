<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);
requireValidSessionPac();

$exception = null;
$userData = [];
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];


$cuidador = Profissional::selectDouble("cuidadors","name","id");

$cuidados = Agenda::selectDouble("procedimentos","name","id");



if(count($_POST) === 0 && isset($_GET['update'])) {

    $infCuidados= Agenda::getListaProgCuidados($_GET['update']);

} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $infCuidados= Agenda::getListaProgCuidados($_GET['view']);

} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Agenda($_POST);

        if($dbpaciente->id) {


            $dbpaciente->updateSTR("programacao_procedimentos_detalhadas",['paciente','operador','procedimento','intervalo',
            'detalhes','data','hora','lido']);


            addSuccessMsg('Usuário alterado com sucesso!');
            $_POST = [];
            header('Location: ListaProgCuidados.php');
            exit();
        } else {


            $dbpaciente->insertSTR("programacao_procedimentos_detalhadas",['paciente','operador','procedimento','intervalo',
            'detalhes','data','hora']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaProgCuidados.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
    }
}




if (isset($_GET['view'])){
    loadTemplateView3('ProgCuidadosView','leftProgCuidados',
    ['exception' => $exception,
    'infCuidados'=>$infCuidados,
    'cuidados'=>$cuidados,
    'cuidadores'=>$cuidador
    ]);
}else{

    loadTemplateView3('ProgCuidados','leftProgCuidados',
    ['exception' => $exception,
    'infCuidados'=>$infCuidados,
    'cuidados'=>$cuidados,
    'cuidadores'=>$cuidador

    ]);
}
