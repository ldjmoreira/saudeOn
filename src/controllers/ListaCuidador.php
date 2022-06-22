<?php
session_start();
requireValidSession();
requireValidSessionPac();

$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];

if(isset($_GET['delete'])) {

    try {

        $dbpaciente= new Profissional(['softdelete'=>1,'id'=>$_GET['delete']]);

        $dbpaciente->update_("cuidadors",['softdelete'],"id",$dbpaciente->id);


        addSuccessMsg('Cuidador removido com sucesso.');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o cuidador com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}



$listasCuidador = Profissional::cuidadores_Lista($pacInfo->id_pac);



$title = "Lista de cuidadores";


loadTemplateView2('ListaCuidador', [
    'listasCuidador' => $listasCuidador,
    'title' => $title,
    'pacInfo' => $pacInfo,
    ]);
