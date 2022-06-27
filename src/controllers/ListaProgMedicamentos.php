<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);
requireValidSessionPac();
$exception=[];
$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];

if(isset($_GET['delete'])) {

    try {

        $dbpaciente= new Agenda(['lido'=>0, 'softdelete'=>1,'id'=>$_GET['delete']]);

        $dbpaciente->update_("programacao_medicamentos_2",['lido','softdelete'],"id",$dbpaciente->id);

        addSuccessMsg('Informação removida com sucesso.');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}

$listadeMedicamentos = Agenda::getListaMedicamentos($pacInfo->id_pac);



foreach($listadeMedicamentos as $deMedicamentos){
    if($deMedicamentos->aprazada == 1){
    $deMedicamentos->hora = date('H:i', strtotime($deMedicamentos->datahora));
    $deMedicamentos->datahora = date('d/m/Y', strtotime($deMedicamentos->datahora));

   // $deMedicamentos->data = (new DateTime($deMedicamentos->data))->format('d/m/Y');
    }else {
        $deMedicamentos->datahora = "-";
        $deMedicamentos->hora = "-";
    }
}

$title = "Programação de medicação";



loadTemplateView2('ListaProgMedicamentos',
[
    'listadeMedicamentos' => $listadeMedicamentos,
    'pacInfo' => $pacInfo,
    'title' => $title,
]);



