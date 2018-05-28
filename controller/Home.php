<?php
class Home extends Controller{

    public function __construct() {
        parent::__construct();      
    }

    public function index(){
        $data = array();
       
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('loginModal',$this->exceptionHandler);
        $this->view->load('home',$data);
        $this->view->load('footer');
    }
    
    public function logout(){
        $this->login->logout();
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('loginModal',$this->exceptionHandler);
        $this->view->load('loggedOut');
        $this->view->load('footer');
    }

}
