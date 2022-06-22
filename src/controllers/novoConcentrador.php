<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession(true);


$exception = null;
$userData = [];
$infConcentrador = [];
$ola = IP_SERVIDOR_IN;
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];


//$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");
//$cuidados = Agenda::selectDouble("procedimentos","name","id");




if(count($_POST) === 0 && isset($_GET['update'])) {


    $infConcentrador= Concentrador::getListaConcentrador($_GET[ 'update']);




} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $infConcentrador= Concentrador::getListaConcentrador($_GET['view']);

} elseif(count($_POST)=== 0 && isset($_GET['paciente'])) {

    $dbmonitoramento= new Concentrador(['id'=>null,'paciente'=>0,'concentrador'=>$_GET['concentrador']]);

    $dbmonitoramento->update_("monitoramentos",['paciente'],"concentrador",$dbmonitoramento->concentrador);
    addSuccessMsg('paciente desassociado do concentrador!');
    header('Location: CoEscolhaListaConc.php');
    exit();

    $url = "http://" .$ola."/avisando?".$_SESSION['paciente']->concentrador ."-3" ;
    $xml = file_get_contents($url);

} elseif(count($_POST)=== 0 && isset($_GET['delete'])) {


    $dbmonitoramento= new Concentrador(['id'=>null,'equipo'=>0,'paciente'=>$_GET['delete']]);

    $dbmonitoramento->update_("monitoramentos",['equipo'],"paciente",$dbmonitoramento->paciente);
    addSuccessMsg('paciente desassociado do concentrador!');
    header('Location: novoConcentrador.php?update='. $_GET['update2']);
    exit();

    $url = "http://" .$ola."/avisando?".$_SESSION['paciente']->concentrador ."-3" ;
    $xml = file_get_contents($url);

} elseif(count($_POST)=== 0 && isset($_GET['add'])) {


    $dbmonitoramento= new Concentrador(['id'=>null,'equipo'=>$_GET['id'],'paciente'=>$_GET['add']]);

    $dbmonitoramento->update_("monitoramentos",['equipo'],"paciente",$_GET['add']);
    addSuccessMsg('paciente desassociado do concentrador!');
    header('Location: CoEscolhaListaConc.php');
    exit();

    $url = "http://" .$ola."/avisando?".$_SESSION['paciente']->concentrador ."-3" ;
    $xml = file_get_contents($url);

} elseif(count($_POST) > 0) {

    try {

        $dbEquipoConcentrador = new Equipo_concentrador($_POST);

        if($dbEquipoConcentrador->id) {


            $dbEquipoConcentrador->updateSTR("monitoramentos",['paciente','operador','concentrador','modelo',
            'marca','datainicial','datafinal','ativo']);

            $url = "http://" .$ola."/avisando?".$_SESSION['paciente']->concentrador ."-3" ;
            $xml = file_get_contents($url);

            addSuccessMsg('Usuário alterado com sucesso!');
            $_POST = [];
            header('Location: CoEscolhaListaConc.php');
            exit();
            //ideia é direcionar para o site , tirar o exit e colocar um outro select antes 
            //enviar para a pagina do view
        } else {


            $dbEquipoConcentrador->insertSTR("equipo_concentrador",['numero','modelo','ativo',
            'start_date']);
            

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
    ['exception' => $exception,'infConcentrador'=>$infConcentrador,'infPaciente'=>$infPaciente]);
}elseif(isset($_GET['update'])){

    loadTemplateView3('novoConcentradorEdit','leftConcentrador',
    ['exception' => $exception,'infConcentrador'=>$infConcentrador,
    'infPacientes'=>$infPacientes,'listasPaciente'=>$listasPaciente]);
}else {
    loadTemplateView3('novoConcentrador','leftConcentrador',
    ['exception' => $exception,'infConcentrador'=>$infConcentrador,
    'infPacientes'=>$infPacientes,'listasPaciente'=>$listasPaciente]);
}
