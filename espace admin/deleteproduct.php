<?php
$pdo = new PDO('mysql:host=localhost;dbname=my_shop;', 'root',12345);
if(isset($_GET['id']) && !empty($_GET['id'])){
    $getid = $_GET['id'];
    $rproducts = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $rproducts->execute(array($getid));
    if($rproducts->rowCount()> 0){
        $supproduct = $pdo->prepare('DELETE FROM products WHERE id= ?');
        $supproduct->execute(array($getid));
        header('Location: displaysproduct.php');
    }else{
         echo 'product delete';
    }
}else{
    echo "failed identification";
}
?>