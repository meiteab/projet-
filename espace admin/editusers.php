<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=my_shop;', 'root',12345);
if(!$_SESSION["pass"]) {
	header('Location: loginadmin.php');
}

if (isset($_GET['id']) && !empty($_GET['id'])){
    $getid = $_GET['id'];
    $rusers = $pdo->prepare(('SELECT * FROM users  WHERE id = ?'));
    $rusers->execute(array($getid));
    if($rusers->rowCount() > 0) {
        $allusers = $rusers->fetch();
        $username = $allusers['username'];
        $password =$allusers['password'];
        $email =$allusers['email'];
        $admin =$allusers['admin'];
        
        if(isset($_POST['update'])){
        $usernameby = htmlspecialchars($_POST['username']);
        $emailby = htmlspecialchars($_POST['email']);
        $adminby = htmlspecialchars($_POST['admin']);
        $updateusers = $pdo->prepare('UPDATE users SET username = ?, email = ?, admin = ? WHERE id = ?');
        $updateusers->execute(array($usernameby, $emailby, $adminby, $getid));
        header('Location:displaysusers.php');
        }
    }else{
        echo 'user successfully updated';
    }

}else{
    echo "user update failed";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="username" value="<?= $username; ?>">
        <br>
        <input type="text" name="email" value="<?= $email; ?>">
        <br>
        <input type="number" name="admin" value="<?= $admin; ?>">
        <br><br>
        <input type="submit" name="update">
    </form>
</body>
</html>