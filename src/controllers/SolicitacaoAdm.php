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

$listaSolicitacao = Assets::solicitacao_unic($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $listaSolicitacao = Assets::solicitacao_unic($_GET['view']); 

} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Assets($_POST);

        if($dbpaciente->id) {


            $dbpaciente->updateSTR("perfil_usuarios",['operador',
            'data','descricao']);


            addSuccessMsg('Usuário alterado com sucesso!');
            header('Location: ListaSolicitacao.php');
            exit();
        } else {

            $dbpaciente->insertSTR("perfil_usuarios",['operador',
            'data','descricao']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaSolicitacao.php');
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
    loadTemplateView3('SolicitacaoAdmView','leftProfPac',
    ['exception' => $exception,'listaSolicitacao'=>$listaSolicitacao]);
}else{

    loadTemplateView3('solicitacaoAdm','leftProfPac',
    ['exception' => $exception,'listaSolicitacao'=>$listaSolicitacao]);
}
