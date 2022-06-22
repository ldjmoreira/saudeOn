<?php
session_start();
requireValidSession();
requireValidSessionPac();
$exception=[];
$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];

if(isset($_GET['delete'])) {

    try {

        $dbpaciente= new Agenda(['lido'=>0, 'softdelete'=>1,'id'=>$_GET['delete']]);

        $dbpaciente->update_("programacao_procedimentos_detalhadas",['lido','softdelete'],"id",$dbpaciente->id);

        addSuccessMsg('Informação removida com sucesso.');
        header('Location: ListaProgCuidados.php');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}


$listadeCuidados = Agenda::getListaCuidados($pacInfo->id_pac);

foreach($listadeCuidados as $deCuidados){
    $deCuidados->data = (new DateTime($deCuidados->data))->format('d/m/Y');
}

$title = "Programação de cuidados";


loadTemplateView2('ListaProgCuidados',
[
    'listadeCuidados' => $listadeCuidados,
    'pacInfo' => $pacInfo,
    'title' => $title,
]);

