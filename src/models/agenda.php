<?php
class Agenda extends Model {
    protected static $tableName = 'users';
    protected static $columns = [
        'id',
        'name',

    ];

    public static function getAtencaoDomiciliar($args){
        $objects=[];
        $sql = "SELECT 
        solicitacao_atencaos.id,
        solicitacao_atencaos.data,
        solicitacao_atencaos.paciente,
        solicitacao_atencaos.profissional,
        solicitacao_atencaos.modalidadeAD,
        solicitacao_atencaos.perfilUsuario,
        solicitacao_atencaos.hospitaldeReferencia,
        solicitacao_atencaos.UPAdeReferencia,
        solicitacao_atencaos.UPAdeReferencia,
        pacientes.name,
        profissionals.nome_Prof,
        perfil_usuarios.descricao
        FROM solicitacao_atencaos
        INNER JOIN pacientes ON pacientes.id = solicitacao_atencaos.paciente
        INNER JOIN profissionals ON profissionals.profissional_id= solicitacao_atencaos.profissional
        INNER JOIN perfil_usuarios ON perfil_usuarios.id = solicitacao_atencaos.perfilUsuario
        WHERE solicitacao_atencaos.paciente= $args 
        ORDER BY solicitacao_atencaos.id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function listaAtencaoDom($args){
        $objects=[];
        $sql = "SELECT 
        solicitacao_atencaos.id,
        solicitacao_atencaos.data,
        pacientes.name,
        profissionals.nome_Prof,
        perfil_usuarios.descricao
        FROM solicitacao_atencaos
        INNER JOIN pacientes ON pacientes.id = solicitacao_atencaos.paciente
        INNER JOIN profissionals ON profissionals.profissional_id= solicitacao_atencaos.profissional
        INNER JOIN perfil_usuarios ON perfil_usuarios.id = solicitacao_atencaos.perfilUsuario
        WHERE solicitacao_atencaos.paciente= $args 
        ORDER BY solicitacao_atencaos.id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function getListaProgSinaisVitais($args){
        $objects = [];
        $sql=" SELECT programacao_sinais_vitais_detalhes.id,
        programacao_sinais_vitais_detalhes.intervalo,
        programacao_sinais_vitais_detalhes.ativo,
        programacao_sinais_vitais_detalhes.ciente,
        programacao_sinais_vitais_detalhes.cod_sinal_vital,
        programacao_sinais_vitais_detalhes.tipoIntervalo,
        sinal_vitals.descricao
        FROM programacao_sinais_vitais_detalhes
        INNER JOIN sinal_vitals ON sinal_vitals.id = programacao_sinais_vitais_detalhes.cod_sinal_vital
        WHERE programacao_sinais_vitais_detalhes.id= $args
        ORDER BY programacao_sinais_vitais_detalhes.id DESC
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

    public static function getListaSinaisVitais($args){
        $objects = [];
        $sql=" SELECT programacao_sinais_vitais_detalhes.id,
        programacao_sinais_vitais_detalhes.intervalo,
        programacao_sinais_vitais_detalhes.ativo,
        programacao_sinais_vitais_detalhes.ciente,
        programacao_sinais_vitais_detalhes.cod_sinal_vital,
        sinal_vitals.descricao
        FROM programacao_sinais_vitais_detalhes
        INNER JOIN sinal_vitals ON sinal_vitals.id = programacao_sinais_vitais_detalhes.cod_sinal_vital
        WHERE programacao_sinais_vitais_detalhes.paciente= $args AND (programacao_sinais_vitais_detalhes.intervalo != 0 AND programacao_sinais_vitais_detalhes.ativo = 1)
        ORDER BY programacao_sinais_vitais_detalhes.id DESC
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

    public static function getListaProgMedicamentos($args){
        $objects=[];
        $sql = "SELECT 
        programacao_medicamentos_detalhadas.id,
        programacao_medicamentos_detalhadas.medicamento,
        programacao_medicamentos_detalhadas.via,
        programacao_medicamentos_detalhadas.dose,
        programacao_medicamentos_detalhadas.qtd_dose,
        programacao_medicamentos_detalhadas.intervalo,
        programacao_medicamentos_detalhadas.data,
        programacao_medicamentos_detalhadas.hora,
        programacao_medicamentos_detalhadas.tipoIntervalo,
        programacao_medicamentos_detalhadas.aprazada,
        programacao_medicamentos_detalhadas.ativo,
        programacao_medicamentos_detalhadas.ciente,
        programacao_medicamentos_detalhadas.condicao
         FROM programacao_medicamentos_detalhadas
         WHERE programacao_medicamentos_detalhadas.id= $args 
         ORDER BY programacao_medicamentos_detalhadas.id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    
    public static function getListaProgCuidados($args){
        $objects=[];
        $sql = "SELECT 
        programacao_procedimentos_detalhadas.id,
        programacao_procedimentos_detalhadas.procedimento,
        programacao_procedimentos_detalhadas.detalhes,
        programacao_procedimentos_detalhadas.intervalo,
        programacao_procedimentos_detalhadas.hora,
        programacao_procedimentos_detalhadas.data,
        programacao_procedimentos_detalhadas.lido,
        programacao_procedimentos_detalhadas.tipoIntervalo,
        programacao_procedimentos_detalhadas.ativo,
        procedimentos.name,
        programacao_procedimentos_detalhadas.ciente
         FROM programacao_procedimentos_detalhadas
         INNER JOIN procedimentos ON procedimentos.id = programacao_procedimentos_detalhadas.procedimento
         WHERE programacao_procedimentos_detalhadas.id= $args 
         ORDER BY programacao_procedimentos_detalhadas.id DESC";


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

    public static function selectAgendaProf($args){
        $objects=[];
        $sql = "SELECT 
        profissionals.nome_Prof,
        pacientes.name, 
        agenda_profissionals.id,
        agenda_profissionals.diasAtendimento,
        agenda_profissionals.motivoVisita,
        agenda_profissionals.operador,
        agenda_profissionals.dataInicial
         FROM agenda_profissionals
         INNER JOIN profissionals ON profissionals.profissional_id = agenda_profissionals.profissional
         INNER JOIN pacientes ON pacientes.id = agenda_profissionals.paciente
         WHERE agenda_profissionals.id= $args 
         ORDER BY agenda_profissionals.id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function listaProfissionais($arg){
        $objects = [];
        $sql = "SELECT 
        profissionals.nome_Prof,
        pacientes.name, 
        agenda_profissionals.id,
        agenda_profissionals.motivoVisita,
        agenda_profissionals.dataInicial
         FROM agenda_profissionals
         INNER JOIN profissionals ON profissionals.profissional_id = agenda_profissionals.profissional
         INNER JOIN pacientes ON pacientes.id = agenda_profissionals.paciente
         WHERE agenda_profissionals.profissional= $arg 
         ORDER BY agenda_profissionals.id DESC";


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
        if($tableName1 =="agenda_profissional_detalhadas"){
            $this->validate_ProfPac();
            
            if(!$this->operador) $this->operador = null;
            if(!$this->id) $this->id = null;
            if(!$this->ciente) $this->ciente = null;
        }

        if($tableName1 =="agenda_profissionals"){
            $this->validate_AgendaProf();
            
            if(!$this->operador) $this->operador = null;
            if(!$this->id) $this->id = null;
            if(!$this->ciente) $this->ciente = null;
        }
        if($tableName1 =="solicitacao_atencaos"){
            $this->validate_Atencaos();
            
            if(!$this->operador) $this->operador = null;
            if(!$this->id) $this->id = null;
        }
        if($tableName1 =="programacao_procedimentos_detalhadas"){
            $this->validate_procedimentos();
            
            if(!$this->operador) $this->operador = null;
            if(!$this->id) $this->id = null;
        }
   
           return parent::updateSTR($tableName1,$columns);
       }
   
       public function insertSTR($tableName,$columns){
           if($tableName =="agenda_profissional_detalhadas"){
            $this->validate_ProfPac();
            
            if(!$this->operador) $this->operador = null;
            if(!$this->id) $this->id = null;
            if(!$this->ciente) $this->ciente = null;
            }

            if($tableName =="agenda_profissionals"){
                $this->validate_AgendaProf();
                
                if(!$this->operador) $this->operador = null;
                if(!$this->id) $this->id = null;
                if(!$this->ciente) $this->ciente = null;
            }
            if($tableName =="solicitacao_atencaos"){
                $this->validate_Atencaos();
                
                if(!$this->operador) $this->operador = null;
                if(!$this->id) $this->id = null;
            }
           //if(!$this->end_date) $this->end_date = null;
           return parent::insertSTR($tableName,$columns);
       }
    
    public static function getListaProfPacAll($args){
        $objects = [];
        $sql = " SELECT 
        profissionals.nome_Prof, 
        cbo.descricao, 
        agenda_profissional_detalhadas.motivo,
        agenda_profissional_detalhadas.id, 
        agenda_profissional_detalhadas.data, 
        agenda_profissional_detalhadas.hora, 
        agenda_profissional_detalhadas.lido, 
        agenda_profissional_detalhadas.ciente, 
        users.name, 
        agenda_profissional_detalhadas.turno 
        FROM ( 
            ( users 
            INNER JOIN agenda_profissional_detalhadas ON agenda_profissional_detalhadas.operador = users.id ) 
            INNER JOIN profissionals ON profissionals.profissional_id = agenda_profissional_detalhadas.profissional ) 
            INNER JOIN cbo ON cbo.id = profissionals.CBO 
            WHERE agenda_profissional_detalhadas.id= $args 
            ORDER BY agenda_profissional_detalhadas.data DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function getListaProfPac($args ){
        $objects = [];
        $sql = "SELECT 
        profissionals.nome_Prof,
         cbo.descricao, 
         agenda_profissional_detalhadas.id, 
         agenda_profissional_detalhadas.motivo, 
         agenda_profissional_detalhadas.data,
         agenda_profissional_detalhadas.hora, 
         agenda_profissional_detalhadas.ciente, 
         agenda_profissional_detalhadas.turno
         FROM profissionals
         INNER JOIN agenda_profissional_detalhadas ON agenda_profissional_detalhadas.profissional = profissionals.profissional_id 
         INNER JOIN cbo ON cbo.id = profissionals.CBO 
         WHERE agenda_profissional_detalhadas.paciente= $args AND agenda_profissional_detalhadas.softdelete != 1
         ORDER BY agenda_profissional_detalhadas.data DESC
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


    public static function getListaCuidados($args ){
        $objects = [];
        $sql = "  SELECT programacao_procedimentos_detalhadas.intervalo,
        programacao_procedimentos_detalhadas.ciente,
        programacao_procedimentos_detalhadas.ativo,
        programacao_procedimentos_detalhadas.id,
        programacao_procedimentos_detalhadas.data,
        programacao_procedimentos_detalhadas.hora,
        procedimentos.name
        FROM programacao_procedimentos_detalhadas
         INNER JOIN procedimentos ON programacao_procedimentos_detalhadas.procedimento = procedimentos.id
          INNER JOIN pacientes ON programacao_procedimentos_detalhadas.paciente=pacientes.id
          WHERE programacao_procedimentos_detalhadas.paciente= $args AND programacao_procedimentos_detalhadas.softdelete != 1
          ORDER BY programacao_procedimentos_detalhadas.id DESC
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

    public static function getListaMedicamentos($args){
        $objects = [];
        $sql=" SELECT programacao_medicamentos_detalhadas.id,
        programacao_medicamentos_detalhadas.medicamento,
        programacao_medicamentos_detalhadas.medicamento,
        programacao_medicamentos_detalhadas.dose,
        programacao_medicamentos_detalhadas.intervalo,
        programacao_medicamentos_detalhadas.via,
        programacao_medicamentos_detalhadas.data,
        programacao_medicamentos_detalhadas.hora,
        programacao_medicamentos_detalhadas.aprazada,
        programacao_medicamentos_detalhadas.ativo,
        programacao_medicamentos_detalhadas.operador,
        medicamentos.name,
        programacao_medicamentos_detalhadas.ciente
        FROM programacao_medicamentos_detalhadas
        INNER JOIN medicamentos ON programacao_medicamentos_detalhadas.medicamento = medicamentos.id
        INNER JOIN users ON programacao_medicamentos_detalhadas.operador=users.id
        WHERE programacao_medicamentos_detalhadas.paciente= $args AND programacao_medicamentos_detalhadas.softdelete != 1
        ORDER BY programacao_medicamentos_detalhadas.id DESC
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

    private static function getFormatedValue2($value){
        if(is_null($value)){
            return "null";
        } elseif(gettype($value)==='string'){
            return "'${value}'";
        } else {
            return $value;
        }
    }

    private function validate_ProfPac(){
        $errors = [];

        if(count($errors)>0) {
            throw new ValidationException($errors);
        }
    }

    private function validate_procedimentos(){
        $errors = [];

        if(!$this->procedimento) {
            $errors['procedimento'] = 'Cuidado é um campo abrigatório.';
        }
        if(!$this->hora) {
            $errors['hora'] = 'Hora é um campo abrigatório.';
        }
        
        if(!$this->data) {
            $errors['data'] = 'Data de Admissão é um campo abrigatório.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->data)) {
            $errors['data'] = 'Data de Admissão deve seguir o padrão dd/mm/aaaa.';
        }

        if(!$this->intervalo) {
            $errors['intervalo'] = 'Intervalo é um campo abrigatório.';
        }

        if(!$this->tipoIntervalo) {
            $errors['tipoIntervalo'] = "Tipo de Intervalo  é um campo abrigatório.";
        }

        if(!$this->detalhes) {
            $errors['detalhes'] = "Detalhes  é um campo abrigatório.";
        }

        if(count($errors)>0) {
            throw new ValidationException($errors);
        }
    }

    private function validate_AgendaProf(){
        $errors = [];

        if(!$this->profissional) {
            $errors['profissional'] = 'Profissional é um campo abrigatório.';
        }

        if(!$this->paciente) {
            $errors['paciente'] = 'Paciente é um campo abrigatório.';
        }

        if(!$this->dataInicial) {
            $errors['dataInicial'] = 'data Inicial  é um campo abrigatório.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->dataInicial)) {
            $errors['dataInicial'] = 'data Inicial  deve seguir o padrão dd/mm/aaaa.';
        }

        if(!$this->diasAtendimento) {
            $errors['diasAtendimento'] = 'dias de atendimento é um campo abrigatório.';
        }

        if(!$this->motivoVisita) {
            $errors['motivoVisita'] = 'Motivo da visita é um campo abrigatório.';
        }

        if(count($errors)>0) {
            throw new ValidationException($errors);
        }

    }

    private function validate_Atencaos(){
        $errors = [];

        if(!$this->profissional) {
            $errors['profissional'] = 'Profissional é um campo abrigatório.';
        }
        if(!$this->paciente) {
            $errors['paciente'] = 'Paciente é um campo abrigatório.';
        }
        
        if(!$this->data) {
            $errors['data'] = 'Data  é um campo abrigatório.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->data)) {
            $errors['data'] = 'Data  deve seguir o padrão dd/mm/aaaa.';
        }

        if(!$this->modalidadeAD) {
            $errors['modalidadeAD'] = 'Modalidade de atenção domiciliar é um campo abrigatório.';
        }

        if(!$this->perfilUsuario) {
            $errors['perfilUsuario'] = "Perfil do usuário é um campo abrigatório.";
        }

        if(!$this->hospitaldeReferencia) {
            $errors['hospitaldeReferencia'] = "Hospital de referêcia é um campo abrigatório.";
        }

        if(!$this->UPAdeReferencia) {
            $errors['UPAdeReferencia'] = "UPA de referêcia é um campo abrigatório.";
        }

        if(!$this->samutel) {
            $errors['samutel'] = "Telefone da SAMU é um campo abrigatório.";
        }

        if(count($errors)>0) {
            throw new ValidationException($errors);
        }
    }

}