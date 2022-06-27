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
$profpac=[];

$profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");

$intervalos = Agenda::selectDouble("agenda_profissional_detalhadas","id","intervalo_minutos",1,1);

if(count($_POST) === 0 && isset($_GET['calendar'])) {

    // identificar se tem um caractere na string 
    if(strpos($_GET['calendar'], 'T') !== false) {
        // cortar uma string dada um caractere
        $date = substr($_GET['calendar'], 0, strpos($_GET['calendar'], 'T'));
        $time = substr($_GET['calendar'], strpos($_GET['calendar'], 'T')+1);
        $hour = substr($time, 0, 8);

        $initialDate = ['data' => $date, 'hora' => $hour];
    } else {
        $initialDate = ['data' => $_GET['calendar']];
    }

    $profpac= [];
    $profpac[0] = new Agenda($initialDate);


    }

if(count($_POST) === 0 && isset($_GET['update'])) {

$profpac = Agenda::getListaProfPacAll($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

$profpac = Agenda::getListaProfPacAll($_GET['view']); 

} elseif(count($_POST) > 0) {

    if($_POST['button'] == 'on') {
        try {

            $dbpaciente= new Agenda(['lido'=>0, 'ativo'=>0 , 'softdelete'=>1,'id'=>$_POST['id']]);

            $dbpaciente->update_("agenda_profissional_detalhadas",['lido','ativo','softdelete'],"id",$dbpaciente->id);

            addSuccessMsg('Consulta ao paciente removida com sucesso');
            header('Location: ListaProfPac.php');
            exit;
        } catch(Exception $e) {
            if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
                addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
            } else {
                $exception = $e;
            }
        }

    }
    if(!isset($_GET['view'])) {

        try {

            $dbpaciente = new Agenda($_POST);

            if($dbpaciente->id) {


                $dbpaciente->updateSTR("agenda_profissional_detalhadas",['paciente','operador','profissional','motivo',
                'turno','data','hora','lido','periodicidade','duracao']);


                addSuccessMsg('Usuário alterado com sucesso!');
                header('Location: ListaProfPac.php');
                exit();
            } else {

                $dbpaciente->insertSTR("agenda_profissional_detalhadas",['paciente','operador','profissional','motivo',
                'turno','data','hora','periodicidade','duracao']);

            
                addSuccessMsg('Usuário cadastrado com sucesso!');
                $_POST = [];
                header('Location: ListaProfPac.php');
                exit();
                
            }
            $_POST = [];
        } catch(Exception $e) {
            $exception = $e;
        } finally {
            $userData = $_POST;
            array_push($profpac, new Agenda($_POST));
            

        }
    }
}



if (isset($_GET['view'])){
    loadTemplateView3('ProfPacView','leftProfPac',
    [
        'exception' => $exception,
        'profpac'=>$profpac,
        'profissionais'=>$profissionais]);
}else{

    loadTemplateView3('ProfPac','leftProfPac',
    [
        'exception' => $exception,
        'profpac'=>$profpac,
        'profissionais'=>$profissionais,
        'intervalos'=>$intervalos

]);
}
