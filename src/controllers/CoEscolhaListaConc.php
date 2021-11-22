<?php
session_start();
requireValidSession();


$user = $_SESSION['user'];

if(isset($_GET['delete'])) {
    try {
        if(empty($_GET['nome'])) {

            Concentrador::deleteById($_GET['delete']);
            header('Location: CoEscolhaListaConc.php');
            addSuccessMsg('Usuário excluído com sucesso.');

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
