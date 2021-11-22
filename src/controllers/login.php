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
        $_SESSION['sound'] = 1;
        $_SESSION['icone'] = 'icofont-volume-down';

        $IPuser = $login->checkIP();

        $_SESSION['IPIN'] = $IPuser;
        $currentDate = (new DateTime())->format('Y-m-d H:i:s');

        $dbLoginn = new Model(['name'=>$user->name,'ip'=>$_SERVER['REMOTE_ADDR'],'date'=>$currentDate]);

        $dbLoginn->insertSTR("users_connections",['name','ip','date']);



        header("Location: Home.php");
        
    } catch(AppException $e) {
        $exception = $e;
    }
    
}

echo $_SERVER['REMOTE_ADDR'];
echo "\n";
echo "v: 2.0.0.b";

loadView('login', $_POST+['exception'=> $exception]);