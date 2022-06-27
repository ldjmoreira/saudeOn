<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);
requireValidSessionPac();

$exception = null;



if(count($_POST) === 0 && isset($_GET['update'])) {

$CuidadosAdm = Assets::getCuidados($_GET['update']);


} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Assets($_POST);
        $currentDate = (new DateTime())->format('Y-m-d H:i:s');//objeto data atual
        $dbpaciente->created_at = $currentDate;


        if($dbpaciente->id) {


            $dbpaciente->updateSTR("procedimentos",['name','operador','descricao','created_at']);


            addSuccessMsg('Usuário alterado com sucesso!');
            header('Location: ListaCuidadosAdm.php');
            exit();
        } else {

            $dbpaciente->insertSTR("procedimentos",['name','operador','descricao','created_at']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaCuidadosAdm.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
        
    } finally {
        array_push($CuidadosAdm, new Assets($_POST));
        $_POST=[];

    }
}





    loadTemplateView3('CuidadosAdm','leftCuidadosAdm',
    ['exception' => $exception,'CuidadosAdm'=>$CuidadosAdm]);

