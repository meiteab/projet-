<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=my_shop;', 'root',12345);
if(!$_SESSION["pass"]) {
	header('Location: loginadmin.php');
}

if(isset($_POST['add'])){
    if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['description'])) {
        $name = htmlspecialchars($_POST['name']);
        $price = htmlspecialchars($_POST['price']);
        $description = nl2br(htmlspecialchars($_POST['description']));
        $image = htmlspecialchars($_POST['image']);

        $insertproduct = $pdo->prepare('INSERT INTO products(name, price,description,image) VALUES(?, ?, ?, ?)');
        $insertproduct->execute(array($name, $price, $description, $image));

        echo "the product has been added";
    }                         
    else{
        echo "fill all fields";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add products</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="name">
        <br>
        <input type="number" name="price">
        <br>
        <textarea name="description"></textarea>
        <br>
        <input type="text" name='image'>
         <br></br>
        <input type="submit" name="add">
    </form>
</body>
</html>