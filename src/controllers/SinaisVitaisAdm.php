<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession(true);


$exception = null;
$listaSinais = [];
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];


//$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");



if(count($_POST) === 0 && isset($_GET['update'])) {

$listaSinais = Assets::sinaisVitais_unic($_GET['update']);


} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Assets($_POST);

        if($dbpaciente->tipo == '2') {
            $dbpaciente->descricao = "Pressão Arterial Sistólica";
        }elseif ($dbpaciente->tipo == '3') {
            $dbpaciente->descricao = "Frequência Cardiaca";
        }elseif ($dbpaciente->tipo == '4') {
            $dbpaciente->descricao = "Temperatura Corporal";
        }elseif ($dbpaciente->tipo == '5') {
            $dbpaciente->descricao = "Saturação de Oxigenio";
        }elseif ($dbpaciente->tipo == '6') {
            $dbpaciente->descricao = "Frequencia respiratória";
        }elseif ($dbpaciente->tipo == '7') {
            $dbpaciente->descricao = "Pressão Arterial Diastólica";
        }

        if($dbpaciente->id) {



            $dbpaciente->updateSTR("sinal_vitals",['operador','paciente',
            'data','descricao','unidade','codsensor','maximo','minimo','tipo']);


            addSuccessMsg('Usuário alterado com sucesso!');
            header('Location: ListaSinaisAdm.php');
            exit();
        } else {

            $dbpaciente->insertSTR("sinal_vitals",['operador','paciente',
            'data','descricao','unidade','codsensor','maximo','minimo','tipo']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
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
    ['exception' => $exception,'listaSinais'=>$listaSinais]);

