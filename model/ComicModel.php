<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComicModel
 *
 * @author Master dos pc
 */
class ComicModel extends Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function searchComics($text){
        $sql = "SELECT comic.*, user.Username FROM comic INNER JOIN user ON comic.UserID = user.ID "
                . "WHERE comic.ComicName LIKE '%$text%' OR comic.Genre LIKE '%$text%' OR user.Username LIKE '%$text%'";
        $return = $this->ExecuteQuery($sql,null);
        $array = [];
        foreach($return as $row){
            $array[] = new dataObject($row);
        }
        return $array;
    }
    
    public function insertComic($data){
        $sql = "INSERT INTO Comic (UserID, ComicName, Sinopsis, Genre, NSFW) "
                . "VALUES (:userid, :comicname, :sinopsis, :genre, :nsfw)";
        $parameters = [
            ':userid'   =>$_SESSION['user']['ID'],
            ':comicname'=>$data['name'],
            ':sinopsis' =>$data['sinopsis'],
            ':genre'    =>$data['genre'],
            ':nsfw'     =>$data['nsfw']
        ];
        return $this->ExecuteCommand($sql, $parameters, true);
    }
    
    public function getSFWFeed(){ //falta terminar
        $array = [];
        $sql = "SELECT * FROM Comic WHERE NSFW=0 ORDER BY ID DESC LIMIT 13";
        $return = $this->ExecuteQuery($sql,null);
        if(is_array($return) && !empty($return)){
            $array['header'] = new dataObject($return[0]);
            unset($return[0]);
            foreach($return as $row){
                $array['content'][] = new dataObject($row);
            }
        } 
        return $array;
            
    }
    
}
