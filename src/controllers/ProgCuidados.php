<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession(true);
requireValidSessionPac();

$exception = null;
$userData = [];
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];


//$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");
$cuidados = Agenda::selectDouble("procedimentos","name","id");


if(count($_POST) === 0 && isset($_GET['update'])) {

    $infCuidados= Agenda::getListaProgCuidados($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $infCuidados= Agenda::getListaProgCuidados($_GET['view']);

} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Agenda($_POST);

        if($dbpaciente->id) {

            if($dbpaciente->tipoIntervalo == "Horas"){
                $dbpaciente->intervalo =   $dbpaciente->intervalo*60;
                $dbpaciente->tipoIntervalo = "Minutos";
            }

            $dbpaciente->updateSTR("programacao_procedimentos_detalhadas",['paciente','operador','procedimento','intervalo',
            'detalhes','tipoIntervalo','data','hora','lido']);


            addSuccessMsg('Usuário alterado com sucesso!');
            $_POST = [];
            header('Location: ListaProgCuidados.php');
            exit();
        } else {

            if($dbpaciente->tipoIntervalo == "Horas"){
                $dbpaciente->intervalo =   $dbpaciente->intervalo*60;
                $dbpaciente->tipoIntervalo = "Minutos";
            }

            $dbpaciente->insertSTR("programacao_procedimentos_detalhadas",['paciente','operador','procedimento','intervalo',
            'detalhes','tipoIntervalo','data','hora']);

           
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
    ['exception' => $exception,'infCuidados'=>$infCuidados,'cuidados'=>$cuidados]);
}else{

    loadTemplateView3('ProgCuidados','leftProgCuidados',
    ['exception' => $exception,'infCuidados'=>$infCuidados,'cuidados'=>$cuidados]);
}
