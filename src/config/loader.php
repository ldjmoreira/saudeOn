<?php

function loadModel($modelName){
    require_once(MODEL_PATH . "/{$modelName}.php");
}
function loadView($viewName, $params = array()){
    
    if(count($params)>0){
        foreach($params as $key =>$value){
            if(strlen($key)>0){
                ${$key} = $value;
            }
        }

    }
    
    require_once(VIEW_PATH . "/{$viewName}.php");
}

function loadTemplateView2($viewName, $params = array(),$params2=[]){
    
    if(count($params)>0){
        foreach($params as $key =>$value){
            if(strlen($key)>0){
                ${$key} = $value;
            }
        }
    }

    $user = $_SESSION['user'];      // defined in login

    $ipUser = $_SESSION['IPIN'][0]; // defined in login ip_interno:81
    $ipUser1 = $_SESSION['IPIN'][1];// defined in login ip_interno:8401


    if( $user->codigo_profissional == '0') {
        $useInf = "0";
    } else {
        $useInf = $user->id_Op;
    }

    
   require_once(TEMPLATE_PATH . "/header.php");
   require_once(TEMPLATE_PATH . "/left.php");
    require_once(VIEW_PATH . "/{$viewName}.php");
    require_once(TEMPLATE_PATH . "/footer.php");

 
}

function loadTemplateView3($viewName,$leftName, $params = array()){
    
    if(count($params)>0){
        foreach($params as $key =>$value){
            if(strlen($key)>0){
                ${$key} = $value;
            }
        }
 
    }
    
    $user = $_SESSION['user'];// defined in login
    $pacInfo= $_SESSION['paciente'];// defined in login

    $ipUser = $_SESSION['IPIN'][0];// defined in login
    $ipUser1 = $_SESSION['IPIN'][1];// defined in login



    if( $user->codigo_profissional == '0') {
        $useInf = "0";
    } else {
        $useInf = $user->id_Op;
    }


    require_once(TEMPLATE_PATH . "/header.php");
    require_once(TEMPLATE_PATH . "/{$leftName}.php");
    require_once(VIEW_PATH . "/{$viewName}.php");
    require_once(TEMPLATE_PATH . "/footer.php");
 
}
function renderTitle($title,$icon = null){
    require_once(TEMPLATE_PATH . "/title.php");
}