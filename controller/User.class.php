<?php
class User extends Controller{

    public function __construct() {
        parent::__construct();      
    }

    public function userProfile(){
        $data = array();
       
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('perfil',$data);
        $this->view->load('footer');
    }
    

}