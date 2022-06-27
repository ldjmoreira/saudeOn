<?php
//ele chama a view do sistema pelo loadview.
// vc da um post com o nome do arquivo e cai no
//if que diz se tá certo ou errado


session_start();
$exception = null;




loadView('notFound',['exception'=> $exception]);
