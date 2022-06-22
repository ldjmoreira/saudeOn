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
//$medicamentos = Agenda::selectDouble("medicamentos","name","apresentacao");
$medicamentos = Agenda::selectTriple("medicamentos","id","name","apresentacao");

if(count($_POST) === 0 && isset($_GET['update'])) {

    $infMedicamentos= Agenda::getListaProgMedicamentos($_GET['update']);




} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $infMedicamentos= Agenda::getListaProgMedicamentos($_GET['view']);

} elseif(count($_POST) > 0) {


    try {

        $postCorrected = $_POST;
        if($_POST['button'] == 1) {
            $postCorrected['datahora'] = $_POST['data'] . ' ' . $_POST['hora'] . ':00';
            $postCorrected['aprazada'] = '1';

            $today = date('Y-m-d');
            if($postCorrected['datahora'] < $today) {
                throw new Exception('Data e hora devem ser iguais ou maiores que a data de hoje.');
            }
        }



        if($_POST['duracaot'] == 2) {
            $postCorrected['duracao'] = $_POST['duracao']*1440 ;
        }elseif ($_POST['duracaot'] == 1) {
            $postCorrected['duracao'] = 0;
        }

        

        $dbpaciente = new Agenda($postCorrected);


        if($dbpaciente->id) {


            if($dbpaciente->button) {

            $dbpaciente->updateSTR("programacao_medicamentos_2",['paciente','operador','medicamento_id','via',
            'dose','intervalo','aprazada','ativo','ciente','observacao','datahora','lido','duracao']);
            }
            else {

                $dbpaciente->updateSTR("programacao_medicamentos_2",['paciente','operador','medicamento_id','via',
                'dose','intervalo','aprazada','ativo','ciente','observacao','lido','duracao']);
            }

            addSuccessMsg('Registro alterado com sucesso!');
            $_POST = [];
            header('Location: ListaProgMedicamentos.php');
            exit();
        } else {

            if($dbpaciente->button) {

            $dbpaciente->insertSTR("programacao_medicamentos_2",['paciente','operador','medicamento_id','via',
            'dose','intervalo','aprazada','ativo','ciente','observacao','datahora','duracao']);
            }else {

                $dbpaciente->insertSTR("programacao_medicamentos_2",['paciente','operador','medicamento_id','via',
                'dose','intervalo','aprazada','ativo','ciente','observacao','duracao']);  
            }
           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaProgMedicamentos.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        array_push($infMedicamentos, new Agenda($_POST));
        $_POST = [];
    }
}

foreach($medicamentos as $medicamento){
    $medicamento->medicacaoEapresentacao = $medicamento->name . " " . $medicamento->apresentacao;
}

foreach($infMedicamentos as $infMedicamento){
    if($infMedicamento->aprazada == 1){
        $infMedicamento->data = date('Y-m-d', strtotime($infMedicamento->datahora));
        $infMedicamento->hora = date('H:i', strtotime($infMedicamento->datahora));
        //addSuccessMsg('Medicao Aprazada!');
    }
    if($infMedicamento->duracao == 0){
        $infMedicamento->duracaot = 1;
    }else {
        $infMedicamento->duracaot = 2;
        $infMedicamento->duracao = $infMedicamento->duracao/1440;
    }
}

if (isset($_GET['view'])){
    loadTemplateView3('ProgMedicamentosView','leftProgMedicamentos',
    ['exception' => $exception,'infMedicamentos'=>$infMedicamentos,'medicamentos'=>$medicamentos]);
}else{

    loadTemplateView3('ProgMedicamentos','leftProgMedicamentos',
    ['exception' => $exception,'infMedicamentos'=>$infMedicamentos,'medicamentos'=>$medicamentos]);
}
