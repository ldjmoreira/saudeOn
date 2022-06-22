<?php
session_start();
requireValidSession();
requireValidSessionPac();


$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];
$ola = IP_SERVIDOR_IN;


if(isset($_GET['muted'])) {

    try {
        $_GET['muted'] ? $alarme_ativo = 0 : $alarme_ativo = 1;

        $dbpaciente= new Assets(['alarme_ativo'=>$alarme_ativo,'id'=>$_GET['id']]);

        $dbpaciente->update_("sinal_vitals",['alarme_ativo'],"id",$dbpaciente->id);

        $url = "http://" .$ola."/avisando?".$_SESSION['paciente']->concentrador ."-7" ;
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

$listaSinaisAdm= Assets::sinaisVitais_lista($pacInfo->id_pac);

foreach($listaSinaisAdm as $sinaisAdm){
    $sinaisAdm->data = (new DateTime($sinaisAdm->data))->format('d/m/Y');
}


foreach($listaSinaisAdm as $sinaisAdm){

    if($sinaisAdm->tipo == '2') {
        $sinaisAdm->tipo = "Pressão Arterial Sistólica";
    }elseif ($sinaisAdm->tipo == '3') {
        $sinaisAdm->tipo = "Frequência Cardiaca";
    }elseif ($sinaisAdm->tipo == '4') {
        $sinaisAdm->tipo = "Temperatura Corporal";
    }elseif ($sinaisAdm->tipo == '5') {
        $sinaisAdm->tipo = "Saturação de Oxigenio";
    }elseif ($sinaisAdm->tipo == '6') {
        $sinaisAdm->tipo = "Frequencia respiratória";
    }elseif ($sinaisAdm->tipo == '7') {
        $sinaisAdm->tipo = "Pressão Arterial Diastólica";
    }
}

$title = "Alarmes sinais vitais";

loadTemplateView2('ListaSinaisAdm', [
    'listaSinaisAdm' => $listaSinaisAdm,
    'pacInfo' => $pacInfo,
    'title' => $title,
    ]);
