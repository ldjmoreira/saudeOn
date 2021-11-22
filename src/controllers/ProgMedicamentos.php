<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession(true);
requireValidSessionPac();

$exception = null;
$userData = [];
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];


//$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");
$medicamentos = Agenda::selectDouble("medicamentos","name","id");



if(count($_POST) === 0 && isset($_GET['update'])) {

    $infMedicamentos= Agenda::getListaProgMedicamentos($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $infMedicamentos= Agenda::getListaProgMedicamentos($_GET['view']);

} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Agenda($_POST);
        
        if($dbpaciente->tipoIntervalo == "Hora"){
            $dbpaciente->intervalo =   $dbpaciente->intervalo*60;
            $dbpaciente->tipoIntervalo = "Minuto";
        }

        if($dbpaciente->id) {



            $dbpaciente->updateSTR("programacao_medicamentos_detalhadas",['paciente','operador','medicamento','via',
            'dose','qtd_dose','intervalo','tipoIntervalo','aprazada','ativo','ciente','condicao','data','hora','lido']);


            addSuccessMsg('Usuário alterado com sucesso!');
            $_POST = [];
            header('Location: ListaProgMedicamentos.php');
            exit();
        } else {

            $dbpaciente->insertSTR("programacao_medicamentos_detalhadas",['paciente','operador','medicamento','via',
            'dose','qtd_dose','intervalo','tipoIntervalo','aprazada','ativo','ciente','condicao','data','hora']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaProgMedicamentos.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
    }
}



if (isset($_GET['view'])){
    loadTemplateView3('ProgMedicamentosView','leftProgMedicamentos',
    ['exception' => $exception,'infMedicamentos'=>$infMedicamentos,'medicamentos'=>$medicamentos]);
}else{

    loadTemplateView3('ProgMedicamentos','leftProgMedicamentos',
    ['exception' => $exception,'infMedicamentos'=>$infMedicamentos,'medicamentos'=>$medicamentos]);
}
