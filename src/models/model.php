<?php

class Model {
    protected static $tableName = '';
    protected static $tableNameAdj1 = '';
    protected static $columns = [];
    protected static $columnsAdj1 = [];
    protected $values = [];

    function __construct($arr,$sanitize = true){
        $this->loadFromArray($arr, $sanitize);
    }

    public function loadFromArray($arr,$sanitize = true){
        if($arr) {

            $conn = Database::getConnection(); //
            foreach($arr as $key=>$value){
                $cleanValue = $value;
                if($sanitize && isset($cleanValue)){
                    $cleanValue = strip_tags(trim($cleanValue));
                //    $cleanValue = htmlentities($cleanValue, ENT_NOQUOTES);
                    $cleanValue = mysqli_real_escape_string($conn,$cleanValue);//
                }
                $this->$key= $cleanValue;

            }
            $conn->close(); //

        }
    }
    public function __get($key){
        return $this->values[$key];
   }
    public function __set($key, $value){
        $this->values[$key] = $value;
    }
    public function getValues() {
        return $this->values;
    }

    public static function getPacienteInf($tableName,$filters=[],$rec,$columns = '*'){
        $objects=[];

        $result = static::getResultOr($tableName,$filters,$columns,$rec);
        
        if($result){
            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

            return $objects;
        }



    }


    public static function getPacienteMon($tableName,$filters=[],$rec,$columns = '*'){
        $objects=[];

        $result = static::getResultOr($tableName,$filters,$columns,$rec);
        if($result){
            $class = get_called_class();
            while($row = $result->fetch_assoc()){
                array_push($objects, $row['paciente']);

            }

            return $objects;
        }



    }

    public static function getResultOr($tableName,$filters,$columns,$rec) {
        

        $sql = "SELECT ${columns} FROM " 
        .$tableName
        .static::getFiltersOr($filters,$rec);



       $result = Database::getResultFromQuery($sql);

       if($result->num_rows ===0){
           return null;
       } else {
           return $result;

       }
    }
    private static function getFiltersOr($filters,$rec){
        $sql2 = '';

        if(count($filters)>0){
            $sql2 .= " WHERE 1=1 ";
            foreach($filters as $column => $value){


                if($column == 0){
                    $sql2 .= " AND ${rec} = " . $value; 
                }else{
                    $sql2 .= " OR ${rec} = " . $value;  
                }    
            }
        }

        return $sql2;
    }

    public static function getOne($filters = [],$columns = '*'){
        $class = get_called_class();



        $result = static::getResultSetFromSelect($filters,$columns);


        //retorna com todos os campos
        return $result ? new $class($result->fetch_assoc()) : null;

        
    }

    public static function getOneLogin($filters = [],$columns = '*'){
        $class = get_called_class();



        $result = static::getResultSetFromLogin($filters,$columns);


        //retorna com todos os campos
        return $result ? new $class($result->fetch_assoc()) : null;

        
    }

    public static function getOneFix($tableName,$filters = [],$columns = '*'){
        $class = get_called_class();




        $result = static::getResultFromSelect($tableName,$filters,$columns);

        return $result ? new $class($result->fetch_assoc()) : null;
        //acima: criação do objeto com os atributos das colunas do database
        
    }

