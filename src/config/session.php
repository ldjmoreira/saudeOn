<?php

function requireValidSession($requiresAdmin = false) {
    $ola = IP_SERVIDOR_IN;
    
    $user = $_SESSION['user'];

    if(!isset($user)) {
        header('Location: login.php');
        exit();
    } elseif($requiresAdmin && !$user->is_admin) {

        addErrorMsg('<h6><b> Seu perfil nao tem acesso a pagina selecionada!</b></h6>');
        header('Location: EscolhaPaciente.php');
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
            $url = "http://".$ola."/monitorando?".$user->id_Op.'-'. $_SESSION['sound'];
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
