<?php
try {
    $connect = new PDO('mysql:host=localhost;dbname=my_shop;', 'root', 'meite');
} catch (Exception $e) {
    echo $e->getMessage();
}

$keywords = $_GET['keywords'];
if (!empty(trim($_GET['keywords']))) {
    $req1 = $connect->prepare("SELECT name, price FROM products WHERE name LIKE ?");
    $req3 = $connect->prepare("SELECT name, price FROM products WHERE price LIKE ?");
    $req2 = $connect->prepare("SELECT name FROM categories  WHERE name LIKE ?");
    $req1->execute(["%".$keywords."%"]);
    $req2->execute(["%".$keywords."%"]);
    $req3->execute(["%".$keywords."%"]);
    $products_row1= $req1->fetchAll();
    $categories_row = $req2->fetchAll();
    $products_row2= $req3->fetchAll();
    foreach($products_row1 as $row){
        echo $row['name'].' '.$row['price'];
    }
    foreach($categories_row as $row){
        echo $row['name'];
    }
    foreach($products_row2 as $row){
        echo $row['name'].' '.$row['price'];
    }
    if(!$products_row1 && !$products_row2 && !$categories_row){
        echo 'No results found';
    }
}
 $price1 = intval($_GET['price1']);
 $price2 = intval($_GET['price2']);
 if(!empty($_GET['price1']) && !empty($_GET['price2'])){
    $req = $connect->prepare("SELECT name, price FROM products WHERE price BETWEEN $price1 AND $price2");
    $req->execute();
    $price_row = $req->fetchAll(PDO::FETCH_ASSOC);
    $price_row5= $req->fetchAll();
    foreach($price_row as $row){
        echo $row['name'].' '.$row['price'];
    } 
 if(empty($price_row)){
    echo 'No results found';
 }
     }
    
 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recherche</title>
</head>

<body>
    <form action="" method="get">
        <input type="text" name="keywords">
        <input type="submit" value="ok">
        <br />
       the price higher than: <input type="text" name="price1"> 
       and less than: <input type="text" name="price2">
       <input type="submit" name="valide">

    </form>
</body>

</html>