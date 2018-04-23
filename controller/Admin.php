<?php
class Admin extends Controller{

    protected $login;


    public function __construct() {
       $this->img = new ImagemModel();
       $this->not = new NoticiaModel();
       $this->vid = new VideoModel();
        parent::__construct();
        $this -> view ->setTemplate('admin');
        $this->login = new Login();
        if(!$this->login->isLogged()){
            $this->logar();
           die;
        }
    }
    
    public function index() {
      $data['img']=$this->img->countImagem();
      $data['vid']=$this->vid->countVideo();
      $data['not']=$this->not->countNoticia();
      $this -> view ->load('header');
      $this -> view ->load('nav');
      $this -> view ->load('index',$data);
      $this -> view ->load('footer');

    }
    public function logar() {
      $data['msg'] = '';
      IF(filter_input(INPUT_POST,'add')){
            $login = filter_input(INPUT_POST,'login',FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);
            if($login && $senha){
                if($this->login->verifyLogin(new Usuario(null,null,$login,$senha,null))){
                $this->login->createSession();
                $this->index();
                return true;}
                else{
                   $data['msg']="usuario ou senhs incorretos!!!"; 
                }
            }else{
                $data['msg']="informe as duas coisas!";
            }
        }
        if($this->login->isLogged()){
            $this->index();
        }
      $this -> view ->load('header');
      $this -> view ->load('login',$data);
      $this -> view ->load('footer');

    }
    public function logout() {
        $this->login->logout();
        $this->reload();
        header('location:'.$this->config->base_url.'Home');
    }
    
}
