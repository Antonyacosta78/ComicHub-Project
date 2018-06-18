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
        $sql = "SELECT comic.*, user.Username AS Author FROM comic INNER JOIN user ON comic.UserID = user.ID "
                . "WHERE comic.ComicName LIKE %:text% OR comic.Genre LIKE %:text% OR Author LIKE %:text%";
        $parameters = [':text'=>$text];
        $return = $this->ExecuteQuery($sql,$parameters);
        return new dataObject($return);
    }
}
