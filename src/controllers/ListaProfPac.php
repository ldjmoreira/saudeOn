<?php
session_start();
requireValidSession();
requireValidSessionPac();

$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];

if(isset($_GET['delete'])) {

    try {

        $dbpaciente= new Agenda(['lido'=>0, 'softdelete'=>1,'id'=>$_GET['delete']]);

        $dbpaciente->update_("agenda_profissional_detalhadas",['lido','softdelete'],"id",$dbpaciente->id);

        addSuccessMsg('Informação removida com sucesso.');
        header('Location: ListaProfPac.php');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}


$listasprofpac = Agenda::getListaProfPac($pacInfo->id_pac);

foreach($listasprofpac as $profpac){
    $profpac->data = (new DateTime($profpac->data))->format('d/m/Y');
}



$title = "Agenda do profissional - paciente";

loadTemplateView2('ListaProfPac', [
    'listasprofpac' => $listasprofpac,
    'title' => $title,
    ]);
