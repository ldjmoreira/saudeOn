<?php

require_once(dirname(__FILE__,2). '/src/config/config.php');

//require_once('data.php');


$uri = urldecode(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));



if($uri === '/' || $uri === '' || $uri === '/index.php'){
    $uri = '/Home.php';
    
}


require_once(CONTROLLER_PATH . "/{$uri}");


//phpinfo();