<?php
class User extends Controller{

    public function __construct() {
        parent::__construct();      
        $this->model = new UserModel();
    }

    public function profile(){
        $data = array();
       
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('perfil',$data);
        $this->view->load('footer');
    }
    
    public function register(){
        $register = false;
        if($this->filter("register")){
            
            $dados = [
                "username"=>$this->filter("username"),
                "password"=>$this->filter("password"),
                "passwordRepeat"=>$this->filter("passwordRepeat"),
                "email"=>$this->filter("email"),
                "birthdate"=>$this->filter("birthdate"),
                "userimg"=>"profile.jpg"
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
                    if(!($_FILES["userimg"]["type"] == "image/png" || $_FILES["userimg"]["type"] == "image/jpeg" || $_FILES["userimg"]["type"] == "image/gif")){
                       $this->exceptionHandler = Message::NO_VALID_IMAGE_FORMAT;
                    }
                }elseif($_FILES["userimg"]["error"]==4){
                        $dados["userimg"] = "profile.png";
                }
               
                $register = ($this->exceptionHandler) ? false : true;
               
            }else{
                $this->exceptionHandler = Message::EMPTY_FIELDS;
            }
           
            if($register){             
                $dados['password'] = md5($dados['password']);
               
                $id = $this->model->insertUser(new dataObject($dados));
                if(!file_exists("userContent/".$id)){
                    mkdir("userContent/".$id);   
                }
                if($_FILES["userimg"]["error"]==0){
                    $boxWidth = $this->filter('bw');
                    $boxHeight = $this->filter('bh');
                    $coords = [$this->filter("x"),$this->filter("y"),$this->filter("x2"),$this->filter("y2")];
                   
                    $imageManipulator = new ImageManipulator($_FILES["userimg"]["tmp_name"]);
                    $widthRatio = $imageManipulator->getWidth()/$boxWidth;
                    $heightRatio = $imageManipulator->getHeight()/$boxHeight;
                    
                    $croppedImage = $imageManipulator->crop($coords);
                    $croppedImage->save("userContent/".$id."/profile.jpg");
                }elseif($_FILES["userimg"]["error"]==4){
                    copy("userContent/default.png","userContent/".$id."/profile.png");
                }
            }
        }
        
        if($register){
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
    
    public function recoverPassword(){
        if($this->filter("recoverPassword")){
            $email = $this->filter("email");
            if(!$email){
                $this->exceptionHandler = Message::EMPTY_FIELDS;
            }else{
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