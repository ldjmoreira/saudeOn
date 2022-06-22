
<?php
session_start();
requireValidSession(true);

$exception = null;
$paciente =[];
$ola = IP_SERVIDOR_IN;
//$concentrador = Profissional::selectDouble("monitoramentos","concentrador","id");

//$concentradorPoss = Profissional::selectDoubleCond("monitoramentos","concentrador","id","paciente","0");

//$concentradorBanco = Concentrador::getOne(['paciente' => $_GET['update']],"concentrador");
//
/*
$db_sinais =  Model::getOneFix2('sinais_vitais_tipos');
var_dump($db_sinais );
exit;
*/
//


if(count($_POST) === 0 && isset($_GET['update'])) {

    $paciente = Paciente::getListaPacAll($_GET['update']);



} elseif(count($_POST)=== 0 && isset($_GET['view'])) {

    $paciente = Paciente::getListaPacAll($_GET['view']);
   

} elseif(count($_POST) > 0) {
    try {
        $algo = idPacienteNumber();

        $dbpaciente = new Paciente($_POST);

        if($dbpaciente->id) {


                $dbpaciente->updateSTR("pacientes",['name','email','nomeSocial','dataNasc','prontuario','dataAdmissao',
                'estadoCivil','cartaoSUS','CPF','CID','sexo','cidadeNasc','cor','nomeResponsavel','nomeMae','altura','peso',
                'tipoSangue','queda','saturacaoO2','temperaturaCorporal','frequenciaCardiaca','pressaoSistolica','pressaoDiastolica',
                'maoDominante','endereco','cep','bairro','complemento','municipio','UF','telCelular','telContato','observacao',]);
                
                addSuccessMsg('Usuário alterado com sucesso!');
                header("Location: novoPaciente.php?update=$dbpaciente->id");
                exit();



        } else {
            
            $idPaciente=$dbpaciente->insert();


            $dbpaciente->concentrador = idPacienteNumber();


            $dbmonitoramento= new Concentrador(['id'=>null,'paciente'=>$dbpaciente->id,'concentrador'=>$dbpaciente->concentrador,'datainicial'=>$dbpaciente->dataAdmissao]);
            $dbmonitoramento->insertto_ten("monitoramentos",['id','paciente','concentrador','datainicial']);

            $db_sinais =  Model::getOneFix2('sinais_vitais_tipos');

    //        $url = "http://" .$ola."/avisando?".$_SESSION['paciente']->concentrador ."-3" ;
    //        $xml = file_get_contents($url);


            //data de hoje
            $data = date('Y-m-d');
            foreach ($db_sinais as $key => $value) {

                if($value->tipo == 2){
                    $maximo=145;
                    $minimo=110;
                }elseif ($value->tipo == 3){
                    $maximo=120;
                    $minimo=50;
                }elseif ($value->tipo == 4){
                    $maximo=37.5;
                    $minimo=35;
                }elseif ($value->tipo == 5){
                    $maximo=101;
                    $minimo=90;
                }elseif ($value->tipo == 6){
                    $maximo=40;
                    $minimo=10;
                }elseif ($value->tipo == 7){
                    $maximo=95;
                    $minimo=70;
                }



                $dbmonitoramento= new Concentrador([
                'descricao'=>$value->descricao,
                'tipo'=>$value->tipo,
                'maximo'=>$maximo,
                'minimo'=>$minimo,
                'unidade'=>$value->unidade,
                'operador'=> $dbpaciente->operador,
                'paciente'=>$idPaciente,
                'data'=>$data,
                'alarme_ativo'=>'0', 
                ]
            );

                $dbmonitoramento->insertto_ten("sinal_vitals",['descricao',
                'tipo','maximo','minimo','unidade','operador','paciente',
                'data','alarme_ativo']);
    
            }

            // cadastro do registro de sinais vitais

            $db_sinais =  Model::getOneFix2('sinais_vitais_tipos');

            //data de hoje
            $data = date('Y-m-d');
            $log=[];
            foreach ($db_sinais as $key => $value) {
                if($value->tipo == 7){break;}

                if($value->tipo == 2){
                    $ativo = 0;
                }else{
                    $ativo = 1;
                }

                if($key == 0){
                    $tempo = 30;
                }else {
                    $tempo = 30;
                }
                
                $dbmonitoramento= new Concentrador([
                'paciente'=>$idPaciente,
                'operador'=> $dbpaciente->operador,
                'cod_sinal_vital' => $value->tipo,
                'intervalo' => $tempo,
                'registro_ativo' => $ativo,
                'ciente'=>'0', 
                ]


                
            );
            
                
                $dbmonitoramento->insertto_ten("programacao_sinais_vitais_detalhes",
                ['paciente','operador','cod_sinal_vital',
                'intervalo','registro_ativo','ciente']);
                
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

function idPacienteNumber() {
    //
       $thisYear = date("Y");
       $thisYear = '2024';
       $section = new assets('');

       $yearSection = $section->getYear();

        if($thisYear != $yearSection ){

            $yearSection = $section->SetYear($thisYear);
            $section->SetNumberzero();
        }
    $number = $section->getNumber()  ;      
   
   $int_value = intval( $number);
   $int_value = $int_value+ 1;
   $number =strval($int_value);
   $number_lenght = strlen($number);
   $zero='';
   
   if($number_lenght == 1) {
       $zero = '000';
   }
   if($number_lenght == 2) {
       $zero = '00';
   }
   if($number_lenght == 3) {
       $zero = '0';
   }
   if($number_lenght == 4) {
       $zero = '';
   }
   
   $escrita = $zero . $number;

   $resp= $section->setNumber($escrita)  ; 

   if($resp) {

    $today = date("Y");
    $section = $today . $escrita;

    return $section;
   }else{
       return 'error';
   }
   


   }

