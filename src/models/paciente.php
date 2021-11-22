<?php

class Paciente extends Model {
    protected static $tableName = 'pacientes';
    protected static $columns = [
        'id',
        'name',
        'email',
        'nomeSocial',
        'dataNasc',
        'prontuario',
        'dataAdmissao',
        'estadoCivil',
        'cartaoSUS',
        'CPF',
        'CID',
        'sexo',
        'cidadeNasc',
        'cor',
        'nomeResponsavel',
        'nomeMae',
        'altura',
        'peso',
        'tipoSangue',
        'queda',
        'saturacaoO2',
        'temperaturaCorporal',
        'frequenciaCardiaca',
        'pressaoSistolica',
        'pressaoDiastolica',
        'maoDominante',
        'endereco',
        'cep',
        'bairro',
        'complemento',
        'municipio',
        'UF',
        'telCelular',
        'telContato',
        'observacao',
        
    ];
    



    public static function pesquisa($arg1=2,$arg2,$arg3=0,$arg4){
        $objects=[];
        $sql ="SELECT 
        ocorrencia_sinais_vitais.id,
        ocorrencia_sinais_vitais.sinalVital,
        sinal_vitals.descricao,
        sinal_vitals.tipo,
        ocorrencia_sinais_vitais.data,
        ocorrencia_sinais_vitais.hora,
        ocorrencia_sinais_vitais.valor1,
        ocorrencia_sinais_vitais.valor2,
        ocorrencia_sinais_vitais.concentrador
        FROM ocorrencia_sinais_vitais 
        INNER JOIN sinal_vitals ON ocorrencia_sinais_vitais.sinalVital = sinal_vitals.id 
        WHERE ocorrencia_sinais_vitais.sinalVital = $arg1 AND ocorrencia_sinais_vitais.concentrador = $arg2 
        order by ocorrencia_sinais_vitais.id DESC LIMIT $arg4 OFFSET $arg3
        ";

        $result = Database::getResultFromQuery($sql);

        if($result){
            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

            return $objects;
        }
    }

    public static function thereis(){
        $objects=[];
        $sql = "SELECT sinalVital
         FROM ocorrencia_sinais_vitais
          ORDER BY ocorrencia_sinais_vitais.sinalVital ASC LIMIT 1";


        $result = Database::getResultFromQuery($sql);

        if($result){

            $row = $result->fetch_assoc();

            return $row['sinalVital'];



        }
    }

    public static function contSinal($arg,$arg2=2){
        $sql = "SELECT COUNT(*) 
        FROM ocorrencia_sinais_vitais
        WHERE sinalVital = $arg2 AND concentrador = $arg ";


        $result = Database::getResultFromQuery($sql);

        if($result){

            

            $row = $result->fetch_assoc();

            return $row['COUNT(*)'];



        }
    }

    public static function getEmergencia($arg){
        $objects=[];
        $sql ="SELECT 
        ocorrencia_emergencias.id,
        ocorrencia_emergencias.concentrador,
        ocorrencia_emergencias.horario,
        ocorrencia_emergencias.datainclusao,
        ocorrencia_emergencias.dataCiencia,
        ocorrencia_emergencias.descricao,
        users.name
        FROM ( 
            ( users 
            INNER JOIN ocorrencia_emergencias ON ocorrencia_emergencias.operador = users.id ) 
            INNER JOIN monitoramentos ON monitoramentos.concentrador = ocorrencia_emergencias.concentrador ) 
            INNER JOIN pacientes ON pacientes.id = monitoramentos.paciente 
        WHERE ocorrencia_emergencias.ciencia = 1 AND ocorrencia_emergencias.id  = $arg 
        ";

        $result = Database::getResultFromQuery($sql);

        if($result){
            $class = get_called_class();

            $row = $result->fetch_assoc();
            return new $class($row);

            $result = Database::getResultFromQuery($sql);

        }
    }



    public static function getListaEmergencia($arg){
        $objects=[];
        $sql ="SELECT 
        ocorrencia_emergencias.id,
        ocorrencia_emergencias.concentrador,
        ocorrencia_emergencias.horario,
        ocorrencia_emergencias.descricao,
        ocorrencia_emergencias.datainclusao,
        ocorrencia_emergencias.dataCiencia,
        users.name
        FROM ( 
            ( users 
            INNER JOIN ocorrencia_emergencias ON ocorrencia_emergencias.operador = users.id ) 
            INNER JOIN monitoramentos ON monitoramentos.concentrador = ocorrencia_emergencias.concentrador ) 
            INNER JOIN pacientes ON pacientes.id = monitoramentos.paciente 
        WHERE ocorrencia_emergencias.ciencia = 1 AND pacientes.id  = $arg 
        ";

        $result = Database::getResultFromQuery($sql);

        if($result){
            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

            return $objects;
        }
    }

    

