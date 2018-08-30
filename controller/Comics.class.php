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
                    $this->exceptionHandler.= Message::NAME_REQUIRED;
                }
                if(empty($data['sinopsis'])){
                    $this->exceptionHandler.= Message::SINOPSIS_REQUIRED;
                }
                if(empty($data['genre'])){
                    $this->exceptionHandler.= Message::GENRE_REQUIRED;
                }
                if($_FILES['portrait']['error']==4){
                    $this->exceptionHandler.= Message::PORTRAIT_REQUIRED;
                }elseif(!($_FILES["portrait"]["type"] == "image/png" || $_FILES["portrait"]["type"] == "image/jpeg" || $_FILES["portrait"]["type"] == "image/gif")){
                    $this->exceptionHandler.= Message::NO_VALID_IMAGE_FORMAT;
                }
                
                if(!$this->exceptionHandler){//aqui se faz o cadastro
                    $id = $this->model->insertComic($data);
                    $comicPath = "userContent/".$_SESSION['user']['ID']."/".$id;
                    $dir = mkdir($comicPath);
                    
                    $boxWidth = $this->filter('bw');
                    $boxHeight = $this->filter('bh');
                    $imageManipulator = new ImageManipulator($_FILES["portrait"]["tmp_name"]);
                    $widthRatio = $imageManipulator->getWidth()/$boxWidth;
                    $heightRatio = $imageManipulator->getHeight()/$boxHeight;
                    
                    $coords = [$this->filter("x")*$widthRatio,
                               $this->filter("y")*$heightRatio,
                               $this->filter("x2")*$widthRatio,
                               $this->filter("y2")*$heightRatio
                                ];
                    $croppedImage = $imageManipulator->crop($coords);
                    $croppedImage->save($comicPath."/portrait.jpg");
                    $upload = file_exists($comicPath."/portrait.jpg");
              
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