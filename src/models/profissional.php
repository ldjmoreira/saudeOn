<?php

class Profissional extends Model {
    protected static $tableName = 'profissionals';
    protected static $columns = [
        'name'
    ];

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

    public static function selectDoubleCond($tableName1,$column1,$column2,$cond,$value) {
        $objects = [];
        $sql = "       SELECT $column1 , $column2
        FROM $tableName1 WHERE $cond = $value ";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

            return $objects;
        }
    }

    public static function selectTriple($tableName1,$column1,$column2,$column3) {
        $objects = [];
        $sql = "       SELECT $column1 , $column2 , $column3
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

    public function updateSTR($tableName1,$columns) {
        if($tableName1 == "cuidadors") {
            $this->validate_cuidadors();
        }
     //   $this->validate();
      //  if(!$this->id) $this->id = null;
      //  $this->is_admin = $this->is_admin ? 1 : 0;

        return parent::updateSTR($tableName1,$columns);
    }

    public function insertSTR($tableName,$columns){
        if($tableName == "cuidadors") {
            $this->validate_cuidadors();

            if(!$this->id) $this->id = null;
        }


        

        //if(!$this->end_date) $this->end_date = null;
        return parent::insertSTR($tableName,$columns);
    }



    public static function selectAll($tabell,$column, $args){
        $objects = [];
        $sql = "       SELECT *
        FROM $tabell
        WHERE $tabell.$column = $args ";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function cuidadores_Lista($arg){
        $objects = [];

        $result = Database::getResultFromQuery("
        SELECT cuidadors.id,cuidadors.name,
        cuidadors.email,cuidadors.telContato,
         cuidadors.disponibilidade
          FROM cuidadors WHERE paciente = $arg
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

        if(!$this->id) $this->id = null;

        //if(!$this->end_date) $this->end_date = null;
        return parent::insert();
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

    private function validate_cuidadors(){
        $errors = [];

        if(!$this->name) {
            $errors['name'] = 'Nome ?? um campo abrigat??rio.';
        }

        if(!$this->email) {
            $errors['email'] = 'Email ?? um campo abrigat??rio.';
        } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email inv??lido.';
        }

        if(!$this->dataAdmissao) {
            $errors['dataAdmissao'] = 'Data de Admiss??o ?? um campo abrigat??rio.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->dataAdmissao)) {
            $errors['dataAdmissao'] = 'Data de Admiss??o deve seguir o padr??o dd/mm/aaaa.';
        }
        if(!$this->dataNasc) {
            $errors['dataNasc'] = 'Data de Admiss??o ?? um campo abrigat??rio.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->dataNasc)) {
            $errors['dataNasc'] = 'Data de Admiss??o deve seguir o padr??o dd/mm/aaaa.';
        }

        if($this->end_date && !DateTime::createFromFormat('Y-m-d', $this->end_date)) {
            $errors['end_date'] = 'Data de Desligamento deve seguir o padr??o dd/mm/aaaa.';
        }
        if(!$this->estadoCivil) {
            $errors['estadoCivil'] = 'Estado Civil ?? um campo abrigat??rio.';
        }
        if(!$this->CPF) {
            $errors['CPF'] = 'CPF ?? um campo abrigat??rio.';
        }
        if(!$this->sexo) {
            $errors['sexo'] = 'sexo ?? um campo abrigat??rio.';
        }
        if(!$this->naturalidade) {
            $errors['naturalidade'] = 'naturalidade ?? um campo abrigat??rio.';
        }
        if(!$this->vinculoFamiliar) {
            $errors['vinculoFamiliar'] = 'vinculo familiar ?? um campo abrigat??rio.';
        }
        if(!$this->alfabetizacao) {
            $errors['alfabetizacao'] = 'Alfabetiza????o ?? um campo abrigat??rio.';
        }
        if(!$this->deficiencias) {
            $errors['deficiencias'] = 'deficiencias ?? um campo abrigat??rio.';
        }
        if(!$this->telContato) {
            $errors['telContato'] = 'telefone de contato ?? um campo abrigat??rio.';
        }
        if(!$this->disponibilidade) {
            $errors['disponibilidade'] = 'Disponibilidade ?? um campo abrigat??rio.';
        }
        if(!$this->endereco) {
            $errors['endereco'] = 'endereco ?? um campo abrigat??rio.';
        }
        if(!$this->CEP) {
            $errors['CEP'] = 'CEP ?? um campo abrigat??rio.';
        }
        if(!$this->bairro) {
            $errors['bairro'] = 'bairro ?? um campo abrigat??rio.';
        }
        if(!$this->complemento) {
            $errors['complemento'] = 'complemento ?? um campo abrigat??rio.';
        }
        if(!$this->cidade) {
            $errors['cidade'] = 'cidade ?? um campo abrigat??rio.';
        }



        if(count($errors)>0) {
            throw new ValidationException($errors);
        }
    }

}