<?php

session_start();
requireValidSession();
$exception = null;
$user = $_SESSION['user'];
$ola = IP_SERVIDOR_IN;

//$pacInfo= $_SESSION['paciente'];// defined in login

//$data = $_GET['concentrador'];

 //$xml = file_get_contents("http://192.168.1.20:8401/conectados"); // existe esse método e o metodo
 $xml = file_get_contents("http://" .$ola."/conectados"); // existe esse método e o metodo
 //var_dump($xml);
 //exit;
 //ver https://stackoverflow.com/questions/959063/how-to-send-a-get-request-from-php
//$xml = "122U12-13";
//127.0.0.1

$pieces = explode("U", $xml);

//grupo dos concentradores
$concentradoresid= explode("-", $pieces[0]);

if($concentradoresid[0]== ""){

    array_pop($concentradoresid);

}
//grupo dos usuarios
$userNumber= explode("-", $pieces[1]);

if($userNumber[0]== ""){

    array_pop($userNumber);

}





//$date = (new DateTime())->getTimestamp();
//$today = strftimeBRA('%d de %B de %Y', $date);

if($concentradoresid){

    $pacientesid= Model::getPacienteMon("monitoramentos",$concentradoresid,"concentrador","paciente");
    $pacientesMon= Model::getPacienteInf("pacientes",$pacientesid,"id");

    foreach($pacientesMon as $paciente){
        $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    }
}

if( isset($_GET['id'])) {

    $pacienteSelec = new Paciente($_GET);

    try {
        $Selec= $pacienteSelec->checkLogin();

        $_SESSION['paciente'] = $Selec; //contem informações Id,name,dataNasc
        header("Location: monitoramentos.php");  

    } catch(AppException $e) {
        $exception = $e;
    }   
}

if( $_GET['update'] == 1) {

    try {

        if($userNumber){

            $operadoresMon= Model::getPacienteInf("users",$userNumber,"id");
        
            foreach($operadoresMon as $operador){
                $operador->start_date = (new DateTime($operador->start_date))->format('d/m/Y');
                $operador->password = "";
            }
            unset($pacientesMon);
        }


    } catch(AppException $e) {
        $exception = $e;
    }   
}

loadTemplateView2('Home',
['today'=>$today,
'pacInfo'=>$pacInfo,
'userNumber'=>$userNumber,
'operadoresMon'=>$operadoresMon,
'pacientesMon'=>$pacientesMon,
'concentradoresid'=>$concentradoresid,
//'records' => $records
],$shirt);



