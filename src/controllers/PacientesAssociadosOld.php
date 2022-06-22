<?php
session_start();
requireValidSession(true);


$user = $_SESSION['user'];


$exception = null;
if(isset($_GET['delete'])) {


    try {

        $dbpaciente= new Paciente(['softdelete'=>1,'id'=>$_GET['delete']]);

        $dbpaciente->update_("pacientes",['softdelete'],"id",$dbpaciente->id);
        if(!empty($_GET['concentrador']) ){

            $dbmonitoramento= new Concentrador(['id'=>null,'paciente'=>0,'concentrador'=>$_GET['concentrador']]);
        
            $dbmonitoramento->update_("monitoramentos",['paciente'],"concentrador",$dbmonitoramento->concentrador);
            
        }
        
        addSuccessMsg('Usuário removido com sucesso.');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {// funcao procura palavra na string
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}
    $listasPaciente = concentrador::paciente_Associados();

    $x='';
    $i=0;
    $z=0;
    foreach ($listasPaciente as $key => $value) {
        if($key == 0){
        $x = $value->numero;
        }

        if($x==$value->numero){
            
            $lista_dividida[$i][$z] = [
                'name'=>$value->name,
                'id'=>$value->id,
                'concentrador'=>$value->concentrador,
                'sensor'=>$value->sensor,
                'paciente'=>$value->paciente,
                'numero'=>$value->numero
            ];

            $z++;
        }else {
            $i++;
            $z=0;
            $x = $value->numero;
            $lista_dividida[$i][$z] =[
                'name'=>$value->name,
                'id'=>$value->id,
                'concentrador'=>$value->concentrador,
                'sensor'=>$value->sensor,
                'paciente'=>$value->paciente,
                'numero'=>$value->numero
            ];
            $z++;
        }

    }


/*
foreach($listasPaciente as $paciente){
    $paciente->dataAdmissao = (new DateTime($paciente->dataAdmissao))->format('d/m/Y');
    if($paciente->end_date){
        $paciente->end_date = (new DateTime($paciente->end_date))->format('d/m/Y');
    }
}
*/


loadTemplateView2('PacientesAssociados', [
    'listasPaciente' => $listasPaciente,
    'lista_dividida' => $lista_dividida,
    'exception'=> $exception
    ]);
