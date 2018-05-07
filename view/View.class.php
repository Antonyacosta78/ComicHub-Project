<?php

class View {
    //não se toca nesta classe 
    private $base_url;
    private $url;
    private $asset;
    private $template;

    public function __construct() {
        include 'config.php';
        if ($config) {
            $this->base_url = $config->base_url;
            $this->url  = $config->url;
            $this->asset = $config->asset;
            $this->template = $config->template;
            $this->asset.=$this->template . "/";
        }
    }
    
    public function index(){
        $this->location($this->url);
    }

    public function load($page, $data = null) {
        if($page == "nav" && $this->template == "default"){
            $data['menu']=$this->getPagesFromJSON();
        }
        include_once "view/templates/" . $this->template . "/$page.php";
    }

    public function setTemplate($template) {
        include 'config.php';
        
        $this->asset = $config->asset;
        $this->template = $template;
        $this->asset.=$this->template . "/";
    }
    
    public function location($url){
         header("Location: $url");
    }

    private function getPagesFromJSON(){
        $itemList = [];
        $jsonString = file_get_contents("view/custompages.json");
        $jsonArray  = json_decode($jsonString);
        foreach($jsonArray as $item){
            $itemList[] = new dataObject($item);
        }
        return $itemList;
    }
}
