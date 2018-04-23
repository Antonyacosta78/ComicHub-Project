<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cookie
 *
 * @author echoes
 */
class Cookie {

    private $time;

    /**
     * Número de dias para expirar o cookie padrão é 30
     * @param number $time
     */
    public function __construct($days = 30) {
        $this->time = time() + $days*86400;
    }

    /**
     * 
     * @param Usuario $user
     */
    public function setCookieUser($user) {
        foreach($user->getArray() as $key=>$value){
            $this->setCookie($key,$value);
        }       
    }

    public function setCookieUserJson($user) {
        $this->setCookie('login', json_encode($user));
    }

    public function getCookieUser() {
        if ($this->isCookieExist()) {
            $nome = filter_input(INPUT_COOKIE, 'nome');
            $login = filter_input(INPUT_COOKIE, 'login');
            $senha = filter_input(INPUT_COOKIE, 'senha');
            if ($nome && $login && $senha)
                return new Usuario($login,$senha,$nome);
            else
                return false;
        }else {
            return false;
        }
    }

    public function getCookieUserJson() {
        if ($this->isCookieExist()) {
            $login = filter_input(INPUT_COOKIE, 'login');
            if ($login) {
                $user = json_decode($login);
                if (is_a($user, 'Usuario')) {
                    return $user;
                }
                else{
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function setCookie($nome, $valor) {
        setcookie($nome, $valor, $this->time,'/');
    }

    public function getCookie($nome) {
        return filter_input(INPUT_COOKIE, $nome);
    }

    public function isCookieExist() {
         return (filter_input(INPUT_COOKIE,'login'))?true:false; 
    }

    public function destroyCookie() {        
        setcookie('login', null, -1,'/');
        setcookie('senha', null, -1,'/');
        setcookie('nome', null, -1,'/');
    }
}
