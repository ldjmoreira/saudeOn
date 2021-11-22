<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession(true);


$exception = null;
$userData = [];
$infConcentrador = [];
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];


//$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");
//$cuidados = Agenda::selectDouble("procedimentos","name","id");


if(count($_POST) === 0 && isset($_GET['update'])) {

    $infConcentrador= Concentrador::getListaConcentrador($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $infConcentrador= Concentrador::getListaConcentrador($_GET['view']);

} elseif(count($_POST)=== 0 && isset($_GET['paciente'])) {

    $dbmonitoramento= new Concentrador(['id'=>null,'paciente'=>0,'concentrador'=>$_GET['concentrador']]);

    $dbmonitoramento->update_("monitoramentos",['paciente'],"concentrador",$dbmonitoramento->concentrador);
    addSuccessMsg('paciente desassociado do concentrador!');
    header('Location: CoEscolhaListaConc.php');
    exit();
} elseif(count($_POST) > 0) {

    try {

        $dbpaciente = new Concentrador($_POST);

        if($dbpaciente->id) {


            $dbpaciente->updateSTR("monitoramentos",['paciente','operador','concentrador','modelo',
            'marca','datainicial','datafinal','ativo']);


            addSuccessMsg('Usuário alterado com sucesso!');
            $_POST = [];
            header('Location: CoEscolhaListaConc.php');
            exit();
            //ideia é direcionar para o site , tirar o exit e colocar um outro select antes 
            //enviar para a pagina do view
        } else {

            $dbpaciente->insertSTR("monitoramentos",['paciente','operador','concentrador','modelo',
            'marca','datainicial','datafinal','ativo']);

           
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: CoEscolhaListaConc.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        array_push($infConcentrador, new Profissional($_POST));
        $_POST = [];
    }
}



if (isset($_GET['view'])){
    loadTemplateView3('novoConcentradorView','leftConcentrador',
    ['exception' => $exception,'infConcentrador'=>$infConcentrador]);
}else{

    loadTemplateView3('novoConcentrador','leftConcentrador',
    ['exception' => $exception,'infConcentrador'=>$infConcentrador]);
}
