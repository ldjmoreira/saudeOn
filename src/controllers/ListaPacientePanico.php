<?php
session_start();
requireValidSession();
$exception = null;
$user = $_SESSION['user'];


if(count($_POST) === 0 && isset($_GET['update'])) {
//-------------------
    $opts = array('http' =>
    array(
      'method'  => 'POST',
      'header'  => "Content-Type: text/xml\r\n",
      'content' => "",
      'timeout' => 60
    )
  );
//----------
$context  = stream_context_create($opts);
$url = 'http://127.0.0.1:8401/reconhecer?'.$_GET['concentrador'];
$xml = file_get_contents($url, false, $context); // metodo post

//$xml = file_get_contents($url, false, $context, 0, 40000);


 //   $xml = file_get_contents("http://192.168.1.10:8401/reconhecer?" . $_GET['concentrador']); //metodo get
    
    
    
    try {
        if($xml == "Recebido"){

        Paciente::PanicoCiencia("ocorrencia_emergencias",['ciencia'],$_GET['update']);
        addSuccessMsg('Reconhecimento de pânico feito com sucesso.');
    }else {
        
        throw new AppException('Problema na comunicação com o servidor'); 
    }
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}


$listasPacPan = Paciente::pacientePanico2($user->id_Op);


foreach($listasPacPan as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}

loadTemplateView2('ListaPacientePanico', [
    'exception' =>$exception,
    'listasPacPan' => $listasPacPan,
    ]);
