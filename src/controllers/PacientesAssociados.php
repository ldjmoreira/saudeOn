<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);
$ola = IP_SERVIDOR_IN;

$user = $_SESSION['user'];


$exception = null;
if(isset($_GET['delete'])) {


    try {

        $dbpaciente= new Paciente(['equipo'=>0,'sensor'=>null,'id'=>$_GET['delete']]);

        $dbpaciente->update_("monitoramentos",['equipo','sensor'],"id",$dbpaciente->id);


        $url = "http://" .$ola."/avisando?".$_GET['concentrador']."-3" ;
        $xml = file_get_contents($url);

        addSuccessMsg('Usuário desassociado com sucesso!');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}
    $listasPaciente = concentrador::paciente_Associados();

//    var_dump($listasPaciente);
//    exit;


/*
foreach($listasPaciente as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}
*/


loadTemplateView2('PacientesAssociados', [
    'listasPaciente' => $listasPaciente,
    'exception'=> $exception
    ]);
