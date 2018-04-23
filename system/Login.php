<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author echoes
 */
class Login {

    private $logged;
    private $session;
    private $cookie;
    private $user;
    private $model;

    public function __construct() {
        $this->session = new Session();
        $this->cookie = new Cookie();
        $this->logged = false;
    }

    public function doLogin($user){
        $isLogged = $this->verifyLogin($user);
        if($isLogged instanceof Exception){
            return $isLogged;
        }
        
        $this->createSession();
        if($user->get('cookie')){
            $this->createCookies();
        }
        return $isLogged;
    }
    
    public function verifyLogin($user) {
        //falta definir classe de mensages
        $this->model = new UserModel();
        $this->user = $this->model->getUserByUsername($user->get("username"));
        try{
            if($this->user){
                if ($this->user->get("Pass") == md5($user->get("password"))) {
                    $this->logged = true;
                }else{
                    throw new Exception(Message::WRONG_PASSWORD);
                }
            }elseif(!$this->user){
                throw new Exception(Message::NO_USERNAME);
            }
            return $this->logged;
        }catch(Exception $e){
            return $e;
        }
    }

    public function createSession() {
        $this->session->setSessionUser($this->user);
    }

    public function createCookies() {
        $this->cookie->setCookieUser($this->user);
    }

    public function getSession() {
        $this->session->getSessionUser();
    }

    public function getCookie() {
        $this->cookie->getCookieUser();
    }
    
    public function getLoggedUser(){
        if($this->session->isSessionExist()){
            return $this->getSession();
        }elseif($this->cookie->isCookieExist()){
            return $this->getCookie();
        }
    }

    public function isLogged() {
        if($this->session->isSessionExist() || $this->cookie->isCookieExist()){
            $this->logged = true;
        }else{
            $this->logged = false;
        }
        return $this->logged;
    }
    
    public function logout(){
        $this->session->destroySession();
        $this->cookie->destroyCookie();
    }
}