    public static function getOneFix2($tableName,$filters = [],$columns = '*'){
        $class = get_called_class();
        $objects = [];

        $result = static::getResultFromSelect($tableName,$filters,$columns);

        if($result){
            $class = get_called_class();
            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));
            }

            return $objects;
        }
    }

    public static function getResultFromSelect($tableName,$filters=[],$columns = '*') {
        $sql = "SELECT ${columns} FROM " 
        .$tableName
        .static::getFilters($filters);





       $result = Database::getResultFromQuery($sql);



       if($result->num_rows ===0){
           return null;
       } else {
           return $result;

       }
    }


    public static function get($filters = [],$columns = '*'){
        $objects = [];
        $result = static::getResultSetFromSelect($filters,$columns);
        if($result){
            $class = get_called_class();
            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));
            }

    
            return $objects;
        }
    }

    public static function getResultSetFromSelect($filters=[],$columns = '*') {

        $sql = "SELECT ${columns} FROM " 
        .static::$tableName
        .static::getFilters($filters);



       $result = Database::getResultFromQuery($sql);



       if($result->num_rows ===0){
           return null;
       } else {
           return $result;

       }
    }

    public static function getResultSetFromLogin($filters=[],$columns = '*') {
        $sql = "SELECT id AS id_Op, name, email, password, perfil, codigo_profissional, is_admin, start_date, end_date FROM " 
        .static::$tableName
        .static::getFilters($filters);



       $result = Database::getResultFromQuery($sql);



       if($result->num_rows ===0){
           return null;
       } else {
           return $result;

       }
    }

    private static function getFilters($filters){
        $sql = '';

        if(count($filters)>0){
            $sql .= " WHERE 1=1 ";
            foreach($filters as $column => $value){


                if($column == 'raw'){
                    $sql .= " AND {$value}";
                }else{
                    $sql .= " AND ${column} = " . static::getFormatedValue($value);  
                }    
            }
        }
        return $sql;
    }

    public function insert(){
        $sql = "INSERT INTO " . static::$tableName . " ("
         . implode(",", static::$columns) . ") VALUES (";


        foreach(static::$columns as $col) {
            $sql .= static::getFormatedValue($this->$col) . ",";
        }

        $sql[strlen($sql)-1] = ')';




        $id = Database::executeSQL($sql);
        $this->id =$id;
        return $id;
    }
    
    public function updateSTR_PROF($tableName1,$columns) {
    
        //slqqq = "UPDATE evolucaos SET nomeProfissional = 1 WHERE evolucao_id = 23";


        $sql = "UPDATE " . $tableName1 . " SET ";
        foreach($columns as $col) {
            $sql .= " ${col} = " .static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql)-1] = ' ';
        $sql .= "WHERE profissional_id = {$this->profissional_id}";



        Database::executeSQL($sql);

    }

    public function updateSTR_USER($tableName1,$columns) {
    
        //slqqq = "UPDATE evolucaos SET nomeProfissional = 1 WHERE evolucao_id = 23";


        $sql = "UPDATE " . $tableName1 . " SET ";
        foreach($columns as $col) {
            $sql .= " ${col} = " .static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql)-1] = ' ';
        $sql .= "WHERE id = {$this->id}";



        Database::executeSQL($sql);

    }

    public function updateSTR($tableName1,$columns) {
    
        //slqqq = "UPDATE evolucaos SET nomeProfissional = 1 WHERE evolucao_id = 23";


        $sql = "UPDATE " . $tableName1 . " SET ";
        foreach($columns as $col) {
            $sql .= " ${col} = " .static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql)-1] = ' ';
        $sql .= "WHERE id = {$this->id}";



        Database::executeSQL($sql);

    }

    public function updateSTRS($tableName1,$columns,$param) {
    
        //slqqq = "UPDATE evolucaos SET nomeProfissional = 1 WHERE evolucao_id = 23";


        $sql = "UPDATE " . $tableName1 . " SET ";
        foreach($columns as $col) {
            $sql .= " ${col} = " .static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql)-1] = ' ';
        $sql .= "WHERE {$param} = {$this->id}";



        Database::executeSQL($sql);

    }

    public function insertSTR($tableName,$columns){
        $sql = "INSERT INTO " .$tableName . " ("
         . implode(",", $columns) . ") VALUES (";


        foreach($columns as $col) {
            $sql .= static::getFormatedValue($this->$col) . ",";
        }

        $sql[strlen($sql)-1] = ')';



        $id = Database::executeSQL($sql);
        $this->id =$id;

    }

    public function updateSTRWHERE($tableName,$columns){
        //slqqq = "UPDATE evolucaos SET nomeProfissional = 1 WHERE evolucao_id = 23";


        $sql = "UPDATE " . $tableName . " SET ";
        foreach($columns as $col => $value) {
            $sql .= " ${col} = " .$value . ",";
        }
        $sql[strlen($sql)-1] = ' ';
        $sql .= "WHERE paciente = {$this->paciente}";



        $id =  Database::executeSQL($sql);
        $this->id =$id;

    }

    public function insertSTR_PROF($tableName,$columns){
        $sql = "INSERT INTO " .$tableName . " ("
         . implode(",", $columns) . ") VALUES (";


        foreach($columns as $col) {
            $sql .= static::getFormatedValue($this->$col) . ",";
        }

        $sql[strlen($sql)-1] = ')';



        $codigo_profissional = Database::executeSQL($sql);
        $this->codigo_profissional =$codigo_profissional;

    }

    public function insertSTR_USER($tableName,$columns){
        $sql = "INSERT INTO " .$tableName . " ("
         . implode(",", $columns) . ") VALUES (";


        foreach($columns as $col) {
            $sql .= static::getFormatedValue($this->$col) . ",";
        }

        $sql[strlen($sql)-1] = ')';



        $id = Database::executeSQL($sql);
        $this->id =$id;

    }

    public function update() {
        $sql = "UPDATE " . static::$tableName . " SET ";
        foreach(static::$columns as $col) {
            $sql .= " ${col} = " .static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql)-1] = ' ';
        $sql .= "WHERE id = {$this->id}";
        Database::executeSQL($sql);
    }
    public function updateBoth() {
        $sql = "UPDATE " . static::$tableName . " SET ";
        foreach(static::$columns as $col) {
            $sql .= " ${col} = " .static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql)-1] = ' ';
        $sql .= "WHERE id = {$this->id}";

        Database::executeSQL($sql);

        //----------------------------------------------------------------
        $sql=[];
        $sql ="SELECT id 
        FROM exames WHERE prontuario_id = {$this->id}";

        $result = Database::getResultFromQuery($sql);
        $filter =$result->fetch_assoc();
        //--------------------------------------------------------
        $sql=[];
        $sql = "UPDATE " . static::$tableNameAdj1 . " SET ";
        foreach(static::$columnsAdj1 as $col) {
            $sql .= " ${col} = " .static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql)-1] = ' ';

        if(count($filter)>0){
            foreach($filter as $column => $value){


                if($column == 'raw'){
                    $sql .= " WHERE {$value}";
                }else{
                    $sql .= " WHERE ${column} = " . static::getFormatedValue($value);  
                }    
            }
        }
        Database::executeSQL($sql);


    }

    public static function getCount($filters = []){
        $result = static::getResultSetFromSelect($filters, 'count(*) as count');
        return $result->fetch_assoc()['count'];
    } 
    public function delete() {
        static::deleteById($this->id);
    }
    public static function deleteById($id){
        $sql = "DELETE FROM " . static::$tableName . " WHERE id = {$id}";
        Database::executeSQL($sql);
    }  


    private static function getFormatedValue($value){

        if(is_null($value)){
            return "null";
        } elseif(gettype($value)==='string'){

            return "'${value}'";

        } else {
            return $value;
        }
    }
}