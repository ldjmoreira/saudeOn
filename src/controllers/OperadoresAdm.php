<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession();


$exception = null;
$listaOperadores = [];



if(count($_POST) === 0 && isset($_GET['update'])) {

$listaOperadores = Assets::operadores_unic($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $listaOperadores = Assets::operadores_unic($_GET['view']); 

} elseif(count($_POST) > 0) {


    try {

        $dboperadores = new Assets($_POST);

        if($dboperadores->id ) {

            if($dboperadores->password){

                $dboperadores->updateSTR_USER("users",['name','email','password','new_password','confirm_password',
                'start_date']);

                addSuccessMsg('Dados alterados com sucesso!');
                header('Location: ListaOperadoresAdm.php');
                exit();

            }else{


                $dboperadores->updateSTR_USER_noPasw("users",['name','email','start_date']);

                addSuccessMsg('Usuário alterado com sucesso!');
                header('Location: ListaProfissionaisAdm.php');
                exit();

            }
        }else{

            $dboperadores->insertSTR_USER("users",['name','email','password',
            'start_date','codigo_profissional']);

            header('Location: ListaOperadoresAdm.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        array_push($listaOperadores , new Assets($_POST));
        $_POST = [];
    }
}


if (isset($_GET['view'])){
    loadTemplateView3('OperadoresAdmView','leftProfPac',
    ['exception' => $exception,'listaOperadores'=>$listaOperadores]);

}elseif(isset($_GET['update'])) {

    loadTemplateView3('OperadoresAdm','leftProfPac',
    ['exception' => $exception,'listaOperadores'=>$listaOperadores]);


}else{
    loadTemplateView3('OperadoresAdmNew','leftProfPac',
    ['exception' => $exception,'listaOperadores'=>$listaOperadores]);

}
