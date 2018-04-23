<?php

class UserModel extends Model{
    
    function __construct(){
        parent::__construct();
        
    }
    
    public function verifyUsername($username){
        $sql = "SELECT user.Username "
                . "FROM user "
                . " WHERE user.Username = :username";
        $parameters = [':username'=>$username];
        $results = $this->ExecuteQuery($sql,$parameters);
        if($results){
            return false;
        }
        return true;
    }
    
    public function getUserByUsername($username){
        $object = null;
        $sql = "SELECT user.Username, user.Userimg, user.Pass,user.Email,user.Birthdate, usersettings.* "
                . "FROM user INNER JOIN usersettings ON user.ID = usersettings.ID"
                . " WHERE user.Username = :username";
        $parameters = [':username'=>$username];
        $results = $this->ExecuteQuery($sql,$parameters);
        if($results){
            $object = new dataObject($results[0]);
        }
        return $object;
    }
    
    public function getUserByEmail($email){
        $object = null;
        $sql = "SELECT user.Username, user.Userimg, user.Pass,user.Email,user.Birthdate, usersettings.* "
                . "FROM user INNER JOIN usersettings ON user.ID = usersettings.ID"
                . " WHERE user.Email = :email";
        $parameters = [':email'=>$email];
        $results = $this->ExecuteQuery($sql,$parameters);
        if($results){
            $object = new dataObject($results[0]);
        }
        return $object;
    }
    
    
    public function insertUser($user){
        $sql = "INSERT INTO user (Username, Userimg, Pass, Email, Birthdate)"
                . " VALUES (:username, :userimg, :pass, :email, :birthdate)";
        $parameters = [
            ':username'=>$user->get("username"),
            ':userimg'=>$user->get("userimg"),
            ':pass'=>$user->get("password"),
            ':email'=>$user->get("email"),
            ':birthdate'=>$user->get("birthdate")
        ];
        $return = $this->ExecuteCommand($sql,$parameters,true);
        return $return;
    }
    
    public function updateUser($user){
        // $user = ['pass'=>'asjkdfyaskd']
        $parameters =[];
        $sql ='UPDATE user SET ';
        
        foreach($user as $key=>$value){
            if($key!='username'){
                $sql.= $key."=:".$key.",";
            }
            $parameters[":".$key] = $value;
        }
        
        $len = strlen($sql)-1;
        $sql = substr($sql,0,$len);
        $sql.= " WHERE username =:username";
        echo "<pre>";
        var_dump($sql);
        echo "</pre>";
        $return = $this->ExecuteCommand($sql,$parameters);
        return $return;      
          
    }
    
    
    
}