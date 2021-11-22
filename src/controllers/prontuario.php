<?php
session_start();
requireValidSession(true);
$exception = null;
$userData = [];
$userDataExam = [];


if(count($_POST) === 0 && isset($_GET['numero'])) {




    $prontuarioPac = Prontuario::getJoinedTable("exames","prontuario","prontuario_id","id","numero",$_GET['numero']);//modificar
   
    $userData = $prontuarioPac->getValues();




} elseif(count($_POST) > 0 && $_POST['finalizado'] =='1') {
    try {



        $dbprontuario= new Prontuario($_POST);
        $dbprontuario->update();


         addSuccessMsg('Usuário cadastrado com sucesso!');
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
    }
}




loadTemplateView2('prontuario',$userData +['exception' => $exception]);