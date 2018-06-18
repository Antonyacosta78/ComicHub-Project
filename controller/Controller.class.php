<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Professor
 */
class Controller {

    protected $config;
    private $query;
    protected $view;
    protected $model;
    protected $login; 
    protected $exceptionHandler = null;
    

    public function __construct() {
        include 'config.php';
        $this->config = $config;
        $this->view = new View();
        $this->login = new Login();
        $this->verifySession();
    }

    function verifySession(){
        if($this->filter("login")){
            $username   = $this->filter("username");
            $password   = $this->filter("password");
            $n1         = $this->filter("n1");
            $n2         = $this->filter("n2");
            $captcha    = $this->filter("captcha");
            $cookie     = $this->filter("keepMeLogged");
            if($captcha == $n1+$n2){
                $user = new dataObject(['username'  =>$username,
                                    'password'  =>$password, 
                                    'cookie'    =>$cookie
                                   ]);
            
                $exception = $this->login->doLogin($user);
                if($exception instanceof Exception){
                    $this->exceptionHandler = $exception;
                }
            }
            else{
                $this->exceptionHandler = new Exception("Captcha Incorreto");
            }
        }elseif(filter_input(INPUT_GET,"logout")){
            $this->login->logout();
        }
    }
    
    
    public function route($query = null) {
        $class = null;
        $this->query = $query;
        if ($this->query) {
            $this->query = explode('/', $this->query);
            $class_name = $this->query[0];
            if (count($this->query) > 1) {
                $method = $this->query[1];
            } else {
                $method = null;
            }
            $param = (count($this->query) > 2) ? $this->query[2] : null;
            if (class_exists($class_name)) {
                $class = new $class_name;
                if ($class instanceof Controller) {
                    if (method_exists($class, $method)) {
                        if ($param) {
                            $class->$method($param);
                        } else {
                            $class->$method();
                        }
                    } else {
                        if (method_exists($class, 'index')) {
                            $class->index();
                        } else {
                            $this->view->index();
                        }
                    }
                }
            }
        }

        if (!$class) {
            $class = new $this->config->defaultClass;
            $class->index();			
        }
    }
    
    protected function filter($item){
        return filter_input(INPUT_POST,$item,FILTER_SANITIZE_STRING);
    }
    
    public function reload(){
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}