    public function updateSTR($tableName1,$columns) {
        if($tableName1 == "pacientes") {
            $this->validatePAC();


            if(!$this->id) $this->id = null;
            if(!$this->saturacaoO2) $this->saturacaoO2 = null;
            if(!$this->temperaturaCorporal) $this->temperaturaCorporal = null;
            if(!$this->frequenciaCardiaca) $this->frequenciaCardiaca = null;
            if(!$this->pressaoSistolica) $this->pressaoSistolica = null;
            if(!$this->pressaoDiastolica) $this->pressaoDiastolica = null;
            if(!$this->operador) $this->operador = null;
            //  $this->is_admin = $this->is_admin ? 1 : 0; 

        }

   
           return parent::updateSTR($tableName1,$columns);
       }
       public function insertSTR($tableName,$columns){
        if($tableName == "pacientes") {
            $this->validatePAC();

            if(!$this->id) $this->id = null;
            if(!$this->saturacaoO2) $this->saturacaoO2 = null;
            if(!$this->temperaturaCorporal) $this->temperaturaCorporal = null;
            if(!$this->frequenciaCardiaca) $this->frequenciaCardiaca = null;
            if(!$this->pressaoSistolica) $this->pressaoSistolica = null;
            if(!$this->pressaoDiastolica) $this->pressaoDiastolica = null;
            if(!$this->operador) $this->operador = null;
        }
 
        if(!$this->operador) $this->operador = null;
         if(!$this->id) $this->id = null;
         if(!$this->ciente) $this->ciente = null;
         //if(!$this->end_date) $this->end_date = null;
         return parent::insertSTR($tableName,$columns);
     }

