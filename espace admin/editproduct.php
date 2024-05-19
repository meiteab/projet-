<?php
$pdo = new PDO('mysql:host=localhost;dbname=my_shop;', 'root',12345);
// if(!$_SESSION["pass"]) {
// 	header('Location: loginadmin.php');
// }

if (isset($_GET['id']) && !empty($_GET['id'])){
    $getid = $_GET['id'];
    $rproduct = $pdo->prepare(('SELECT * FROM products WHERE id = ?'));
    $rproduct->execute(array($getid));
    if($rproduct->rowCount() > 0) {
        $allproducts = $rproduct->fetch();
        $name = $allproducts['name'];
        $price = $allproducts['price'];
        $description = str_replace('<br />', '', $allproducts['description']);
        $image = $allproducts['image'];
    
        
        if(isset($_POST['update'])){
        $nameby = htmlspecialchars($_POST['name']);
        $priceby = htmlspecialchars($_POST['price']);
        $descriptionby = nl2br(htmlspecialchars($_POST['description']));
        $imageby = htmlspecialchars($_POST['image']);
        $updateproducts = $pdo->prepare('UPDATE products SET name = ?, price = ?, description = ?, image = ? WHERE id = ?');
        $updateproducts->execute(array($nameby, $priceby, $descriptionby, $imageby, $getid));
        header('Location:displaysproduct.php');
        }
    }else{
        echo 'no products';
    }

}else{
    echo "no id";
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
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="text" name="name" <?php ($name); ?>>
        <br>
        <input type="number" name="price" <?php ($price); ?>>
        <br>
        <textarea name="description"> <?php ($description);?></textarea>
        <br>
        <input type="text" name="image" <?php ($image); ?>>
        <br><br>
        <input type="submit" name="update">
    </form>
</body>
</html>