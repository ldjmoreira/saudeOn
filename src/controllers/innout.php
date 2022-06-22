<?php
session_start();
requireValidSession();



$user = $_SESSION['user'];

$records = WorkingHours::loadFromUserAndDate($user->id,date('Y-m-d'));

try{
    $currentTime = strftimeBRA('%H:%M:%S',time());

    if($_POST['forcedTime']){
        $currentTime = $_POST['forcedTime'];
    }

    $records->innout($currentTime);
    addSuccessMsg('Ponto adicionado com sucesso!');
} catch(AppException $e){
addErrorMsg($e->getMessage());

}

header('Location: Home.php');