<?php
session_start();
requireValidSession();
requireValidSessionPac();

$user = $_SESSION['user'];
$pacInfo= $_SESSION['paciente'];
$ver = $_SESSION['sinal'];
$position=[];
$infSinaisVitais=[];
$tam=10;
$initial =2;
$desenho=0;
// carregamento
//$infSinaisVitais = Paciente::selectDouble("sinais_vitais_tipos","tipo","descricao");
array_push($infSinaisVitais, new Paciente(['descricao'=>'Pressão Arterial','tipo'=>'2']));
array_push($infSinaisVitais, new Paciente(['descricao'=>'Frequência Cardiaca','tipo'=>'3']));
array_push($infSinaisVitais, new Paciente(['descricao'=>'Temperatura Corporal','tipo'=>'4']));
array_push($infSinaisVitais, new Paciente(['descricao'=>'Saturação de Oxigênio','tipo'=>'5']));
array_push($infSinaisVitais, new Paciente(['descricao'=>'Frequência Respiratória','tipo'=>'6']));




//obtem os tipos de sinais vitais

$infPaciente = Paciente::getOneFix("monitoramentos",['paciente'=>$pacInfo->id_pac]);
// obtem informações do paciente selecionado

$infthereis = Paciente::thereis();




if(count($_POST) === 0 ) {
    if( $initial != $infthereis) { $initial =$infthereis;}

    $totalSinal = Paciente::contSinal($infPaciente->concentrador,$initial);

    $limit = $tam;

    $pages = ceil($totalSinal / $limit);


    for ( $j=1; $j<=$pages;$j++){
        $periods[$j] = "{$j}" ."° página";
    }   

//$offset = (1-1)* $limit;//

$pesquisas = Paciente::pesquisa($initial,$infPaciente->concentrador,0,$limit );



foreach($pesquisas as $pesquisa){
    $pesquisa->data = (new DateTime($pesquisa->data))->format('d/m/Y');
}

 $_SESSION['sinal'] = $initial;
 
 $position = 1;

} elseif(count($_POST) > 0) {
    $desenho = $_POST['desenho'];
    try {

        if($_POST['sinal'] != $_SESSION['sinal'] ) {

        $totalSinal = Paciente::contSinal($infPaciente->concentrador,$_POST['sinal']);
            //obtem o total da pesquisa

        $limit = $tam;
        $pages = ceil($totalSinal / $limit);

        
        for ( $j=1; $j<=$pages;$j++){
        $periods[$j] = "{$j}" ."° página";
        }
        $position = 1;
        $offset = ($position-1) * $limit;

        $pesquisas = Paciente::pesquisa($_POST['sinal'],$infPaciente->concentrador,0,$limit );

        foreach($pesquisas as $pesquisa){
            $pesquisa->data = (new DateTime($pesquisa->data))->format('d/m/Y');
        }

        $_SESSION['sinal'] =  $_POST['sinal'];
            


        } else {


        $totalSinal = Paciente::contSinal($infPaciente->concentrador,$_POST['sinal']);
        //obtem o total da pesquisa



        $limit = $tam;
        $pages = ceil($totalSinal / $limit);

        
        for ( $j=1; $j<=$pages;$j++){
        $periods[$j] = "{$j}" ."° página";
        }

         $position = $_POST['period'] ;
         $offset = ($_POST['period']-1) * $limit;



        $pesquisas = Paciente::pesquisa($_POST['sinal'],$infPaciente->concentrador,$offset,$limit );

        foreach($pesquisas as $pesquisa){
            $pesquisa->data = (new DateTime($pesquisa->data))->format('d/m/Y');
        

        
        }



            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
    }
}


foreach($pesquisas as $pesquisa){

    if($pesquisa->tipo == '2') {
        $pesquisa->descricao = "Pressão Arterial";
    
    }

}






$title = "Histórico de sinais vitais";



loadTemplateView2('Ocorrencias', [
    'pesquisas' => $pesquisas,
    'periods' => $periods,
    'position' => $position,
    'pacInfo' => $pacInfo,
    'infSinaisVitais' => $infSinaisVitais,
    'title' => $title,
    'desenho' => $desenho
    ]);