    public static function getListaPacAll($args){
        $objects=[];
        $sql = "SELECT 
        pacientes.id,
        pacientes.name,
        monitoramentos.concentrador,
        pacientes.email,
        pacientes.nomeSocial,
        pacientes.dataNasc,
        pacientes.prontuario,
        pacientes.dataAdmissao,
        pacientes.estadoCivil,
        pacientes.cartaoSUS,
        pacientes.CPF,
        pacientes.CID,
        pacientes.sexo,
        pacientes.cidadeNasc,
        pacientes.cor,
        pacientes.nomeResponsavel,
        pacientes.nomeMae,
        pacientes.altura,
        pacientes.peso,
        pacientes.tipoSangue,
        pacientes.queda,
        pacientes.saturacaoO2,
        pacientes.temperaturaCorporal,
        pacientes.frequenciaCardiaca,
        pacientes.pressaoSistolica,
        pacientes.pressaoDiastolica,
        pacientes.maoDominante,
        pacientes.endereco,
        pacientes.cep,
        pacientes.bairro,
        pacientes.complemento,
        pacientes.municipio,
        pacientes.UF,
        pacientes.telCelular,
        pacientes.telContato,
        pacientes.observacao
        FROM pacientes
        LEFT JOIN monitoramentos ON monitoramentos.paciente = pacientes.id
        WHERE pacientes.id= $args 
        ORDER BY pacientes.id DESC";

        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

            return $objects;
        }


    }


    public static function selectDouble($tableName1,$column1,$column2) {
        $objects = [];
        $sql = "       SELECT $column1 , $column2
        FROM $tableName1 ";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

            return $objects;
        }
    }

    public function checkLogin(){

        $user = self::SelectOne2($this->id); //aqui tem o objeto user com todos as propriedades que são as colunas da linha especifiac do usuario

        if($user) {
            return $user;
        } else{
        throw new AppException('Problema com usuário cadastrado'); 
        }
    }
    
    public static function SelectOne2($arg2){
        $objects=[];
        $sql = "  SELECT 
        pacientes.id AS id_pac, 
        pacientes.name, 
        pacientes.dataNasc 
        FROM pacientes WHERE pacientes.id = $arg2";

        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            return $result ? new $class($result->fetch_assoc()) : null;

    

            return $result ;
        }

    }

    public static function SelectOne($arg2){
        $objects=[];
        $sql = "SELECT pacientes.id, pacientes.name, pacientes.dataNasc  
        FROM pacientes
        WHERE pacientes.id = $arg2";

        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }

    }
    
    public static function pacientePanico2($arg){
        $objects=[];
        $sql ="SELECT 
        ocorrencia_emergencias.id,
        pacientes.name,
        pacientes.dataAdmissao,
        pacientes.prontuario,
        pacientes.telContato,
        monitoramentos.concentrador,
        ocorrencia_emergencias.descricao,
        ocorrencia_emergencias.ciencia
        FROM monitoramentos 
        INNER JOIN pacientes ON monitoramentos.paciente = pacientes.id 
        INNER JOIN ocorrencia_emergencias ON monitoramentos.concentrador= ocorrencia_emergencias.concentrador 
        WHERE ocorrencia_emergencias.ciencia = 0 AND ocorrencia_emergencias.operador = $arg 
        ";

        $result = Database::getResultFromQuery($sql);

        if($result){
            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

            return $objects;
        }
    }

    public static function paciente_concentrador3($arg){
        $objects=[];
        $class = get_called_class();
        $sql="SELECT pacientes.id,
        pacientes.name,
        pacientes.dataAdmissao,
        pacientes.prontuario,
        monitoramentos.concentrador
        FROM monitoramentos 
        INNER JOIN pacientes ON monitoramentos.paciente = pacientes.id
        WHERE monitoramentos.paciente = $arg";
        
        $result = Database::getResultFromQuery($sql);

        return $result ? new $class($result->fetch_assoc()) : null;
    }

    public static function paciente_concentrador2(){
        $objects=[];
        $sql="
        SELECT 
        monitoramentos.id,
        pacientes.name,
        pacientes.dataAdmissao,
        pacientes.prontuario,
        monitoramentos.concentrador
        FROM monitoramentos 
        LEFT JOIN pacientes ON monitoramentos.paciente = pacientes.id 
        ";
        $result = Database::getResultFromQuery($sql);

        if($result){
            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }


            return $objects;
        }
    }

    public static function paciente_Lista(){
        $objects = [];

        $result = Database::getResultFromQuery("
        SELECT pacientes.id,pacientes.name,
        pacientes.dataAdmissao,pacientes.prontuario,
         monitoramentos.concentrador
          FROM pacientes 
          LEFT JOIN monitoramentos ON pacientes.id = monitoramentos.paciente
          WHERE pacientes.softdelete = 0
          ORDER BY pacientes.id DESC
        ");

        if($result){
            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    
            return $objects;
        }
    }
    
    public static function paciente_concentrador(){

        $result = Database::getResultFromQuery("
        SELECT ocorrencia_emergencias.id,
        pacientes.name,
        pacientes.dataAdmissao,
        pacientes.prontuario,
        monitoramentos.concentrador,
        ocorrencia_emergencias.ciencia
        FROM monitoramentos 
        INNER JOIN pacientes ON monitoramentos.paciente = pacientes.id 
        INNER JOIN ocorrencia_emergencias ON monitoramentos.concentrador= ocorrencia_emergencias.concentrador 
        WHERE ocorrencia_emergencias.ciencia = 0

        ");

        if($result){
            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }


            return $objects;
        }
    }
    public static function PanicoCiencia($tableName1,$columns, $arg2){
        
        $sql = "UPDATE " . $tableName1 . " SET ";
        foreach($columns as $col) {
            $sql .= " ${col} = " .static::getFormatedValue2("1") . ",";
        }
        $sql[strlen($sql)-1] = ' ';
        $sql .= "WHERE id = {$arg2}";



        Database::executeSQL($sql);
        
        //-------------------------
        $to   = (new DateTime())->format('Y-m-d H:i:s');// $to 

        $sql2 = "UPDATE ocorrencia_emergencias SET
        dataCiencia = '{$to}' WHERE id = {$arg2}";
        
        Database::executeSQL($sql2);
    }

    public static function paciente_pts(){
        $objects = [];

        $result = Database::getResultFromQuery("
        SELECT pacientes.id,pacientes.name,
        pacientes.dataAdmissao,pacientes.prontuario,
         monitoramentos.concentrador
          FROM pacientes 
          LEFT JOIN monitoramentos ON pacientes.id = monitoramentos.paciente
        ");

        if($result){
            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    
            return $objects;
        }


    }

    public function insert(){
        
        $this->validatePAC();


        if(!$this->id) $this->id = null;
        if(!$this->saturacaoO2) $this->saturacaoO2 = null;
        if(!$this->temperaturaCorporal) $this->temperaturaCorporal = null;
        if(!$this->frequenciaCardiaca) $this->frequenciaCardiaca = null;
        if(!$this->pressaoSistolica) $this->pressaoSistolica = null;
        if(!$this->pressaoDiastolica) $this->pressaoDiastolica = null;
    
        //if(!$this->end_date) $this->end_date = null;
        return parent::insert();
    }

    public function insertBoth($tableName1,$tableName2){
        $this->validate();
        if(!$this->id) $this->id = null;

        $sql = "INSERT INTO " .$tableName1 . " ("
        . implode(",", static::$columns) . ") VALUES (";
       foreach(static::$columns as $col) {
           $sql .= static::getFormatedValue2($this->$col) . ",";
       }
       $sql[strlen($sql)-1] = ')';

       $id = Database::executeSQL($sql);
       $this->id =$id;
       //------------------------------------------
       $sql=[];
       $sql = "INSERT INTO " .$tableName2 . " ( paciente
        ) VALUES ($this->id)";


      $id = Database::executeSQL($sql);
    
    }

    public function update_($tableName1,$columns=[],$clause,$ident) {
    
        //slqqq = "UPDATE evolucaos SET nomeProfissional = 1 WHERE evolucao_id = 23";


        $sql = "UPDATE " . $tableName1 . " SET ";
        foreach($columns as $col) {
            $sql .= " ${col} = " .static::getFormatedValue2($this->$col) . ",";
        }
        $sql[strlen($sql)-1] = ' ';
        $sql .= "WHERE {$clause} = {$ident}";



        Database::executeSQL($sql);

    }

    private function validate(){
        $errors = [];

        if(!$this->name) {
            $errors['name'] = 'Nome é um campo abrigatório.';
        }


        if(!$this->email) {
            $errors['email'] = 'Email é um campo abrigatório.';
        } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email inválido.';
        }

        if(!$this->dataAdmissao) {
            $errors['dataAdmissao'] = 'Data de Admissão é um campo abrigatório.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->dataAdmissao)) {
            $errors['dataAdmissao'] = 'Data de Admissão deve seguir o padrão dd/mm/aaaa.';
        }
        if(!$this->dataNasc) {
            $errors['dataNasc'] = 'Data de Admissão é um campo abrigatório.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->dataNasc)) {
            $errors['dataNasc'] = 'Data de Admissão deve seguir o padrão dd/mm/aaaa.';
        }

        if($this->end_date && !DateTime::createFromFormat('Y-m-d', $this->end_date)) {
            $errors['end_date'] = 'Data de Desligamento deve seguir o padrão dd/mm/aaaa.';
        }
        

        if(count($errors)>0) {
            throw new ValidationException($errors);
        }
    }

    private function validatePAC(){
        $errors = [];

        if(!$this->name) {
            $errors['name'] = 'Nome é um campo abrigatório.';
        }
        if(!$this->prontuario) {
            $errors['prontuario'] = 'prontuario é um campo abrigatório.';
        }
        if(!$this->concentrador) {
            $errors['concentrador'] = 'Concentrador é um campo abrigatório.';
        }
        if(!$this->CPF) {
            $errors['CPF'] = 'Concentrador é um campo abrigatório.';
        }

        if(!$this->email) {
            $errors['email'] = 'Email é um campo abrigatório.';
        } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email inválido.';
        }

        if(!$this->dataAdmissao) {
            $errors['dataAdmissao'] = 'Data de Admissão é um campo abrigatório.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->dataAdmissao)) {
            $errors['dataAdmissao'] = 'Data de Admissão deve seguir o padrão dd/mm/aaaa.';
        }
        if(!$this->dataNasc) {
            $errors['dataNasc'] = 'Data de Admissão é um campo abrigatório.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->dataNasc)) {
            $errors['dataNasc'] = 'Data de Admissão deve seguir o padrão dd/mm/aaaa.';
        }

        if($this->end_date && !DateTime::createFromFormat('Y-m-d', $this->end_date)) {
            $errors['end_date'] = 'Data de Desligamento deve seguir o padrão dd/mm/aaaa.';
        }
        

        if(count($errors)>0) {
            throw new ValidationException($errors);
        }
    }
    
    private static function getFormatedValue2($value){
        if(is_null($value)){
            return "null";
        } elseif(gettype($value)==='string'){
            return "'${value}'";
        } else {
            return $value;
        }
    }

}