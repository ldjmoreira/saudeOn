<?php


function requireValidSessionPac() {

    $pacInfo= $_SESSION['paciente'];
    

    if(!isset($pacInfo)) {
        $_SESSION['site'] =  urldecode(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));
        addErrorMsg('Não há paciente selecionado. Por favor, selecione um paciente primeiro.');

        header('Location: /EscolhaPaciente.php'); 
        exit();
    }
    if(isset($_GET['change'])) {
        $_SESSION['site'] =  urldecode(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));
        addErrorMsg('Selecione o paciente ');

        header('Location: /EscolhaPaciente.php'); 
        exit();
    }
}