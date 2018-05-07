<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pages
 *
 * @author Master dos pc
 */
class Pages extends Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    public function load($name){
        /*o objeto do tipo exception é passado no array 
        data com o index "exception" */
        $data = array();
       
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('loginModal',$this->exceptionHandler);
        $this->view->load("custompages/".$name,$data);
        $this->view->load('footer');
    }
    
    public function create(){
        if($this->filter('create')){
            $title      = $this->filter('title');
            $content    = filter_input(INPUT_POST,'content');
            $icon       = $this->filter('icon');
            $url        = preg_replace('/\s+/', '-', $title)."Page";
            
            file_put_contents($url.".php",$content,LOCK_EX);
            
            $jsonFile = file_get_contents("view/custompages.json");
            
            $jsonData = json_decode($jsonFile,true);
            $jsonData[$title] = [
                "title" =>$title,
                "url"   =>$url,
                "icon"  =>$icon
             ];
            $jsonFile = json_enconde($jsonData);
            
            file_put_contents("view/custompages.json",$jsonData);
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('loginModal',$this->exceptionHandler);
        $this->view->load("pageadd",$data);
        $this->view->load('footer');
    }
}
