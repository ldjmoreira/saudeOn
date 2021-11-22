<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession();
requireValidSessionPac();

$exception = null;
$userData = [];
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];
$profpac=[];

$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");



if(count($_POST) === 0 && isset($_GET['update'])) {

$profpac = Agenda::getListaProfPacAll($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

$profpac = Agenda::getListaProfPacAll($_GET['view']); 

} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Agenda($_POST);

        if($dbpaciente->id) {


            $dbpaciente->updateSTR("agenda_profissional_detalhadas",['paciente','operador','profissional','motivo',
            'turno','data','hora','lido']);


            addSuccessMsg('Usuário alterado com sucesso!');
            header('Location: ListaProfPac.php');
            exit();
        } else {

            $dbpaciente->insertSTR("agenda_profissional_detalhadas",['paciente','operador','profissional','motivo',
            'turno','data','hora']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaProfPac.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
        array_push($profpac, new Agenda($_POST));
        

    }
}



if (isset($_GET['view'])){
    loadTemplateView3('ProfPacView','leftProfPac',
    ['exception' => $exception,'profpac'=>$profpac,'profissionais'=>$profissionais]);
}else{

    loadTemplateView3('ProfPac','leftProfPac',
    ['exception' => $exception,'profpac'=>$profpac,'profissionais'=>$profissionais]);
}
