<?php
session_start();
requireValidSession();
requireValidSessionPac();

$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];
$initialview='dayGridMonth';

 $initialDate= date('Y-m-d');
 // cut string 
 $initialDatex = substr($initialDate, 0, 7);
 $initialDatex = $initialDatex . '-01';  

$listaProfissionais = Agenda::listaProfissionais($user->codigo_profissional,$initialDatex);

    // tratamento 
    foreach ($listaProfissionais as $key => $value) {
        $timestamp = strtotime($value->data. ' ' .$value->hora);
        
        $listaProfissionais[$key]->dataInicial = date('Y-m-d H:i:s', $timestamp);
        $listaProfissionais[$key]->dataFinal = date("Y-m-d H:i:s", 
        strtotime("+".$value->duracao." hour", $timestamp));
    }

    //data de agora + 1 mes
    $data1 = date('Y-m-d', strtotime('+1 month'));

    $vetor = '';
    $vetor2 = array();
    $z=0;
    foreach ($listaProfissionais as $key2 => $value2) {
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
    $listaProfissionais = $vetor2;
    
    foreach($listaProfissionais  as $profpac){
        $profpac->data = (new DateTime($profpac->data))->format('d/m/Y');
    }

$title = "Agenda do profissional";


loadTemplateView2('ListaProfissional', [
    'listaProfissionais' => $listaProfissionais,
    'title' => $title,
    'initialDate' => $initialDate,
    'initialview' => $initialview,
    ]);
