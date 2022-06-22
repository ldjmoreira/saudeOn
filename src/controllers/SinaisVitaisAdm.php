<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession(true);

$ola = IP_SERVIDOR_IN;
$exception = null;
$listaSinais = [];
//$pacInfo= $_SESSION['paciente'];
$user = $_SESSION['user'];


//$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");



if(count($_POST) === 0 && isset($_GET['update'])) {

$listaSinais = Assets::sinaisVitais_unic($_GET['update']);


} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Assets($_POST);


        if($dbpaciente->id) {

            //falta tratar
            $dbpaciente->updateSTR("sinal_vitals",['operador','paciente',
            'data','unidade','codsensor','maximo','minimo']);

            $url = "http://" .$ola."/avisando?".$_SESSION['paciente']->concentrador ."-7" ;
            $xml = file_get_contents($url);

            addSuccessMsg('Sinal vital alterado com sucesso!');
            header('Location: ListaSinaisAdm.php');
            exit();
        } else {

            $dbpaciente->insertSTR("sinal_vitals",['operador','paciente',
            'data','descricao','unidade','codsensor','maximo','minimo','tipo']);

           
            addSuccessMsg('Sinal vital alterado com sucesso!');
            $_POST = [];
            header('Location: ListaSinaisAdm.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        array_push($listaSinais, new Assets($_POST));
    }
}





    loadTemplateView3('SinaisVitaisAdm','leftSinaisAdm',
    [
    'exception' => $exception,
    'listaSinais'=>$listaSinais
    ]);

