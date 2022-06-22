<?php

class Prontuario extends Model {
    protected static $tableName = 'prontuario';
    protected static $tableNameAdj1 = 'exames';
    protected static $columns = [
        'id',
        'numero',
        'paciente_id',
        'profissional_id',
        'queixa',
        'historia',
        'antecedentes',
        'finalizado',
        'evolucao'
    ];
    protected static $columnsAdj1 = [

        'prontuario_id',
        'exameSegmentar',
        'frequenciaCard',
        'peso',
        'pressao',
        'altura'
    ];



    public static function getJoinedTable($Tfirst,$Tsecond,$Afirst,$Asecond,$filter,$args){
        
        $class = get_called_class();

        $sql ="SELECT * 
        FROM ${Tfirst} 
        LEFT JOIN ${Tsecond}
        ON ${Tfirst}.$Afirst = ${Tsecond}.$Asecond 
        WHERE $Tsecond.$filter = $args 
        ORDER BY ${Tsecond}.$Asecond  DESC LIMIT 0,1";



        $result = Database::getResultFromQuery($sql);



       if($result->num_rows ===0){
         $result = NULL;
       } 

       return $result ? new $class($result->fetch_assoc()) : null;

    }
    

    public function update() {
        $this->validate();
      //  if(!$this->id) $this->id = null;
       // $this->is_admin = $this->is_admin ? 1 : 0;
        //if(!$this->end_date) $this->end_date = null;



        return parent::updateBoth();
    }
    private function validate(){
        $errors = [];



        if(count($errors)>0) {
            throw new ValidationException($errors);
        }
    }
}