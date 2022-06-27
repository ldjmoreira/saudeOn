<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);
requireValidSessionPac();

$pacInfo= $_SESSION['paciente'];

$listadeMedicamentos = Agenda::getListaMedicamentosAll($pacInfo->id_pac);

foreach($listadeMedicamentos as $deMedicamentos){
    $deMedicamentos->data = (new DateTime($deMedicamentos->data))->format('d/m/Y');
}


$today = strftimeBRA('%d de %B de %Y', $date);



loadTemplateView2('ListaMedicamentosAll',
[
    'listadeMedicamentos' => $listadeMedicamentos,
    'today'=>$today,
 'data'=>$data,
//'records' => $records
]);

