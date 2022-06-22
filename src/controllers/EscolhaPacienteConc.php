<?php
session_start();
requireValidSession(true);
$exception = null;


if( isset($_GET['id'])) {

    $ListaPaciente= Paciente::paciente_ListaConcentrador($_GET['id']);
    $idConcentrador=$_GET['id'];



}

if(count($_POST) > 0) {
    //id: concentrador
    //operador
    //numero sensor
    // paciente id

    try {

        $dbmonitoramento= new Concentrador(['id'=>null,'equipo'=>$_POST['id'],'sensor'=>$_POST['numero'],'paciente'=>$_POST['paciente']]);
        $idConc = $_POST['id'];
        $dbmonitoramento->update_("monitoramentos",['equipo','sensor'],"paciente",$_POST['paciente']);
        addSuccessMsg('paciente associado ao concentrador!');
        
        header("Location: novoConcentrador.php?update={$idConc}");
        exit();

    } catch(Exception $e) {
        $exception = $e;
    } finally {
        array_push($infConcentrador, new Profissional($_POST));
        $_POST = [];
    }
}

$user = $_SESSION['user'];

//$listasPaciente = Paciente::paciente_Lista();



foreach($listasPaciente as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}



$title = "Pacientes sem concentrador associado";


loadTemplateView2('EscolhaPacienteConc', [
    'listasPaciente' => $ListaPaciente,
    'idConcentrador' => $idConcentrador,
    'title' => $title,
    ]);
