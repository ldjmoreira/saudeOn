<?php
session_start();
$numerotela = tudoIndex;
requireValidSession($numerotela);

$report =  concentrador::get();




loadTemplateView2('SinaisVitais', [
    'report' =>$report,
    ]);
