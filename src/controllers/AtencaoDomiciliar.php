<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);
requireValidSessionPac();

$exception = null;
$userData = [];
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];


$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");
$pacientes = Agenda::selectDouble("pacientes","name","id");
$modalidadeAD = Agenda::selectDouble("modalidades","descricao","id");
$perfilUsuario = Agenda::selectDouble("perfil_usuarios","descricao","id");



if(count($_POST) === 0 && isset($_GET['update'])) {

    $atencaoDomiciliar= Agenda::getAtencaoDomiciliar($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $atencaoDomiciliar= Agenda::getListaProgCuidados($_GET['view']);

} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Agenda($_POST);

        if($dbpaciente->id) {


            $dbpaciente->updateSTR("solicitacao_atencaos",['paciente','operador','profissional','modalidadeAD',
            'perfilUsuario','hospitaldeReferencia','UPAdeReferencia','samutel','data']);


            addSuccessMsg('Usuário alterado com sucesso!');
            $_POST = [];
            header('Location: ListaAtencaoDom.php');
            exit();
        } else {

            $dbpaciente->insertSTR("solicitacao_atencaos",['paciente','operador','profissional','modalidadeAD',
            'perfilUsuario','hospitaldeReferencia','UPAdeReferencia','samutel','data']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaAtencaoDom.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
        array_push($atencaoDomiciliar, new Agenda($_POST));
    }
}



if (isset($_GET['view'])){
    loadTemplateView3('atencaoDomiciliar','leftAtencaoDomiciliar',
    ['exception' => $exception,
    'atencaoDomiciliar'=>$atencaoDomiciliar,
    'profissionais'=>$profissionais,
    'pacientes'=>$pacientes,
    'modalidadeAD'=>$modalidadeAD,
    'perfilUsuario'=>$perfilUsuario
    ]);
}else{

    loadTemplateView3('atencaoDomiciliar','leftAtencaoDomiciliar',
    ['exception' => $exception,
    'atencaoDomiciliar'=>$atencaoDomiciliar,
    'profissionais'=>$profissionais,
    'pacientes'=>$pacientes,
    'modalidadeAD'=>$modalidadeAD,
    'perfilUsuario'=>$perfilUsuario
    ]);
}
