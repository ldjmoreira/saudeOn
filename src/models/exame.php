<?php
class Exame extends Model {
    protected static $tableName = 'evolucaos';
    protected static $columns = [
        'evolucao_id',
        'paciente',

    ];

    public function insertto_ten($tableName1,$columns=[]){
            if ($tableName1 == "p_t_s_s"){
                $this->validate_p_t_s_s();
            }
            if ($tableName1 == "evolucaos"){
                $this->validate_evolucao();
            }
            

            //if(!$this->id) $this->id = null;
            //if(!$this->end_date) $this->end_date = null;
            $sql = "INSERT INTO " . $tableName1 . " ("
            . implode(",",$columns) . ") VALUES (";
            

    
           foreach($columns as $col) {
               $sql .= static::getFormatedValue2($this->$col) . ",";
           }

           $sql[strlen($sql)-1] = ')';


    
           $id = Database::executeSQL($sql);
           $this->id =$id;

    }

    public function select_PTS($arg2) {
        $objects = [];
        $sql = "SELECT profissionals.profissional_id, users.id  
        FROM p_t_s_s
        INNER JOIN profissionals
            ON p_t_s_s.nomeProfissional = profissionals.nome_Prof
        INNER JOIN users
            ON p_t_s_s.operador=users.name
        WHERE p_t_s_s.PTS_id = $arg2";

        //--------------------------------------------------------

        $result = Database::getResultFromQuery($sql);
        if($result){
            while($row = $result->fetch_assoc()){

            $this->nomeProfissional =$row['profissional_id'];//from profissionals
            $this->operador = $row['id'];//from operador

            }

        }
        

    }

    public function select_ten($arg2) {
        $objects = [];
        $sql = "SELECT profissionals.profissional_id, users.id  
        FROM p_t_s_s
        INNER JOIN profissionals
            ON p_t_s_s.nomeProfissional = profissionals.nome_Prof
        INNER JOIN users
            ON p_t_s_s.operador=users.name
        WHERE p_t_s_s.PTS_id = $arg2";

        //--------------------------------------------------------

        $result = Database::getResultFromQuery($sql);
        if($result){
            while($row = $result->fetch_assoc()){

            $this->nomeProfissional =$row['profissional_id'];//from profissionals
            $this->operador = $row['id'];//from operador

            }

        }
        

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

    public function insertto($tableName1){
    //    $this->validate();
        if(!$this->id) $this->id = null;
        //if(!$this->end_date) $this->end_date = null;
        $sql = "INSERT INTO " . $tableName1 . " ("
        . implode(",", static::$columns) . ") VALUES (";


       foreach(static::$columns as $col) {
           $sql .= static::getFormatedValue2($this->$col) . ",";
       }

       $sql[strlen($sql)-1] = ')';




       $id = Database::executeSQL($sql);
       $this->id =$id;

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

    public static function getListaPTS($args){
        //evolucao, só vira quando nome do profissional e operador estiver setado
        $objects = [];
            $sql = "SELECT p_t_s_s.PTS_id,
            profissionals.nome_prof,
            p_t_s_s.data_PTS,
            p_t_s_s.diagnostico,
            p_t_s_s.definicaoMetas,
            p_t_s_s.definicaoResp,
            p_t_s_s.Reavaliacao,
            pacientes.dataNasc,
            pacientes.id
            FROM p_t_s_s
            INNER JOIN profissionals
                    ON p_t_s_s.nomeProfissional = profissionals.profissional_id
            INNER JOIN pacientes
                    ON p_t_s_s.paciente =pacientes.id
            INNER JOIN users
                ON p_t_s_s.operador=users.id
            WHERE pacientes.id = $args 
            ORDER BY p_t_s_s.PTS_id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

            return $objects;
        }
    }

    public static function getListaEvolucao($args){
        //evolucao, só vira quando nome do profissional e operador estiver setado
        $objects = [];
            $sql = "SELECT evolucaos.evolucao_id,
            profissionals.nome_prof,
            evolucaos.data_evolucao,
            pacientes.name,
            pacientes.dataNasc,
            pacientes.id
            FROM evolucaos
            INNER JOIN profissionals
                    ON evolucaos.nomeProfissional = profissionals.profissional_id
            INNER JOIN pacientes
                    ON evolucaos.paciente =pacientes.id
            INNER JOIN users
                ON evolucaos.operador=users.id
            WHERE pacientes.id = $args 
            ORDER BY evolucaos.evolucao_id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

            return $objects;
        }
    }

