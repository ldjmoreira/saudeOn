<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);
requireValidSessionPac();

$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];
//




if(count($_POST) === 0 && isset($_GET['delete'])) {
    try {

        $dbpaciente= new Agenda(['lido'=>0, 'ativo'=>0 , 'softdelete'=>1,'id'=>$_GET['delete']]);

        $dbpaciente->update_("agenda_profissional_detalhadas",['lido','ativo','softdelete'],"id",$dbpaciente->id);

        addSuccessMsg('Informação removida com sucesso.');
        header('Location: ListaProfPac.php');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }

} elseif(count($_POST) === 0 && !isset($_GET['delete']) && !isset($_GET['view'] )) {
    $initialDate= date('Y-m-d');
    // cut string 
    $initialDatex = substr($initialDate, 0, 7);
    $initialDatex = $initialDatex . '-01';  
    $listasprofpac = Agenda::getListaProfPac($pacInfo->id_pac,$initialDatex);
    $listasprofpac2 = $listasprofpac;
    $initialview='dayGridMonth';
    // tratamento 
    foreach ($listasprofpac as $key => $value) {
        $timestamp = strtotime($value->data. ' ' .$value->hora);
        
        $listasprofpac[$key]->dataInicial = date('Y-m-d H:i:s', $timestamp);
        $listasprofpac[$key]->dataFinal = date("Y-m-d H:i:s", 
        strtotime("+".$value->duracao." hour", $timestamp));
    }


    
    //data de agora + 1 mes
    $data1 = date('Y-m-d', strtotime('+1 month'));

    $vetor = '';
    $vetor2 = array();
    $z=0;
    foreach ($listasprofpac as $key2 => $value2) {
        if($value2->periodicidade >0){
            $periodicidade = $value2->periodicidade/1440;
            $i=0;
            //$vetor2[$z] = $value2;
            do {

                $vetor= $value2;

                $time = strtotime($vetor->data);
                  $periodicidade2 = (($i)*$periodicidade);
                $initialDate2 = date("Y-m-d", strtotime("+$periodicidade2 days", $time));
              //  $vetor->data = $initialDate;

                $x = new stdClass();

                $vetor2[$z] = (object)[
                    'nome_prof'=>$vetor->nome_Prof,
                    'data'=>$initialDate2,
                    'hora'=>$vetor->hora,
                    'descricao'=>$vetor->descricao,
                    'duracao'=>$vetor->duracao,
                    'periodicidade'=>$vetor->periodicidade,
                    'id'=>$vetor->id,'dataInicial'=>$vetor->dataInicial,
                    'dataFinal'=>$vetor->dataFinal];
                $z++;
                $i++;

 
            } while(strtotime($initialDate2) < strtotime($data1));

            $vetor=[];

        }else{
            $vetor= $value2;
            $vetor2[$z] =  (object)['nome_prof'=>$vetor->nome_Prof,
            'data'=>$vetor->data,'hora'=>$vetor->hora,'duracao'=>$vetor->duracao,'periodicidade'=>$vetor->periodicidade,'id'=>$vetor->id,'dataInicial'=>$vetor->dataInicial,'dataFinal'=>$vetor->dataFinal];
            $z++;
        }

    }


    foreach ($vetor2 as $key => $value) {
        $timestamp = strtotime($value->data. ' ' .$value->hora);
        
        $vetor2[$key]->dataInicial = date('Y-m-d H:i:s', $timestamp);
        $vetor2[$key]->dataFinal = date("Y-m-d H:i:s", 
        strtotime("+".$value->duracao." hour", $timestamp));
    }
    //
    $listasprofpac = $vetor2;
    
    foreach($listasprofpac  as $profpac){
        $profpac->data = (new DateTime($profpac->data))->format('d/m/Y');
    }
    foreach($listasprofpac2  as $profpac2){
        $profpac2->data = (new DateTime($profpac2->data))->format('d/m/Y');
    }

} elseif(count($_POST) === 0 && isset($_GET['view']) ) {
    
    if($_GET['view'] =='month' ) {

        $initialview='dayGridMonth';
        if($_GET['next'] == 2){

            $time = strtotime($_GET['currentday']);
            $initialDate = date("Y-m-d", strtotime("+1 month", $time));

        } elseif($_GET['next'] == 1){
            $time = strtotime($_GET['currentday']);
            $initialDate = date("Y-m-d", strtotime("-1 month", $time));

        } elseif($_GET['next'] == 3) {
            $initialDate = date('Y-m-d');
        }
        // cut string 
        $initialDatex = substr($initialDate, 0, 7);
        $initialDatex = $initialDatex . '-01';  

        $listasprofpac = Agenda::getListaProfPac($pacInfo->id_pac,$initialDatex);

        // tratamento 
        foreach ($listasprofpac as $key => $value) {
            $timestamp = strtotime($value->data. ' ' .$value->hora);
            
            $listasprofpac[$key]->dataInicial = date('Y-m-d H:i:s', $timestamp);
            $listasprofpac[$key]->dataFinal = date("Y-m-d H:i:s", 
            strtotime("+".$value->duracao." hour", $timestamp));
        }


        
    }elseif( $_GET['view'] =='week' ) {

        $initialview='timeGridWeek';

        if($_GET['next'] == 2){
            $time = strtotime($_GET['currentday']);

            $initialDate = date("Y-m-d", strtotime("+1 week", $time));

        } elseif($_GET['next'] == 1){
            $time = strtotime($_GET['currentday']);
            $initialDate = date("Y-m-d", strtotime("-1 week", $time));
        } else{
            $initialDate = date('Y-m-d');
        }

        // cut string 
        $initialDatex = substr($initialDate, 0, 7);
        $initialDatex = $initialDatex . '-01';  

        $listasprofpac = Agenda::getListaProfPac($pacInfo->id_pac,$initialDatex);

    }
        // tratamento
        foreach ($listasprofpac as $key => $value) {
            $timestamp = strtotime($value->data. ' ' .$value->hora);
            
            $listasprofpac[$key]->dataInicial = date('Y-m-d H:i:s', $timestamp);
            $listasprofpac[$key]->dataFinal = date("Y-m-d H:i:s", 
            strtotime("+".$value->duracao." hour", $timestamp));
        }

        $listasprofpac2 = $listasprofpac;

//data de agora + 1 mes

$time = strtotime($_GET['currentday']);
$inixx = date("Y-m-d", strtotime("+2 month", $time));
$data1 = $inixx;

$vetor = '';
$vetor2 = array();
$z=0;
foreach ($listasprofpac as $key2 => $value2) {
    if($value2->periodicidade >0){
        $periodicidade = $value2->periodicidade/1440;
        $i=0;
        //$vetor2[$z] = $value2;
        do {

            $vetor= $value2;

            $time = strtotime($vetor->data);
              $periodicidade2 = (($i)*$periodicidade);
            $initialDate2 = date("Y-m-d", strtotime("+$periodicidade2 days", $time));
          //  $vetor->data = $initialDate;

            $x = new stdClass();

            $vetor2[$z] = (object)[
                'nome_prof'=>$vetor->nome_Prof,
                'data'=>$initialDate2,
                'hora'=>$vetor->hora,
                'descricao'=>$vetor->descricao,
                'duracao'=>$vetor->duracao,
                'periodicidade'=>$vetor->periodicidade,
                'id'=>$vetor->id,'dataInicial'=>$vetor->dataInicial,
                'dataFinal'=>$vetor->dataFinal];
            $z++;
            $i++;


        } while(strtotime($initialDate2) < strtotime($data1));

        $vetor=[];

    }else{
        $vetor= $value2;
        $vetor2[$z] =  (object)['nome_prof'=>$vetor->nome_Prof,
        'data'=>$vetor->data,'hora'=>$vetor->hora,'duracao'=>$vetor->duracao,'periodicidade'=>$vetor->periodicidade,'id'=>$vetor->id,'dataInicial'=>$vetor->dataInicial,'dataFinal'=>$vetor->dataFinal];
        $z++;
    }

}


foreach ($vetor2 as $key => $value) {
    $timestamp = strtotime($value->data. ' ' .$value->hora);
    
    $vetor2[$key]->dataInicial = date('Y-m-d H:i:s', $timestamp);
    $vetor2[$key]->dataFinal = date("Y-m-d H:i:s", 
    strtotime("+".$value->duracao." hour", $timestamp));
}
//
$listasprofpac = $vetor2;

foreach($listasprofpac  as $profpac){
    $profpac->data = (new DateTime($profpac->data))->format('d/m/Y');
}
foreach($listasprofpac2  as $profpac2){
    $profpac2->data = (new DateTime($profpac2->data))->format('d/m/Y');
}

} elseif(count($_POST) > 0){

   // $initialDate= $_POST['initialDate'];
   // $listasprofpac = Agenda::getListaProfPac($pacInfo->id_pac,$initialDate);

}




/*
foreach($listasprofpac as $profpac){
    $profpac->hora =  substr($profpac->hora , 0, 5);
}
*/



$title = "Agenda do paciente";

loadTemplateView2('ListaProfPac', [
    'listasprofpac' => $listasprofpac,
    'listasprofpac2' => $listasprofpac2,
    'title' => $title,
    'pacInfo' => $pacInfo,
    'initialDate' => $initialDate,
    'initialview' => $initialview,
    ]);
