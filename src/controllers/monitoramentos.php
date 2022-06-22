<?php
session_start();
requireValidSession();
requireValidSessionPac();

$pacInfo= $_SESSION['paciente'];

$listasConcentrador = Paciente::paciente_concentrador3($pacInfo->id_pac);


foreach($listasConcentrador as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}

$data = $listasConcentrador->concentrador;



$date = (new DateTime())->getTimestamp();
$today = strftimeBRA('%d de %B de %Y', $date);


loadTemplateView2('Monitoramentos',
['today'=>$today,
'pacInfo'=>$pacInfo,
 'data'=>$data,
//'records' => $records
]);