    public static function getUnicEvolucao($args){
        $objects = [];
        $sql = "       SELECT evolucaos.evolucao_id,
        evolucaos.evolucao,
        evolucaos.atividade,
        evolucaos.conselho,
        evolucaos.data_evolucao,
        evolucaos.operador,
        profissionals.nome_Prof,
        profissionals.CBO,
        profissionals.profissional_id,
        pacientes.name,
       pacientes.email,
       pacientes.dataNasc
        FROM evolucaos
        INNER JOIN profissionals
              ON evolucaos.nomeProfissional = profissionals.profissional_id
        INNER JOIN pacientes
              ON evolucaos.paciente =pacientes.id
        INNER JOIN users
            ON evolucaos.operador=users.id
        WHERE evolucaos.evolucao_id = $args 
        ORDER BY evolucaos.evolucao_id DESC LIMIT 0,1";

        $result = Database::getResultFromQuery($sql);

        if($result){
    
            $class = get_called_class();

            $row = $result->fetch_assoc();
            return new $class($row);


        }
    }

    public static function getUnicPTS($args){
        $objects = [];
        $sql = "SELECT p_t_s_s.PTS_id,
        p_t_s_s.diagnostico,
        p_t_s_s.definicaoMetas,
        p_t_s_s.definicaoResp,
        p_t_s_s.reavaliacao,
        p_t_s_s.operador,
        p_t_s_s.data_PTS,
        profissionals.nome_Prof,
        profissionals.CBO,
        profissionals.profissional_id,
        pacientes.name,
       pacientes.email,
       pacientes.dataNasc
        FROM p_t_s_s
        INNER JOIN profissionals
              ON p_t_s_s.nomeProfissional = profissionals.profissional_id
        INNER JOIN pacientes
              ON p_t_s_s.paciente =pacientes.id
        INNER JOIN users
            ON p_t_s_s.operador=users.id
        WHERE p_t_s_s.PTS_id = $args 
        ORDER BY p_t_s_s.PTS_id DESC LIMIT 0,1";

        $result = Database::getResultFromQuery($sql);

        if($result){
    
            $class = get_called_class();

            $row = $result->fetch_assoc();
            return new $class($row);


        }
    }
    private function validate_p_t_s_s(){
        $errors = [];

      
        if(!$this->data_PTS) {
            $errors['data_PTS'] = 'Data de Admissão é um campo abrigatório.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->data_PTS)) {
            $errors['data_PTS'] = 'Data de Admissão deve seguir o padrão dd/mm/aaaa.';
        }

        if(!$this->diagnostico) {
            $errors['diagnostico'] = 'Diagnóstico é um campo abrigatório.';
        }

        if(!$this->definicaoMetas) {
            $errors['definicaoMetas'] = 'definicaoMetas é um campo abrigatório.';
        }

        if(!$this->definicaoResp) {
            $errors['definicaoResp'] = 'definicaoResp é um campo abrigatório.';
        }

        if(!$this->reavaliacao) {
            $errors['reavaliacao'] = 'reavaliacao é um campo abrigatório.';
        }



        if(count($errors)>0) {
            throw new ValidationException($errors);
        }


    }

    private function validate_evolucao(){
        $errors = [];

        if(!$this->data_evolucao) {
            $errors['data_evolucao'] = 'Data de Admissão é um campo abrigatório.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->data_evolucao)) {
            $errors['data_evolucao'] = 'Data de Admissão deve seguir o padrão dd/mm/aaaa.';
        }

        if(!$this->evolucao) {
            $errors['evolucao'] = 'Evolução é um campo abrigatório.';
        }


        if(count($errors)>0) {
            throw new ValidationException($errors);
        }
    }

}