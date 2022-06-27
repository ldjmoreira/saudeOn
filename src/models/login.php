<?php


class Login extends Model {

    public function validate(){
        $errors = [];

        if(!$this->email){
            $errors['email'] = 'E-mail é um campo obrigatório';
        }
        if(!$this->email){
            $errors['password'] = 'Por favor, informe a senha';
        }
        if(count($errors)>0){
            throw new ValidationException($errors);
        }

    }

    public function checkLogin(){
        $this->validate();
        $user = User::getOneLogin2(['email'=> $this->email]);
        if($user) {
            if($user->end_date){
                throw new AppException('Usuario sem permissão de acesso'); 
            }
            if(password_verify($this->password, $user->password)){
                return $user;
            }
        }

        //setcookie('tentativas',$_SESSION['tentaiva'],$exp);
        throw new AppException('Usuario e senha inválidos'); 
    }

    public static function loadPermission(){

        $permissions = model::loadPermission();

        return $permissions;

    }

    public function checkIP(){ 
         $strIP=[];
        $pieces = explode(".", $_SERVER['REMOTE_ADDR']);
        if($pieces[0] =="10" || $pieces[0] =="127"){
            $strIP[0] = IP_PAGINA_IN;
            $strIP[1] = IP_SERVIDOR_IN;
            return  $strIP;
        }elseif($pieces[0] =="172" && $pieces[1] =="16"){
            $strIP[0] = IP_PAGINA_IN;
            $strIP[1] = IP_SERVIDOR_IN;
            return  $strIP;
        }elseif($pieces[0] =="192" && $pieces[1] =="168"){
            $strIP[0] = IP_PAGINA_IN;
            $strIP[1] = IP_SERVIDOR_IN;
            return  $strIP;            
        }else{
            $strIP[0] = IP_PAGINA_OUT;
            $strIP[1] = IP_SERVIDOR_OUT;
            return  $strIP;   
        }
    
    
    }
}