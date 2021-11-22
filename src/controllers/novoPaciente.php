
<?php
session_start();
requireValidSession(true);

$exception = null;
$paciente =[];

//$concentrador = Profissional::selectDouble("monitoramentos","concentrador","id");

$concentradorPoss = Profissional::selectDoubleCond("monitoramentos","concentrador","id","paciente","0");

$concentradorBanco = Concentrador::getOne(['paciente' => $_GET['update']],"concentrador");



if(count($_POST) === 0 && isset($_GET['update'])) {

    $paciente = Paciente::getListaPacAll($_GET['update']);



} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $paciente = Paciente::getListaPacAll($_GET['view']);
   

} elseif(count($_POST) > 0) {
    try {

        $dbpaciente = new Paciente($_POST);
        
        if($dbpaciente->id) {

            if(!$dbpaciente->concentrador){
                $dbpaciente->updateSTR("pacientes",['name','email','nomeSocial','dataNasc','prontuario','dataAdmissao',
                'estadoCivil','cartaoSUS','CPF','CID','sexo','cidadeNasc','cor','nomeResponsavel','nomeMae','altura','peso',
                'tipoSangue','queda','saturacaoO2','temperaturaCorporal','frequenciaCardiaca','pressaoSistolica','pressaoDiastolica',
                'maoDominante','endereco','cep','bairro','complemento','municipio','UF','telCelular','telContato','observacao',]);
                
                addSuccessMsg('Usuário alterado com sucesso!');
                header('Location: ListaPaciente.php');
                exit();
            } else{



                if($dbpaciente->concentrador == $dbpaciente->concentradorBanco){

                    $dbpaciente->updateSTR("pacientes",['name','email','nomeSocial','dataNasc','prontuario','dataAdmissao',
                    'estadoCivil','cartaoSUS','CPF','CID','sexo','cidadeNasc','cor','nomeResponsavel','nomeMae','altura','peso',
                    'tipoSangue','queda','saturacaoO2','temperaturaCorporal','frequenciaCardiaca','pressaoSistolica','pressaoDiastolica',
                    'maoDominante','endereco','cep','bairro','complemento','municipio','UF','telCelular','telContato','observacao',]);
                    
                    addSuccessMsg('Usuário alterado com sucesso!');
                    header('Location: ListaPaciente.php');
                    exit();
                } else {

                $dbpaciente->updateSTR("pacientes",['name','email','nomeSocial','dataNasc','prontuario','dataAdmissao',
                'estadoCivil','cartaoSUS','CPF','CID','sexo','cidadeNasc','cor','nomeResponsavel','nomeMae','altura','peso',
                'tipoSangue','queda','saturacaoO2','temperaturaCorporal','frequenciaCardiaca','pressaoSistolica','pressaoDiastolica',
                'maoDominante','endereco','cep','bairro','complemento','municipio','UF','telCelular','telContato','observacao',]);

                $dbmonitoramento= new Concentrador(['id'=>null,'paciente'=>$dbpaciente->id,'concentrador'=>$dbpaciente->concentrador,'datainicial'=>$dbpaciente->dataAdmissao]);

                $dbmonitoramento->update_("monitoramentos",['paciente','datainicial'],"concentrador",$dbpaciente->concentrador);
                //then

                    if($dbpaciente->concentradorBanco){

                    $dbmonitoramento->paciente = 0;
                    $dbmonitoramento->update_("monitoramentos",['paciente','datainicial'],"concentrador",$dbpaciente->concentradorBanco);

                    addSuccessMsg('Usuário alterado com sucesso!');
                    header('Location: ListaPaciente.php');
                    exit();
                    }
                    addSuccessMsg('Usuário alterado com sucesso!');
                    header('Location: ListaPaciente.php');
                    exit();
                }
            }


        } else {

            $dbpaciente->insert();

            if(!empty($dbpaciente->concentrador)){
           // $dbevolucao = new Exame(['evolucao_id'=>null,'paciente'=>$dbpaciente->id]);
            //$dbevolucao->insertto_ten("evolucaos",['evolucao_id','paciente']);


            $dbmonitoramento= new Concentrador(['id'=>null,'paciente'=>$dbpaciente->id,'concentrador'=>$dbpaciente->concentrador,'datainicial'=>$dbpaciente->dataAdmissao]);

            $dbmonitoramento->update_("monitoramentos",['paciente','datainicial'],"concentrador",$dbpaciente->concentrador);
           // $dbmonitoramento->insertto_ten("monitoramentos",['id','paciente','concentrador','datainicial']);
            }
            addSuccessMsg('Usuário cadastrado com sucesso!');
            $_POST = [];
            header('Location: ListaPaciente.php');
            exit();
            
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        array_push($paciente, new Paciente($_POST));
        $_POST = [];
    }
}




if (isset($_GET['view'])){
    loadTemplateView3('novoPacienteRead','leftPaciente',
    ['exception' => $exception,'paciente'=>$paciente,'concentradorposs'=>$concentradorPoss]);

} elseif(isset($_GET['update'])) {

    loadTemplateView3('novoPacienteDiag','leftPaciente',
    ['exception' => $exception,'paciente'=>$paciente,'concentradorPoss'=>$concentradorPoss
    ,'concentradorBanco'=>$concentradorBanco]);
    
}else{

    loadTemplateView3('novoPaciente','leftPaciente',
    ['exception' => $exception,'paciente'=>$paciente,'concentradorPoss'=>$concentradorPoss]);
}


