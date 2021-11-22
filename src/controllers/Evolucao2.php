<?php
session_start();
requireValidSession();
requireValidSessionPac();

$exception = null;

$pacInfo= $_SESSION['paciente'];
$users = $_SESSION['user'];

$user=$users->getValues();



$paciente = Paciente::SelectOne($pacInfo->id_pac);
$infProfissional = Profissional::getOneFix("profissionals",['profissional_id'=>$users->codigo_profissional]);
$infcbo = Profissional::getOneFix("cbo",['id'=>$infProfissional->CBO]);


$from = new DateTime($paciente[0]->dataNasc);
$to   = new DateTime('today');
$from->diff($to)->y;


    if(count($_POST) > 0) { //carga da pagina, vem tudo

    try {

        $dbevolucao = new Exame($_POST);

        $dbevolucao->insertto_ten("evolucaos",['paciente','atividade','CBO','conselho','nomeProfissional','data_evolucao','evolucao','operador']);


        //$dbevolucao->select_ten($dbevolucao->id);


        //$dbevolucao->update_("evolucaos",['nomeProfissional','operador'],"evolucao_id",$dbevolucao->id);

        addSuccessMsg('Documento registrado com sucesso!');
        header('Location: EscolhaPaciente.php');
        exit();
        
            $_POST = [];
        } catch(Exception $e) {
            $exception = $e;
        } finally {
            $evolucaoResult = new Exame($_POST);
            $today  =formatDateWithLocale(new DateTime(), '%A, %d de %B de %Y') ;
            $listadeEvolucao = Exame::getListaEvolucao($pacInfo->id_pac);
            $_POST = [];
    }
   


    } elseif(count($_POST) === 0 && isset($_GET['id'])) {//seleção da lista

        $listadeEvolucao = Exame::getListaEvolucao($_GET['paciente2']);
        $evolucaoResult = Exame::getUnicEvolucao($_GET['id']);
        $profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");
        $today= formatDateWithLocale($evolucaoResult->data_evolucao, '%A, %d de %B de %Y');

    } elseif(count($_POST) === 0 && isset($_GET['novo'])) {// só vem lista e paciente //nova evolucao
        $listadeEvolucao = Exame::getListaEvolucao($_GET['novo']);
        $paciente = Paciente::SelectOne($_GET['novo']);
        $today  =formatDateWithLocale(new DateTime(), '%A, %d de %B de %Y') ;
        $profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");


    } elseif(count($_POST) === 0 && isset($pacInfo)) {//salvamento da selecao
        $listadeEvolucao = Exame::getListaEvolucao($pacInfo->id_pac);

        if(!empty($listadeEvolucao)){

            $evolucaoResult = Exame::getUnicEvolucao($listadeEvolucao[0]->evolucao_id);

            $today= formatDateWithLocale($evolucaoResult->data_evolucao, '%A, %d de %B de %Y'); 
            $profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");
        }
    }
//--

if(!empty($listadeEvolucao)||$_GET['novo'] ) {

    foreach($listadeEvolucao as $evolucao){
        $evolucao->data_evolucao = (new DateTime($evolucao->data_evolucao))->format('d/m/Y');
    }


    loadTemplateView3('Evolucao2','leftEvolucao',$user+
    ['today'=>$today,
    'exception'=>$exception,
    'listadeEvolucao'=>$listadeEvolucao,
    'evolucaoResult'=>$evolucaoResult,
    'profissionais'=>$profissionais,
    'paciente'=>$paciente,
    'infProfissional'=>$infProfissional,
    'infcbo'=>$infcbo,
    'age'=>$from->diff($to)->y
    
    ]);

} else {
    $today  =formatDateWithLocale(new DateTime(), '%A, %d de %B de %Y') ;
    loadTemplateView3('Evolucao2Nopac','leftEvolucao',$user+
    ['today'=>$today,
    'exception'=>$exception,
     'paciente'=>$paciente,
     'infProfissional'=>$infProfissional,
     'infcbo'=>$infcbo,
     'age'=>$from->diff($to)->y
    ]);
}