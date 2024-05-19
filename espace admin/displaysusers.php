<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=my_shop;', 'root','meite');
if(!$_SESSION["pass"]) {
	header('Location: loginadmin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>users</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	 $rusers = $pdo->query('SELECT * FROM users');
	 while($user = $rusers->fetch()){
	?>
	<p><?= $user['username']; ?> <a type=button href="deleteusers.php?id=<?= $user['id']; ?>"
	style="color: red; text-decoration:none;"> delete users</a></p>
	<a href="editusers.php?id=<?= $user['id']; ?>">
        <button style="color: black; background-color: grey" padding-bottom: 10px> edit users</button>  
	<?php
	 }
	?>
	
</body>
</html>