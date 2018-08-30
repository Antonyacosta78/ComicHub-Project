<?php
class Comics extends Controller{

    public function __construct() {
        parent::__construct();
            $this->model = new ComicModel();
    }

    public function search($text = null){
        $data = [];
        $text = (!$text && null!==filter_input(INPUT_POST,"t")) ? filter_input(INPUT_POST,"t") : $text;
        if($text){
            $data['text']=$text; 
            $data['comics']=$this->model->searchComics($text);
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('pesquisacomics',$data);
        $this->view->load('footer');
    }
    
    public function view($id){
       
        $data[]="";//por enquanto
        
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('vercomic',$data);
        $this->view->load('footer');
    }
    
    public function read($id){
       
        $data[]="";//por enquanto
        
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('readcomic',$data);
        $this->view->load('footer');
    }

    public function insert(){
        if($this->login->isLogged()){
            
            if($this->filter("create")){
                $data = [
                    'name'      => trim($this->filter('name')),
                    'sinopsis'  => trim($this->filter('sinopsis')),
                    'genre'     => trim($this->filter('genre')),
                    'nsfw'      => $this->filter('nsfw'),
                ];
                if(empty($data['name'])){
                    $this->exceptionHandler.= " O nome não pode estar vazio";
                }
                if(empty($data['sinopsis'])){
                    $this->exceptionHandler.= " A sinopse não pode estar vazia";
                }
                if(empty($data['genre'])){
                    $this->exceptionHandler.= " Tem que ter como mínimo um género definido";
                }
                if($_FILES['portrait']['error']==4){
                    $this->exceptionHandler.= " É necessario uma portada ";
                }elseif($_FILES['portrait'])
                
                if(!$this->exceptionHandler){//aqui se faz o cadastro
                    $id = $this->model->insertComic($data);
                    $comicPath = "userContent/".$_SESSION['user']['ID']."/".$id;
                    $dir = mkdir($comicPath);
                    $fileExtension= explode(".",basename($_FILES['portrait']['name'])[1];
                    $filenameAndPath = $comicPath."/portrait".$fileExtension);
                    $upload = move_uploaded_file($_FILES['portrait']['tmp_name'],$filenameAndPath); //FALTA: FILTRAR E RENOMEAR PARA PORTRAIT.EXTENSION
                    if($dir && $upload){
                        $this->exceptionHandler = "Sucesso!";       
                    }else{
                        $this->exceptionHandler.= "Erro ao upar a imagem";  
                    }
                 
                }
            }
            $this->view->load('header');
            $this->view->load('nav');
            $this->view->load('insertcomic',$this->exceptionHandler);
            $this->view->load('footer');
        }else{
            $this->search();
        }
    }
}