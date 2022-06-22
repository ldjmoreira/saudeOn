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


        $dbevolucao->insertto_ten("p_t_s_s",['paciente','operador','CBO','nomeProfissional','data_PTS','reavaliacao','diagnostico','definicaoMetas','definicaoResp']);



        addSuccessMsg('Documento registrado com sucesso!');
        header("Location: PTS.php?paciente2=$dbevolucao->paciente&id=$dbevolucao->id");
        exit();
        
            $_POST = [];
        } catch(Exception $e) {
            $exception = $e;
        } finally {
            
            $PTSResult = new Exame($_POST);
            $listadePTS = Exame::getListaPTS($pacInfo->id_pac);
            $today  =formatDateWithLocale(new DateTime(), '%A, %d de %B de %Y') ;
            $_POST = [];
            
    }

   


} elseif(count($_POST) === 0 && isset($_GET['id'])) {//seleção da lista

    $listadePTS = Exame::getListaPTS($_GET['paciente2']);
    $PTSResult = Exame::getUnicPTS($_GET['id']);
    $profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");
    $today= formatDateWithLocale($PTSResult->data_PTS, '%A, %d de %B de %Y');

} elseif(count($_POST) === 0 && isset($_GET['novo'])) {// só vem lista e paciente //nova evolucao
    $listadePTS = Exame::getListaPTS($_GET['novo']);

    $paciente = Paciente::SelectOne($_GET['novo']);
    $profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");
    $today  =formatDateWithLocale(new DateTime(), '%A, %d de %B de %Y') ;

} elseif(count($_POST) === 0 && isset($pacInfo)) { //index
    $listadePTS = Exame::getListaPTS($pacInfo->id_pac);


    if(!empty($listadePTS)){

        $PTSResult = Exame::getUnicPTS($listadePTS[0]->PTS_id);

        $today= formatDateWithLocale($PTSResult->data_PTS, '%A, %d de %B de %Y'); 
        $profissionais = Profissional::selectDouble("profissionals","nome_Prof","profissional_id");
    }
}
//

if(!empty($listadePTS) && !isset($_GET['novo'])  ) {

    foreach($listadePTS as $PTS){
        $PTS->data_PTS = (new DateTime($PTS->data_PTS))->format('d/m/Y');
    }


    loadTemplateView3('PTS','leftPTS',$user+
    ['today'=>$today,
    'exception' => $exception,
    'listadePTS'=>$listadePTS,
    'PTSResult'=>$PTSResult,
    'profissionais'=>$profissionais,
    'paciente'=>$paciente,
    'infProfissional'=>$infProfissional,
    'infcbo'=>$infcbo,
    'age'=>$from->diff($to)->y
    ]);

} else if(!empty($listadePTS) && isset($_GET['novo']) ) {
    $today  =formatDateWithLocale(new DateTime(), '%A, %d de %B de %Y') ;
    loadTemplateView3('PTS2new','leftPTS',$user+
    ['today'=>$today,
    'exception'=>$exception,
    'listadePTS'=>$listadePTS,
    'PTSResult'=>$PTSResult,
     'paciente'=>$paciente,
     'infProfissional'=>$infProfissional,
     'infcbo'=>$infcbo,
     'age'=>$from->diff($to)->y
    ]);
} else {
    $today  =formatDateWithLocale(new DateTime(), '%A, %d de %B de %Y') ;
    loadTemplateView3('PTS2Nopac','leftPTS',$user+
    ['today'=>$today,
    'exception'=>$exception,
     'paciente'=>$paciente,
     'infProfissional'=>$infProfissional,
     'infcbo'=>$infcbo,
     'age'=>$from->diff($to)->y
    ]);
}