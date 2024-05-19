<?php
session_start();
if(!$_SESSION["pass"]) {
	header('Location: loginadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>document</title>
</head>
<body>
	<a href="displaysusers.php">Displaying all users</a>
	<a href="addproduct.php"> Adding a new product</a>
	<a href="displaysproduct.php"> Display product</a>
</body>
</html>