<?php
include "Crud.php";
require_once "DBConnector.php";

Class User implements Crud{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;
    private $email;
    private $phone;
    
    

    function __construct($first_name, $last_name, $city_name, $email, $phone){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city_name = $city_name;
        $this->email = $email;
        $this->phone = $phone;

    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function save(){
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
        $uEmail = $this->email;
        $uPhone = $this->phone;
        
        
        $sql = "INSERT INTO `user`(`first_name`, `last_name`, `user_email`, `user_phone`, `user_city`) VALUES ('$fn','$ln','$uEmail','$uPhone','$city')";

        $DBConnector = new DBConnector;
        $res = mysqli_query($DBConnector->conn, $sql);
        return $res;
    }

    public static function readAll(){
        $sql = "SELECT * FROM `user`";
        $DBConnector = new DBConnector;
        $res = mysqli_query($DBConnector->conn, $sql);
        return $res;

    }
    public function readUnique(){
        return null;
    }
    public function search(){
        return null;
    }
    public function update(){
        return null;
    }
    public function removeOne(){
        return null;
    }
    public function removeAll(){
        return null;
    }

}
?>