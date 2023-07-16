<?php
class UserModel{
    private $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    //get all users
    public function getAllUsers(){
        $query = "SELECT * FROM `user`";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //createUser
    public function createUser($name, $phone, $status, $username, $password){
        $query = "INSERT INTO `user`(name, phone, status, username, password) VALUES(:name, :phone, :status, :username, :password)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    }
    //userlog
    public function userLogin($username, $password){
        $query = "SELECT * FROM `user` WHERE username = :username AND password = :password LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam('username', $username);
        $stmt->bindParam('password', $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    //usersigned
    public function signed($id){
        $query = "SELECT * FROM `user` WHERE id=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}