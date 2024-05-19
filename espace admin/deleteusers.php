<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=my_shop;', 'root','meite');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $ruser = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $ruser->execute(array($getid));
    if($ruser->rowCount() > 0){
        $supuser = $pdo->prepare('DELETE FROM users WHERE id= ?');
        $supuser->execute(array($getid));

        header('Location: displaysusers.php');
    }else{
        echo "user delete";
    }
} else{
    echo "failed identification";
}
 ?>
