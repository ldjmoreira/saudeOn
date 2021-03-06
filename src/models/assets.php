<?php
class Assets extends Model {
    protected static $tableName = 'assets';
    protected static $columns = [
        'id',
        'name',

    ];

    public static function getCuidados($arg){

        $objects=[];
        $sql = "SELECT 
        procedimentos.id,
        procedimentos.name,
        procedimentos.descricao,
        procedimentos.created_at
        FROM procedimentos
        WHERE procedimentos.id = $arg
        ORDER BY procedimentos.id DESC";

        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function Admcuidado_lista(){

        $objects=[];
        $sql = "SELECT 
        procedimentos.id,
        procedimentos.name,
        procedimentos.descricao,
        procedimentos.created_at
        FROM procedimentos
        ORDER BY procedimentos.id DESC";

        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function operadores_unic($arg){
        $objects=[];
        $result =[];
        $sql = "SELECT
        users.id, 
        users.name,
        users.email,
        users.start_date,
        users.codigo_profissional,
        users.is_admin
        FROM users
        WHERE users.id = $arg 
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

    public static function profissional_unic($arg){
        $objects=[];
        $result =[];
        $sql = "SELECT 
        profissionals.profissional_id,
        profissionals.CBO,
        profissionals.nome_Prof,
        profissionals.email_c,
        profissionals.CPF,
        profissionals.instituicao,
        profissionals.estadoCivil,
        profissionals.conselho,
        profissionals.dataNasc,
        profissionals.UF,
        profissionals.endereco,
        profissionals.complemento,
        profissionals.CEP,
        profissionals.bairro,
        profissionals.cidade,
        profissionals.sexo,
        profissionals.estadoCivil,
        profissionals.telContato,
        profissionals.especialidade1,
        profissionals.especialidade2,
        users.name,
        users.id,
        users.email,
        users.start_date,
        users.codigo_profissional,
        users.is_admin,
        cbo.descricao 
        FROM profissionals
        LEFT JOIN users ON users.codigo_profissional = profissionals.profissional_id
        LEFT JOIN cbo ON cbo.id= profissionals.CBO
        WHERE profissionals.profissional_id = $arg
        ORDER BY profissionals.profissional_id DESC";



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
        if($tableName1 =="procedimentos"){
            $this->validate_Proc();
            
    //        if(!$this->operador) $this->operador = null;
    //        if(!$this->id) $this->id = null;
    //        if(!$this->ciente) $this->ciente = null;
        }

           return parent::updateSTR($tableName1,$columns);
    }

    public function updateSTR_PROF($tableName1,$columns) {
           $this->validate_upd_prof();
         //  if(!$this->id) $this->id = null;
         //  $this->is_admin = $this->is_admin ? 1 : 0;
   
           return parent::updateSTR_PROF($tableName1,$columns);
    }

    public function updateSTR_USER($tableName1,$columns) {

        $this->validate_upd_USER();


        $userr = User::getOneLogin(['email'=> $this->email]);

        if($userr) {
            if($userr->end_date){
                throw new AppException('Usuario est?? desligado da empresa'); 
            }

            if(password_verify($this->password, $userr->password)){
                $this->password = password_hash($this->new_password, PASSWORD_DEFAULT);
                return parent::updateSTR_USER($tableName1,['name','email','start_date','password']);
            }else{
            throw new AppException('Usuario e senha inv??lidos'); 
            }
        }
        
           
    }

    public function updateSTR_USER_noPasw($tableName1,$columns) {

        return parent::updateSTR_USER($tableName1,$columns);
           
    }
    public function insertSTR($tableName1,$columns) {
        if($tableName1 =="procedimentos"){
            $this->validate_Proc();
            
    //        if(!$this->operador) $this->operador = null;
            if(!$this->id) $this->id = null;
    //        if(!$this->ciente) $this->ciente = null;
        }

           return parent::insertSTR($tableName1,$columns);
    }

    public function insertSTR_PROF($tableName1,$columns) {
           $this->validate_prof();
        if(!$this->profissional_id) $this->profissional_id = null;
   
           return parent::insertSTR_PROF($tableName1,$columns);
    }

    public function insertSTR_USER($tableName1,$columns) {
           $this->validate_user();
        $this->geraSenha();
        addInformMsg($this->password);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        if(!$this->id) $this->id = null;
   
           return parent::insertSTR_USER($tableName1,$columns);
    }

    public static function operadores_lista2(){

        $objects=[];
        $sql = "SELECT 
        users.id,
        users.name,
        users.email,
        users.start_date
        FROM users
        WHERE users.codigo_profissional = 0
        ORDER BY users.id DESC";

        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }



    public static function profissionais_lista2(){

        $objects=[];
        $sql = "SELECT 
        profissionals.profissional_id,
        profissionals.nome_Prof,
        profissionals.CBO,
        profissionals.email_c,
        profissionals.dataAdmissao,
        cbo.codigo,
        cbo.descricao 
        FROM profissionals
        INNER JOIN cbo ON cbo.id= profissionals.CBO
        ORDER BY profissionals.profissional_id DESC";

        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function profissionais_lista(){

        $objects=[];
        $sql = "SELECT 
        users.id,
        profissionals.CBO,
        users.name,
        users.email,
        users.start_date,
        cbo.descricao 
        FROM profissionals
        RIGHT JOIN users ON users.codigo_profissional = profissionals.profissional_id
        left JOIN cbo ON cbo.id= profissionals.CBO
        ORDER BY users.id DESC";

        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function sinaisVitais_unic($arg){
        $objects=[];

        $sql = "SELECT 
        sinal_vitals.id,
        sinal_vitals.descricao,
        sinal_vitals.unidade,
        sinal_vitals.tipo,
        sinal_vitals.maximo,
        sinal_vitals.minimo,
        sinal_vitals.codsensor,
        sinal_vitals.data
        FROM sinal_vitals
        WHERE sinal_vitals.id = $arg
        ORDER BY sinal_vitals.id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function sinaisVitais_lista($arg){
        $objects=[];
        $sql = "SELECT 
        sinal_vitals.id,
        sinal_vitals.descricao,
        sinal_vitals.tipo,
        sinal_vitals.maximo,
        sinal_vitals.minimo,
        sinal_vitals.unidade,
        sinal_vitals.codsensor,
        sinal_vitals.data
        FROM sinal_vitals
        WHERE sinal_vitals.paciente = $arg
        ORDER BY sinal_vitals.id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function medicamento_unic($arg){
        $objects=[];

        $sql = "SELECT 
        medicamentos.id,
        medicamentos.name,
        medicamentos.apresentacao,
        medicamentos.descricao,
        medicamentos.operador
        FROM medicamentos
        WHERE medicamentos.id = $arg
        ORDER BY medicamentos.id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function medicamentos_lista(){
        $objects=[];
        $sql = "SELECT 
        medicamentos.id,
        medicamentos.name,
        medicamentos.apresentacao,
        medicamentos.descricao,
        medicamentos.operador
        FROM medicamentos
        ORDER BY medicamentos.id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function instituicao_lista(){
        
        $objects=[];
        $sql = "SELECT 
        institutos.id,
        institutos.nomefantasia,
        institutos.tipo,
        institutos.CNES,
        institutos.endereco,
        institutos.bairro,
        institutos.cidade,
        institutos.especialidades
        FROM institutos
        ORDER BY institutos.id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }

    public static function instituicao_unic($arg){
        $objects=[];
        $sql = "SELECT 
        institutos.id,
        institutos.nomefantasia,
        institutos.tipo,
        institutos.CNES,
        institutos.MS,
        institutos.ANVISA,
        institutos.endereco,
        institutos.CEP,
        institutos.bairro,
        institutos.operador,
        institutos.cidade,
        institutos.especialidades
        FROM institutos
        WHERE institutos.id = $arg
        ORDER BY institutos.id DESC";


        $result = Database::getResultFromQuery($sql);

        if($result){


            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));

            }

    

            return $objects;
        }
    }


        public static function solicitacao_lista(){
            $objects=[];
            $sql = "SELECT 
            perfil_usuarios.id,
            perfil_usuarios.descricao,
            perfil_usuarios.operador,
            perfil_usuarios.data
            FROM perfil_usuarios
            ORDER BY perfil_usuarios.id DESC";


            $result = Database::getResultFromQuery($sql);

            if($result){


                $class = get_called_class();

                while($row = $result->fetch_assoc()){
                    array_push($objects, new $class($row));

                }

        

                return $objects;
            }
        }

        public static function solicitacao_unic($arg){
            $objects=[];
            $sql = "SELECT 
            perfil_usuarios.id,
            perfil_usuarios.descricao,
            perfil_usuarios.operador,
            perfil_usuarios.data
            FROM perfil_usuarios
            WHERE perfil_usuarios.id = $arg
            ORDER BY perfil_usuarios.id DESC";
    
    
            $result = Database::getResultFromQuery($sql);
    
            if($result){
    
    
                $class = get_called_class();
    
                while($row = $result->fetch_assoc()){
                    array_push($objects, new $class($row));
    
                }
    
        
    
                return $objects;
            }
        }
        function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {

            $lmin = 'abcdefghijklmnopqrstuvwxyz';
            $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $num = '1234567890';
            $simb = '!@#$%';
            $retorno = '';
            $caracteres = '';

            $caracteres .= $lmin;
            if ($maiusculas) $caracteres .= $lmai;
            if ($numeros) $caracteres .= $num;
            if ($simbolos) $caracteres .= $simb;

            $len = strlen($caracteres);
            for ($n = 1; $n <= $tamanho; $n++) {
                $rand = mt_rand(1, $len);
                $retorno .= $caracteres[$rand-1];
            }
            $this->password = $retorno;
        }

        private function validate_upd_USER(){
            $errors = [];

            if(!$this->name) {
                $errors['name'] = 'Nome ?? um campo abrigat??rio.';
            }
    
            if(!$this->email) {
                $errors['email'] = 'Email ?? um campo abrigat??rio.';
            } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email inv??lido.';
            }
    
            if(!$this->start_date) {
                $errors['start_date'] = 'Data de Admiss??o ?? um campo abrigat??rio.';
            } elseif(!DateTime::createFromFormat('Y-m-d', $this->start_date)) {
                $errors['start_date'] = 'Data de Admiss??o deve seguir o padr??o dd/mm/aaaa.';
            }
    
            if($this->end_date && !DateTime::createFromFormat('Y-m-d', $this->end_date)) {
                $errors['end_date'] = 'Data de Desligamento deve seguir o padr??o dd/mm/aaaa.';
            }
    
            if(!$this->new_password) {
                $errors['new_password'] = 'Senha ?? um campo abrigat??rio.';
            }
    
            if(!$this->confirm_password) {
                $errors['confirm_password'] = 'Confirma????o de Senha ?? um campo abrigat??rio.';
            }
    
            if($this->new_password && $this->confirm_password 
                && $this->new_password !== $this->confirm_password) {
                $errors['new_password'] = 'As senhas n??o s??o iguais.';
                $errors['confirm_password'] = 'As senhas n??o s??o iguais.';
            }

            if(count($errors)>0) {
                throw new ValidationException($errors);
            }
        }

        private function validate_user(){
            $errors = [];

            if(!$this->name) {
                $errors['name'] = 'Nome do cuidado ?? um campo abrigat??rio.';
            }

            if(!$this->email) {
                $errors['name'] = 'Nome do cuidado ?? um campo abrigat??rio.';
            }

            if(!$this->start_date) {
                $errors['start_date'] = 'Data de Admiss??o ?? um campo abrigat??rio.';
            } elseif(!DateTime::createFromFormat('Y-m-d', $this->start_date)) {
                $errors['start_date'] = 'Data de Admiss??o deve seguir o padr??o dd/mm/aaaa.';
            }


            if(count($errors)>0) {
                throw new ValidationException($errors);
            }

        }
        private function validate_upd_prof(){
            $errors = [];

            if(!$this->name) {
                $errors['nome_Prof'] = 'Nome do cuidado ?? um campo abrigat??rio.';
            }

            if(!$this->email_c) {
                $errors['email_c'] = 'E-mail pessoal ?? um campo abrigat??rio.';
            }

            if(!$this->CPF) {
                $errors['CPF'] = 'CPF ?? um campo abrigat??rio.';
            }

            if(!$this->CBO) {
                $errors['CBO'] = 'CBO ?? um campo abrigat??rio.';
            }

            if(!$this->instituicao) {
                $errors['instituicao'] = 'instituicao ?? um campo abrigat??rio.';
            }

            if(!$this->dataNasc) {
                $errors['dataNasc'] = 'Data de nascimento ?? um campo abrigat??rio.';
            }

            if(!$this->UF) {
                $errors['UF'] = 'UF ?? um campo abrigat??rio.';
            }

            if(!$this->endereco) {
                $errors['endereco'] = 'endereco ?? um campo abrigat??rio.';
            }

            if(!$this->complemento) {
                $errors['complemento'] = 'complemento ?? um campo abrigat??rio.';
            }
            if(!$this->CEP) {
                $errors['CEP'] = 'CEP ?? um campo abrigat??rio.';
            }

            if(!$this->bairro) {
                $errors['bairro'] = 'Bairro ?? um campo abrigat??rio.';
            }

            if(!$this->cidade) {
                $errors['cidade'] = 'Cidade ?? um campo abrigat??rio.';
            }
            if(!$this->sexo) {
                $errors['sexo'] = 'Sexo ?? um campo abrigat??rio.';
            }

            if(!$this->estadoCivil) {
                $errors['estadoCivil'] = 'EstadoCivil ?? um campo abrigat??rio.';
            }

            if(!$this->telContato) {
                $errors['telContato'] = 'Telefone ?? um campo abrigat??rio.';
            }

            if(count($errors)>0) {
                throw new ValidationException($errors);
            }

        }

        private function validate_Prof(){
            $errors = [];

            if(!$this->name) {
                $errors['nome_Prof'] = 'Nome do cuidado ?? um campo abrigat??rio.';
            }

            if(!$this->email_c) {
                $errors['email_c'] = 'E-mail pessoal ?? um campo abrigat??rio.';
            }

            if(!$this->CPF) {
                $errors['CPF'] = 'CPF ?? um campo abrigat??rio.';
            }

            if(!$this->CBO) {
                $errors['CBO'] = 'CBO ?? um campo abrigat??rio.';
            }

            if(!$this->instituicao) {
                $errors['instituicao'] = 'instituicao ?? um campo abrigat??rio.';
            }

            if(!$this->dataNasc) {
                $errors['dataNasc'] = 'Data de nascimento ?? um campo abrigat??rio.';
            }

            if(!$this->UF) {
                $errors['UF'] = 'UF ?? um campo abrigat??rio.';
            }

            if(!$this->endereco) {
                $errors['endereco'] = 'endereco ?? um campo abrigat??rio.';
            }

            if(!$this->complemento) {
                $errors['complemento'] = 'complemento ?? um campo abrigat??rio.';
            }
            if(!$this->CEP) {
                $errors['CEP'] = 'CEP ?? um campo abrigat??rio.';
            }

            if(!$this->bairro) {
                $errors['bairro'] = 'Bairro ?? um campo abrigat??rio.';
            }

            if(!$this->cidade) {
                $errors['cidade'] = 'Cidade ?? um campo abrigat??rio.';
            }
            if(!$this->sexo) {
                $errors['sexo'] = 'Sexo ?? um campo abrigat??rio.';
            }

            if(!$this->estadoCivil) {
                $errors['estadoCivil'] = 'EstadoCivil ?? um campo abrigat??rio.';
            }

            if(!$this->telContato) {
                $errors['telContato'] = 'Telefone ?? um campo abrigat??rio.';
            }


            if(count($errors)>0) {
                throw new ValidationException($errors);
            }

        }

        private function validate_Proc(){
            $errors = [];

            if(!$this->name) {
                $errors['name'] = 'Nome do cuidado ?? um campo abrigat??rio.';
            }
            

           

    
            if(!$this->descricao) {
                $errors['descricao'] = 'Descri????o ?? um campo abrigat??rio.';
            }
    

            if(count($errors)>0) {
                throw new ValidationException($errors);
            }
        }

}

    

