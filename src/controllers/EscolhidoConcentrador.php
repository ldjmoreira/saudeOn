<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);
requireValidSessionPac();
$ola = IP_SERVIDOR_IN;
$user = $_SESSION['user'];

$listasConcentrador = Paciente::paciente_concentrador2();

if(isset($_GET['update'])) {
    try {

        $sensorString = $_SESSION['sensor'];
        $dbMonitoramentos = new Equipo_concentrador(['equipo'=> $_GET['update'],
        'operador'=>$user->id_Op,'sensor'=>$sensorString,'id'=>$_SESSION['paciente']->id_pac] );


        $dbMonitoramentos->updateSTRS("monitoramentos",['equipo','operador','sensor'],"paciente");

        $url = "http://" .$ola."/avisando?".$_SESSION['paciente']->concentrador ."-3" ;
        $xml = file_get_contents($url);

        addSuccessMsg('Paciente associado com sucesso!');
        $_POST = [];
        header('Location: PacientesAssociados.php');
        exit();
        //ideia é direcionar para o site , tirar o exit e colocar um outro select antes 
        //enviar para a pagina do view

    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}


 



foreach($listasConcentrador as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}

$title = "Escolha o paciente";


loadTemplateView2('ListaConcentrador2', [
    'listasConcentrador' => $listasConcentrador,
    'sensor' => $sensor,
    'title' => $title,
    ]);
