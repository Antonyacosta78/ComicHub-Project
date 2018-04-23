<?php

class Register extends Controller{
    
    public function __construct(){
       parent::__construct();
       $this->model = new UserModel();
      
              
    }
    
    public function index(){
        
        $registerOK = $this->verifyFormAndRegister();
        
        if($registerOK){
            $this->view->load('header');
            $this->view->load('nav');
            $this->view->load('registerOK');
            $this->view->load('footer');
        }else{
            $this->view->load('header');
            $this->view->load('nav');
            $this->view->load('register',$this->exceptionHandler);
            $this->view->load('footer');
        }

    }
    
    private function verifyFormAndRegister(){
        $return = false;
        if($this->filter("register")){
            
            $dados = [
                "username"=>$this->filter("username"),
                "password"=>$this->filter("password"),
                "passwordRepeat"=>$this->filter("passwordRepeat"),
                "email"=>$this->filter("email"),
                "birthdate"=>$this->filter("birthdate")
            ];
            
            $is_empty = [];
            
           foreach($dados as $field=>$value){
               if(!$value){
                   $is_empty[] = $field;
               }
           }
           
           if(!$is_empty){//if nothing is empty, we can keep processing data
               if($dados["password"]!==$dados["passwordRepeat"]){
                   $this->exceptionHandler = Message::NO_MATCH_PASSWORD;
               }
               
               if(!$this->model->verifyUsername($dados["username"])){
                   $this->exceptionHandler = Message::USERNAME_EXISTS;
               }
               
               if($_FILES["userimg"]["error"]==0){
                   if($_FILES["userimg"]["type"]!== "image/png" || $_FILES["userimg"]["type"]!== "image/jpeg" || $_FILES["userimg"]["type"]!== "image/gif"){
                       $dados["userimg"] = $_FILES["userimg"]["name"];
                   }else{
                       $this->exceptionHandler = Message::NO_VALID_IMAGE_FORMAT;
                   }                 
               }elseif($_FILES["userimg"]["error"]==4){
                   $dados["userimg"] = "default.png";
               }
               
               
               $return = ($this->exceptionHandler) ? false : true;
           }else{
               $this->exceptionHandler = Message::EMPTY_FIELDS;
               foreach($is_empty as $field){
                   $this->exceptionHandler.=$field;
               }
           }
           if($return){
               $dados['password'] = md5($dados['password']);
               $this->model->insertUser(new dataObject($dados));
               if($_FILES["userimg"]["error"]==0){
                move_uploaded_file($_FILES["userimg"]["tmp_name"],"view/images".$_FILES["userimg"]["name"]);
               }
           }
           
       }
       return $return;
    }
    
    
}