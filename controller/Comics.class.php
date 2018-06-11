<?php
class Comics extends Controller{

    public function __construct() {
        parent::__construct();      
    }

    public function search(){
       
        $data[]="";//por enquanto
        
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('pesquisacomics',$data);
        $this->view->load('footer');
    }
    
    public function view(){
       
        $data[]="";//por enquanto
        
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('vercomic',$data);
        $this->view->load('footer');
    }
    
    public function read(){
       
        $data[]="";//por enquanto
        
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('readComic',$data);
        $this->view->load('footer');
    }
    

}