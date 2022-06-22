<?php
class Equipo_concentrador extends Model {
    protected static $tableName = 'equipo_concentrador';
    protected static $columns = [
        'id',
        'numero',
        'modelo',
        'password',
        'ativo',
        'start_date',

    ];

    public function insertSTR($tableName,$columns){
        if($tableName == "equipo_concentrador") {
       //  $this->validate_concentrador();

        if(!$this->operador) $this->operador = null;
        if(!$this->id) $this->id = null;
        if(!$this->end_date) $this->end_date = null;
        }
        return parent::insertSTR($tableName,$columns);
    }

    public function updateSTRS($tableName1,$columns,$where) {
        if($tableName1 == "monitoramentos") {
        //   $this->validate_concentrador();
           if(!$this->operador) $this->operador = null;
           if(!$this->datafinal) $this->datafinal = null;
         //  $this->is_admin = $this->is_admin ? 1 : 0;
        }
           return parent::updateSTRS($tableName1,$columns,$where);
    }

    public static function deleteById($args){

        $sql = " DELETE FROM equipo_concentrador 
            WHERE equipo_concentrador.id= $args 
            ";

        $result = Database::getResultFromQuery($sql);


        return $result;

    }
    
}

    
