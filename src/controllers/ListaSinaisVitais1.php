<?php
session_start();
requireValidSession();
requireValidSessionPac();

$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];
$ola = IP_SERVIDOR_IN;

$exception = null;
if(isset($_GET['delete'])) {

    try {

        $dbpaciente= new Agenda(['intervalo'=>0, 'lido'=>0, 'id'=>$_GET['delete']]);//lido=0

        $dbpaciente->update_("programacao_sinais_vitais_detalhes",['intervalo','lido'],"id",$dbpaciente->id);

        addSuccessMsg('Informação removida com sucesso.');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}

if(isset($_GET['muted'])) {

    try {
        $_GET['muted'] ? $registro_ativo = 0 : $registro_ativo = 1;

        $dbpaciente= new Assets(['registro_ativo'=>$registro_ativo,'id'=>$_GET['id']]);

        $dbpaciente->update_("programacao_sinais_vitais_detalhes",['registro_ativo'],"id",$dbpaciente->id);

        $url = "http://" .$ola."/avisando?".$_SESSION['paciente']->concentrador ."-6" ;
        $xml = file_get_contents($url);

     //   addSuccessMsg('Configurações de som atualizadas com sucesso!');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}

$listaSinaisVitais = Agenda::getListaSinaisVitais($pacInfo->id_pac);




foreach($listaSinaisVitais as $listaSinalVital){

    if($listaSinalVital->cod_sinal_vital == '2') {
        $listaSinalVital->descricao = "Pressão Arterial";
    }elseif ($listaSinalVital->cod_sinal_vital == '3') {
        $listaSinalVital->descricao = "Frequência Cardiaca";
    }elseif ($listaSinalVital->cod_sinal_vital == '4') {
        $listaSinalVital->descricao = "Temperatura Corporal";
    }elseif ($listaSinalVital->cod_sinal_vital == '5') {
        $listaSinalVital->descricao = "Saturação de Oxigenio";
    }elseif ($listaSinalVital->cod_sinal_vital == '6') {
        $listaSinalVital->descricao = "Frequência respiratória";
    }
}

$title = "Programação de sinais vitais";


loadTemplateView2('ListaSinaisVitais1', [
    'listaSinaisVitais' => $listaSinaisVitais,
    'title' => $title,
    'pacInfo' => $pacInfo,
    'exception'=> $exception
    ]);
