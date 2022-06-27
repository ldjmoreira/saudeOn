<?php

require_once(dirname(__FILE__,2). '/src/config/config.php');

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));



if($uri === '/' || $uri === '' || $uri === '/index.php'){
    $uri = '/EscolhaPaciente.php';
    
}

if (file_exists(CONTROLLER_PATH . "/{$uri}")) {
    require_once(CONTROLLER_PATH . "/{$uri}");
} else {
    $uri = '/notFound.php';
    require_once(CONTROLLER_PATH . "/{$uri}");
}




//phpinfo();
