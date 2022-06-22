<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession(true);


$exception = null;
$userData = [];
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];


//$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");



if(count($_POST) === 0 && isset($_GET['update'])) {

$listaInstituicao = Assets::instituicao_unic($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $listaInstituicao = Assets::instituicao_unic($_GET['view']); 

} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Assets($_POST);



        if($dbpaciente->id) {


            $dbpaciente->updateSTR("institutos",['operador','nomefantasia',
            'tipo','CNES','cidade','endereco','CEP','especialidades']);


            addSuccessMsg('Usuário alterado com sucesso!');
            header('Location: ListaInstituicao.php');
            exit();
        } else {

            $dbpaciente->insertSTR("institutos",['operador','nomefantasia',
            'tipo','CNES','cidade','endereco','CEP','especialidades']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaInstituicao.php');
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
    loadTemplateView3('InstituicaoAdmView','leftProfPac',
    ['exception' => $exception,'listaInstituicao'=>$listaInstituicao]);
}else{

    loadTemplateView3('InstituicaoAdm','leftProfPac',
    ['exception' => $exception,'listaInstituicao'=>$listaInstituicao]);
}
