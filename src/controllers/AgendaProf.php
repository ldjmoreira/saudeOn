<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);
requireValidSessionPac();

$exception = null;
$users = $_SESSION['user'];
////$pacInfo= $_SESSION['paciente'];
$agendaProf=[];

$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");
$pacientess = Paciente::selectDouble("pacientes","name","id");
$infProfissional = Profissional::getOneFix("profissionals",['profissional_id'=>$users->codigo_profissional]);

if(count($_POST) === 0 && isset($_GET['update'])) {

$agendaProf = Agenda::selectAgendaProf($_GET['update']);

//$agendaProf = $agendaProfValues->getValues();



} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $agendaProf = Agenda::selectAgendaProf($_GET['view']); 
    
    //$agendaProf = $agendaProfValues->getValues();

} elseif(count($_POST) > 0) {

    try {


        $dbpaciente = new Agenda($_POST);

        if($dbpaciente->id) {

            $dbpaciente->updateSTR("agenda_profissionals",['paciente','operador','profissional','motivoVisita',
            'dataInicial','diasAtendimento']);


            addSuccessMsg('Usuário alterado com sucesso!');
            header('Location: ListaProfissional.php');
            exit();
        } else {

            $dbpaciente->insertSTR("agenda_profissionals",['paciente','operador','profissional','motivoVisita',
            'dataInicial','diasAtendimento']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaProfissional.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        array_push($agendaProf, new Agenda($_POST));
        $_POST = [];
    }
}



if (isset($_GET['view'])){
    loadTemplateView3('AgendaProfView','leftAgendaProf',
    ['exception' => $exception,'agendaProf'=>$agendaProf,'profissionais'=>$profissionais,'infProfissional'=>$infProfissional,'pacientess'=>$pacientess]);
}else{

    loadTemplateView3('AgendaProf','leftAgendaProf',
    ['exception' => $exception,'agendaProf'=>$agendaProf,'profissionais'=>$profissionais,'infProfissional'=>$infProfissional,'pacientess'=>$pacientess]);
}
