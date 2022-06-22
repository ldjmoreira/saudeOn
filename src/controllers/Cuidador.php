<?php
session_start();
requireValidSession(true);
requireValidSessionPac();
$cuidador=[];
$exception = null;
$userData = [];
$pacInfo= $_SESSION['paciente'];
$userData= $pacInfo->getValues();

if(count($_POST) === 0 && isset($_GET['update'])) {

$cuidador = Profissional::selectAll("cuidadors","id",$_GET['update']);



} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $cuidador = Profissional::selectAll("cuidadors","id",$_GET['view']);    

} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Profissional($_POST);

        if($dbpaciente->id) {


            $dbpaciente->updateSTR("cuidadors",['name','email','dataAdmissao','estadoCivil',
            'CPF','sexo','naturalidade','vinculoFamiliar','alfabetizacao','deficiencias','telContato',
            'disponibilidade','endereco','CEP','bairro','complemento','cidade','paciente','operador']);


            addSuccessMsg('Dados do cuidador alterado com sucesso!');
            header('Location: ListaCuidador.php');
            exit();
        } else {

            $dbpaciente->insertSTR("cuidadors",['name','email','dataAdmissao','estadoCivil',
            'CPF','sexo','naturalidade','vinculoFamiliar','alfabetizacao','deficiencias','telContato',
            'disponibilidade','endereco','CEP','bairro','complemento','cidade','paciente','operador']);

           
            addSuccessMsg('Dados do cuidador cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaCuidador.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
        array_push($cuidador, new Profissional($_POST));
    }
}



if (isset($_GET['view'])){
    loadTemplateView3('CuidadorView','leftCuidador',
    $userData+['exception' => $exception,'cuidador'=>$cuidador]);
}else{

    loadTemplateView3('Cuidador','leftCuidador',
    $userData+['exception' => $exception,'cuidador'=>$cuidador]);
}
