<?php


class Database
{
    private $dsn = "mysql:host=localhost;dbname=users;charset=utf8";
    private $user = "root";
    private $passwd = "";
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO($this->dsn, $this->user, $this->passwd);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $query = "CREATE TABLE IF NOT EXISTS users (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(70) NOT NULL,
            password VARCHAR(150) NOT NULL
);";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

    }

    public function getUsers()
    {
        $query = "SELECT * FROM users";
        $users = $this->pdo->prepare($query);
        return $users->fetchAll();
    }
    public function findUser(String $email){
        $query = "SELECT * FROM users WHERE email='$email'";
        $user = $this->pdo->prepare($query);
        $user->execute();
        return $user->fetch();
    }

    public function addUser($email,$password){
        $query ="INSERT INTO users(id,email,password) VALUES('','$email','$password')";
        echo $query;
        $stmt =$this->pdo->prepare($query);
        $stmt->execute();
    }

}