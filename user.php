<?php
include "Crud.php";
include "authenticator.php";
require_once "DBConnector.php";

Class User implements Crud, Authenticator{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;
    private $email;
    private $phone;

    private $username;
    private $password;

    private $p_pic;
    
    

    function __construct($first_name, $last_name, $city_name, $email, $phone, $username, $password, $p_pic){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city_name = $city_name;
        $this->email = $email;
        $this->phone = $phone;

        $this->username = $username;
        $this->password = $password;

        $this->p_pic = $p_pic;

    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public static function create(){
        $instance = new self();
        return $instance;
    }

    public function save(){
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
        $uEmail = $this->email;
        $uPhone = $this->phone;

        $userName = $this->username;
        $this->hashPassword();
        $pass = $this->password;
        $pic = $this->p_pic;

        $res = false;

        $DBConnector = new DBConnector;
        $DBConnection = $DBConnector->conn;

        try{
            $stmt = $DBConnection->prepare("INSERT INTO `user`(`first_name`, `last_name`, `user_email`, `user_phone`, `user_city`, `username`, `password`, `profile_picture`) VALUES (?,?,?,?,?,?,?,?)");
            
            $stmt->bind_param('ssssssss' ,$fn,$ln,$uEmail,$uPhone,$city,$userName,$pass,$pic);
            if($stmt->execute()){
                $res = true;
            }
    
            $stmt = null;
            }
            catch(Exception $e){
                echo"An error occured";
        }
        
        
        //$sql = "INSERT INTO `user`(`first_name`, `last_name`, `user_email`, `user_phone`, `user_city`, `username`, `password`, `profile_picture`) VALUES ('$fn','$ln','$uEmail','$uPhone','$city','$userName','$pass', '$pic')";

        
        return $res;

    }

    public static function readAll(){
        $sql = "SELECT * FROM `user`";
        $DBConnector = new DBConnector;
        $res = mysqli_query($DBConnector->conn, $sql);
        $DBConnector->closeDatabase();
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

    public function validateForm(){
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
        $uEmail = $this->email;
        $uPhone = $this->phone;

        if($fn == "" || $ln == "" || $city == "" || $uEmail == "" || $uPhone == ""){
            return false;
        }

        return true;
    }

    public function createFormErrorSessions(){
        session_start();
        $_SESSION['form_errors'] = "All fields are required";
    }

    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function isPasswordCorrect(){
        $found = false;
        $DBCon = new DBConnector;
        $res = mysqli_query($DBCon->conn, "SELECT * FROM user")  or die("Error ".mysqli_error($con->conn));

        while($row=mysqli_fetch_array($res)){
            if(password_verify($this->getPassword(), $row['password']) && $this->getUsername() == $row['username']){
                $found = true;
            }
        }
        $DBCon->closeDatabase();
        return $found;
    }

    public function login(){
        if($this->isPasswordCorrect()){
            header("Location:private_page.php");
        }
    }

    public function logout(){
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        header("Location:login.php");
    }

    public function createUserSession(){
        session_start();
        $_SESSION['username'] = $this->getUsername();
    }

    public function isUserExist($userName){
        $exists = false;
        $con = new DBConnector;

        $res = mysqli_query($con->conn,"SELECT * FROM user") or die("Error ".mysqli_error($con->conn));

                // output data of each row
                while($row = mysqli_fetch_array($res)) { 
                    if($row['username'] == $userName){
                        $exists = true;
                    }
                }
        return $exists;
    }

}
?>