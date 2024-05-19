<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=my_shop;', 'root',12345);
if(!$_SESSION["pass"]) {
	header('Location: loginadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
</head>
<body>
    <?php
   $rproducts = $pdo->query('SELECT * FROM products');
   while($product = $rproducts->fetch()){
    ?>
    <div class="products" style="border: 1px solid black;">
        <h1><?= $product['name']; ?></h1>
        <p><?= $product['price']; ?></p>
        <p><?= $product['description']; ?></p>
        <p><?= $product['image']; ?></p>
        <a href="deleteproduct.php?id=<?= $product['id']; ?>">
        <button style="color: white; background-color:crimson" padding-bottom: 10px> Delete product</button>
        </a>  
        <a href="editproduct.php?id=<?= $product['id']; ?>">
        <button style="color: black; background-color: grey" padding-bottom: 10px> edit product</button>  
    </div>
    <br>
    <?php
   }
   ?>
</body>
</html>