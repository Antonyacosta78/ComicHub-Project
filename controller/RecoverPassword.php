<?php

class RecoverPassword extends Controller{
    
    public function __construct() {
        parent::__construct();
        $this->model = new UserModel();
    }
    
    public function index(){
        $this->recoverPassword();
        
        $data = $this->exceptionHandler;
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('recoverPassword',$data);
        $this->view->load('footer');
    }
    
    private function recoverPassword(){
        if($this->filter("recoverPassword")){
            $email = $this->filter("email");
            if(!$email){
                $this->exceptionHandler = Message::EMPTY_FIELDS."Email";
                return false;
            }
            $user = $this->model->getUserByEmail($email);
            if($user){
                $password = $this->generatePassword();
                $updateData = [
                "pass"=>md5($password), //pass is password in database, written like this in array because of how updateUser method works
                "username"=>$user->get("Username")
                ];
                
                  
                $verification = $this->model->updateUser($updateData);
                if($verification){
                //do the mailer shit
                echo "Senha nova: ".$password;
                echo "<br><br><a href='".$this->config->base_url."'>Voltar ao inicio</a>";
                }else{
                    echo "Error ao atualizar";
                }
                //end the mailer shit
                die();
                
            }
            
        }
        
    }
    
    private function generatePassword(){
        $password = "";        
        $lenght = rand(6,12);
        $chars = array(
            0=>range(0,9),
            1=>range("a","z"),
            2=> range("A","Z")
        );
        for($i=0;$i<=$lenght;$i++){
            $charList   = $chars[rand(0,2)];
            $char       = $charList[rand(0,count($charList)-1)];
            $password.=$char;
        }
        return $password;
        
        
    }
    
}