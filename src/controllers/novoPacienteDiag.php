<?php
//not used
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);



$date = (new DateTime())->getTimestamp();
$today = strftimeBRA('%d de %B de %Y', $date);


loadTemplateView2('novoPaciente',
['today'=>$today
//'records' => $records
]);

