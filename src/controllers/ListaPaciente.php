<?php
session_start();
requireValidSession(true);
$ola = IP_SERVIDOR_IN;

$user = $_SESSION['user'];


$exception = null;
if(isset($_GET['delete'])) {

    try {

        $dbpaciente= new Paciente(['softdelete'=>1,'id'=>$_GET['delete']]);

        $dbpaciente->update_("pacientes",['softdelete'],"id",$dbpaciente->id);
        if(!empty($_GET['concentrador']) ){

            $dbmonitoramento= new Concentrador(['id'=>null,'paciente'=>0,'concentrador'=>$_GET['concentrador']]);
        
            $dbmonitoramento->update_("monitoramentos",['paciente'],"concentrador",$dbmonitoramento->concentrador);
            
            $url = "http://" .$ola."/avisando?".$_SESSION['paciente']->concentrador ."-3" ;
            $xml = file_get_contents($url);

        }
        
        addSuccessMsg('Usuário removido com sucesso.');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}
$listasPaciente = Paciente::paciente_Lista();

foreach($listasPaciente as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}



loadTemplateView2('ListaPaciente', [
    'listasPaciente' => $listasPaciente,
    'exception'=> $exception
    ]);
