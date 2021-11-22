<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession();


$exception = null;
$userData = [];
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];


//$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");



if(count($_POST) === 0 && isset($_GET['update'])) {

    $listaMedicamentos = Assets::medicamento_unic($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $listaMedicamentos = Assets::medicamento_unic($_GET['view']); 

} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Assets($_POST);

        if($dbpaciente->id) {


            $dbpaciente->updateSTR("medicamentos",['operador',
            'apresentacao','descricao','name']);


            addSuccessMsg('Usuário alterado com sucesso!');
            header('Location: ListaMedicamentos.php');
            exit();
        } else {

            $dbpaciente->insertSTR("medicamentos",['operador',
            'apresentacao','descricao','name']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaMedicamentos.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
    }
}

//var_dump($profpac);
//exit;

if (isset($_GET['view'])){
    loadTemplateView3('MedicamentosAdmView','leftProfPac',
    ['exception' => $exception,'listaMedicamentos'=>$listaMedicamentos]);
}else{

    loadTemplateView3('MedicamentosAdm','leftProfPac',
    ['exception' => $exception,'listaMedicamentos'=>$listaMedicamentos]);
}
