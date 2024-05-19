<?php
include_once "db_connect.php";

class userModel
{
    public  $pdo;

    public function __construct()
    {
        $connect = new db_connect('localhost', 'my_shop', 3306, 'root', 'meite');
        $this->pdo = $connect->connection();
    }

    public function createUser($username, $email, $password, $created_at, $isAdmin = 0)
    {

        $query = $this->pdo->prepare("INSERT INTO users(username, email, password, created_at, admin) VALUES(?,?,?,?,?)");
        $query->execute([$username, $email, $password, $created_at, $isAdmin]);
    }

    public function getUser($email)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }


    function updateUser($username, $email, $password, $created_at,  $update_at, $isAdmin = 0, $oldEmail)
    {
        $query = $this->pdo->prepare("UPDATE users SET username =?, email =?, password =?, created_at =?, updated_at =?, admin =? WHERE email =?");
        $query->execute([$username, $email, $password, $created_at, $update_at, $isAdmin, $oldEmail]);
    }

    function deleteUser($id)
    {
        // $emailUserConnected = $_COOKIE['email'];
        $query = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        $query->execute([$id]);
    }


    public function getALlUsers()
    {
        $query = $this->pdo->prepare("SELECT * FROM users");
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }
}
