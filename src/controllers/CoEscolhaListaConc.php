<?php
session_start();
requireValidSession();


$user = $_SESSION['user'];

if(isset($_GET['delete'])) {
    try {

        if(empty($_GET['nome'])) {

            $confirmacao = equipo_concentrador::deleteById($_GET['delete']);

            if($confirmacao){
                addSuccessMsg('Usuário excluído com sucesso.');
                header('Location: CoEscolhaListaConc.php');
                exit;
                
            }else {
                addErrorMsg('Erro ao excluir o concentrador.');  
                header('Location: CoEscolhaListaConc.php');
                exit;
            }

        }else {

            
            addErrorMsg('Não foi possível apagar. O concentrador está associado a um usuário');
            
        }
        
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}

$listasConcentrador = Paciente::paciente_concentrador2();



foreach($listasConcentrador as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}

$title = "Escolha o paciente";


loadTemplateView2('ListaConcentrador', [
    'listasConcentrador' => $listasConcentrador,
    'title' => $title,
    ]);
