<?php
class Concentrador extends Model {
    protected static $tableName = 'monitoramentos';
    protected static $columns = [
        'id',
        'name',
        'password',
        'email',
        'start_date',
        'end_date',
        'is_admin'
    ];

    public static function getListaConcentrador($args){
        $objects=[];
        $sql = "SELECT 
        monitoramentos.id,
        monitoramentos.concentrador,
        monitoramentos.modelo,
        monitoramentos.marca,
        monitoramentos.paciente,
        monitoramentos.datainicial,
        monitoramentos.datafinal,
        monitoramentos.ativo,
        monitoramentos.operador
        FROM monitoramentos
        WHERE monitoramentos.id= $args 
        ORDER BY monitoramentos.id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }  

    public static function get($filters = [],$columns = '*'){
        $objects = [];


        $result = static::getResultSetFromSelectID($filters,$columns);
        if($result){
            $class = get_called_class();
            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));
            }
            return $objects;
        }
    }

    public static function getResultSetFromSelectID($filters=[],$columns = '*') {
        $sql = "SELECT * FROM ocorrencia_sinais_vitais ORDER BY ID DESC LIMIT 1";




       $result = Database::getResultFromQuery($sql);



       if($result->num_rows ===0){
           return null;
       } else {
           return $result;

       }
    }
    public function insertto_ten($tableName1,$columns=[]){

        //$this->validate();

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

    private static function getFormatedValue2($value){

        if(is_null($value)){
            return "null";
        } elseif(gettype($value)==='string'){

            return "'${value}'";

        } else {
            return $value;
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

    public function updateSTR($tableName1,$columns) {
        if($tableName1 == "monitoramentos") {
           $this->validate_concentrador();
           if(!$this->operador) $this->operador = null;
           if(!$this->datafinal) $this->datafinal = null;
         //  $this->is_admin = $this->is_admin ? 1 : 0;
        }
           return parent::updateSTR($tableName1,$columns);
       }
   
    public function insertSTR($tableName,$columns){
        if($tableName == "monitoramentos") {
         $this->validate_concentrador();

        if(!$this->operador) $this->operador = null;
        if(!$this->id) $this->id = null;
        if(!$this->datafinal) $this->datafinal = null;
        }
        return parent::insertSTR($tableName,$columns);
    }

    private function validate_concentrador(){
        $errors = [];

        if(!$this->concentrador) {
            $errors['concentrador'] = 'Concentrador é um campo abrigatório.';
        }



        if(!$this->datainicial) {
            $errors['datainicial'] = 'Data inicial é um campo abrigatório.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->datainicial)) {
            $errors['datainicial'] = 'Data de inicial deve seguir o padrão dd/mm/aaaa.';
        }


        if($this->datafinal && !DateTime::createFromFormat('Y-m-d', $this->datafinal)) {
            $errors['datafinal'] = 'Data de Desligamento deve seguir o padrão dd/mm/aaaa.';
        }
        if(!$this->ativo) {
            $errors['ativo'] = 'ciência é um campo abrigatório.';
        }

        if(count($errors)>0) {
            throw new ValidationException($errors);
        }
    }
    
}