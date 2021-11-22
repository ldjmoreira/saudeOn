<?php

function requireValidSession($requiresAdmin = false) {
    $user = $_SESSION['user'];

    if(!isset($user)) {
        header('Location: login.php');
        exit();
    } elseif($requiresAdmin && !$user->is_admin) {
        addErrorMsg('Acesso negado!');
        header('Location: Home.php');
        exit();
    }else {
        if(isset($_GET['sound'])) {
            //toggle
            if( $_SESSION['sound'] == 1){ 
                $_SESSION['sound'] = 0;
                $_SESSION['icone'] = 'icofont-volume-mute';
                }else {
                $_SESSION['sound'] = 1;
                $_SESSION['icone'] = 'icofont-volume-down';
            }   
            //---
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
            $url = 'http://127.0.0.1:8401/monitorando?'.$user->id_Op.'-'. $_SESSION['sound'];
            $xml = file_get_contents($url, false, $context); // metodo post
            $_SESSION['site'] =  urldecode(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));

           if($xml == "Monitorando"   ) {

            $_SESSION['sound'] = 1;
            $_SESSION['icone'] = 'icofont-volume-down';

            } elseif( $xml == "NoMonitorando") {
                $_SESSION['sound'] = 0;
                $_SESSION['icone'] = 'icofont-volume-mute';
            } else {
                //error
                if( $_SESSION['sound'] == 1){ 
                    $_SESSION['sound'] = 0;
                    $_SESSION['icone'] = 'icofont-volume-mute';
                    }else {
                    $_SESSION['sound'] = 1;
                    $_SESSION['icone'] = 'icofont-volume-down';
                }  
            }
            
        
            $urlgetsession =$_SESSION['site'];
            addSuccessMsg('Usuário selecionado com sucesso!');
            

            header("Location: {$urlgetsession}");    

            unset($_SESSION['site']);

        }
        

    }
}