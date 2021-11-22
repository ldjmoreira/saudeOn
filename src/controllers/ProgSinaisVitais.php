<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession(true);
requireValidSessionPac();

$exception = null;
$sinaisVitais = [];
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];


//$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");

//$sinaisVitais = Agenda::selectDouble("sinal_vitals","descricao","id");
array_push($sinaisVitais, new Agenda(['descricao'=>'Pressão Arterial','id'=>'2']));
array_push($sinaisVitais, new Agenda(['descricao'=>'Frequência Cardiaca','id'=>'3']));
array_push($sinaisVitais, new Agenda(['descricao'=>'Temperatura Corporal','id'=>'4']));
array_push($sinaisVitais, new Agenda(['descricao'=>'Saturação de Oxigênio','id'=>'5']));
array_push($sinaisVitais, new Agenda(['descricao'=>'Frequência Respiratória','id'=>'6']));
// as constantes vem do programa



if(count($_POST) === 0 && isset($_GET['update'])) {

    $infSinaisVitais= Agenda::getListaProgSinaisVitais($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $infSinaisVitais= Agenda::getListaProgSinaisVitais($_GET['view']);

} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Agenda($_POST);

        if($dbpaciente->id) {

            if($dbpaciente->tipoIntervalo == "Hora"){
                $dbpaciente->intervalo =   $dbpaciente->intervalo*60;
                $dbpaciente->tipoIntervalo = "Minutos";
            }


            $dbpaciente->updateSTR("programacao_sinais_vitais_detalhes",['paciente','operador','cod_sinal_vital',
            'intervalo','tipoIntervalo','ativo','ciente']);


            addSuccessMsg('Usuário alterado com sucesso!');
            $_POST = [];
            header('Location: ListaSinaisVitais1.php');
            exit();
        } else {

            if($dbpaciente->tipoIntervalo == "Hora"){
                $dbpaciente->intervalo =   $dbpaciente->intervalo*60;
                $dbpaciente->tipoIntervalo = "Minutos";
            }

            $dbpaciente->insertSTR("programacao_sinais_vitais_detalhes",['paciente','operador','cod_sinal_vital',
            'intervalo','tipoIntervalo','ativo','ciente']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaSinaisVitais1.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
        array_push($infSinaisVitais, new Agenda($_POST));
    }
}



if (isset($_GET['view'])){
    loadTemplateView3('ProgSinaisVitaisView','leftProgSinaisVitais',
    ['exception' => $exception,'infSinaisVitais'=>$infSinaisVitais,'sinaisVitais'=>$sinaisVitais]);
}else{

    loadTemplateView3('ProgSinaisVitais','leftProgSinaisVitais',
    ['exception' => $exception,'infSinaisVitais'=>$infSinaisVitais,'sinaisVitais'=>$sinaisVitais]);
}
