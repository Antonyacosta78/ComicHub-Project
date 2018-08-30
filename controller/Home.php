<?php
class Home extends Controller{

    public function __construct() {
        parent::__construct();     
        $this->model = new ComicModel();
    }

    public function index(){
        $data['comics'] = $this->model->getSFWFeed();
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('loginModal',$this->exceptionHandler);
        $this->view->load('home',$data);
        $this->view->load('footer');
    }
}
