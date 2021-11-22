<?php
//concerns about: se o operador não estiver preenchido, ou outro campo, pode ter problema
session_start();
requireValidSession();


$exception = null;
$userData = [];
//$pacInfo= $_SESSION['paciente'];
//$user = $_SESSION['user'];


$instituicaos = Profissional::selectDouble("institutos","nomefantasia","id");
$cbos = Profissional::selectTriple("cbo","id","codigo","descricao");


if(count($_POST) === 0 && isset($_GET['update'])) {

$listaProfissional = Assets::profissional_unic($_GET['update']);


} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $listaProfissional = Assets::profissional_unic($_GET['view']); 

} elseif(count($_POST) > 0) {


    try {

        $dbpaciente = new Assets($_POST);


        if($dbpaciente->profissional_id ) {

            if($dbpaciente->login == "Sim"){

            $dbpaciente->updateSTR_PROF("profissionals",['operador',
            'CBO','nome_Prof','email_c','CPF','instituicao','estadoCivil','conselho',
            'dataNasc','UF','endereco','complemento','CEP','bairro','cidade','sexo','estadoCivil',
            'telContato']);

            $dbpaciente->updateSTR_USER("users",['name','email','password','confirm_password',
            'data','descricao','start_date']);

            addSuccessMsg('Usuário alterado com sucesso!');
            header('Location: ListaProfissionaisAdm.php');
            exit();

            } else {

                $dbpaciente->updateSTR_PROF("profissionals",['operador',
                'CBO','nome_Prof','email_c','CPF','instituicao','estadoCivil','conselho',
                'dataNasc','UF','endereco','complemento','CEP','bairro','cidade','sexo','estadoCivil',
                'telContato']);
            
            addSuccessMsg('Usuário alterado com sucesso!');
            header('Location: ListaProfissionaisAdm.php');
            exit();
            }


        } else {

            if($dbpaciente->login == "Sim"){

            $dbpaciente->insertSTR_PROF("profissionals",['operador',
            'CBO','nome_Prof','email_c','CPF','instituicao','estadoCivil','conselho',
            'dataNasc','UF','endereco','complemento','CEP','bairro','cidade','sexo','estadoCivil',
            'telContato']);

            $dbpaciente->insertSTR_USER("users",['name','email','password','confirm_password',
            'data','descricao','start_date','codigo_profissional']);


            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaProfissionaisAdm.php');
            exit();

            }else {

            $dbpaciente->updateSTR("profissionals",['operador',
            'CBO','nome_Prof','email_c','CPF','instituicao','estadoCivil','conselho',
            'dataNasc','UF','endereco','complemento','CEP','bairro','cidade','sexo','estadoCivil',
            'telContato']);
    
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaProfissionaisAdm.php');
            exit();

            }

            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
    }
}

//var_dump($listaProfissional);
//exit;

if (isset($_GET['view'])){
    loadTemplateView3('ProfissionaisAdmView','leftProfPac',
    ['exception' => $exception,'listaProfissional'=>$listaProfissional,
    'instituicaos'=>$instituicaos,
    'cbos'=>$cbos]);
}else{

    loadTemplateView3('ProfissionaisAdm','leftProfPac',
    ['exception' => $exception,'listaProfissional'=>$listaProfissional,
    'instituicaos'=>$instituicaos,
    'cbos'=>$cbos]);
}
