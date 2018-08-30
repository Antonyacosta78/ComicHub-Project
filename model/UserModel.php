<?php

class UserModel extends Model{
    
    function __construct(){
        parent::__construct();
        
    }
    
    public function verifyUsername($username){
        $sql = "SELECT User.Username "
                . "FROM User "
                . " WHERE User.Username = :username";
        $parameters = [':username'=>$username];
        $results = $this->ExecuteQuery($sql,$parameters);
        if($results){
            return false;
        }
        return true;
    }
    
    public function getUserByUsername($username){
        $object = null;
        $sql = "SELECT User.Username, User.Userimg, User.Pass,User.Email,User.Birthdate, UserSettings.* "
                . "FROM User INNER JOIN UserSettings ON User.ID = UserSettings.ID"
                . " WHERE User.Username = :username";
        $parameters = [':username'=>$username];
        $results = $this->ExecuteQuery($sql,$parameters);
        if($results){
            $object = new dataObject($results[0]);
        }
        return $object;
    }
    
    public function getUserByEmail($email){
        $object = null;
        $sql = "SELECT User.Username, User.Userimg, User.Pass,User.Email,User.Birthdate, UserSettings.* "
                . "FROM UserINNER JOIN UserSettings ON User.ID = UserSettings.ID"
                . " WHERE User.Email = :email";
        $parameters = [':email'=>$email];
        $results = $this->ExecuteQuery($sql,$parameters);
        if($results){
            $object = new dataObject($results[0]);
        }
        return $object;
    }
    
    
    public function insertUser($user){
        $sql = "INSERT INTO User (Username, Userimg, Pass, Email, Birthdate)"
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
        $parameters =[];
        $sql ='UPDATE User SET ';
        
        foreach($user as $key=>$value){
            if($key!='username'){
                $sql.= $key."=:".$key.",";
            }
            $parameters[":".$key] = $value;
        }
        
        $len = strlen($sql)-1;
        $sql = substr($sql,0,$len);
        $sql.= " WHERE username =:username";
//        echo "<pre>";
//        var_dump($sql);
//        echo "</pre>";
        $return = $this->ExecuteCommand($sql,$parameters);
        return $return;      
          
    }
    
    public function updateUserSettings($user){
        $parameters =[];
        $sql ='UPDATE UserSettings SET ';
        
        foreach($user as $key=>$value){
            if($key!='userid'){
                $sql.= $key."=:".$key.",";
            }
            $parameters[":".$key] = $value;
        }
        
        $len = strlen($sql)-1;
        $sql = substr($sql,0,$len);
        $sql.= " WHERE ID =:userid";
//        echo "<pre>";
//        var_dump($sql);
//        echo "</pre>";
        $return = $this->ExecuteCommand($sql,$parameters);
        return $return;      
          
    }
    
        public function deleteUser($user){
        $sql = "DELETE * FROM User WHERE Username=:username";
        $parameters = [
            ':username'=>$user->get("username")
        ];
        $return = $this->ExecuteCommand($sql,$parameters,true);
        return $return;
    }
    
}