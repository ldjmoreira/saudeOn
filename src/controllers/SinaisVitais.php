<?php
session_start();
requireValidSession(true);

$report =  concentrador::get();




loadTemplateView2('SinaisVitais', [
    'report' =>$report,
    ]);
