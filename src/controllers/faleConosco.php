<?php
//ele chama a view do sistema pelo loadview.
// vc da um post com o nome do arquivo e cai no
//if que diz se tá certo ou errado

loadModel('login');
session_start();
$exception = null;


if(count($_POST) > 0) {
    $login = new Login($_POST);



    try {
        $user = $login->checkLogin();

        $_SESSION['user'] = $user;

        $IPuser = $login->checkIP();

        $_SESSION['IPIN'] = $IPuser;

        header("Location: Home.php");
        
    } catch(AppException $e) {
        $exception = $e;
    }
    
}

echo $_SERVER['REMOTE_ADDR'];
echo "\n";
echo "v: 1.1.10";
loadView('faleConosco', $_POST+['exception'=> $exception]);